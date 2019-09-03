<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\WalletRepository;
use App\Repositories\Validators\UserValidator;
use App\Services\UserService;
use App\Services\WalletService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Prettus\Validator\Exceptions\ValidatorException;

class UserController extends Controller
{
    protected $userService;
    protected $walletService;

    public function __construct(UserService $userService, WalletService $walletService)
    {
        $this->userService = $userService;
        $this->userService->setRepository(app(UserRepository::class));

        $this->walletService = $walletService;
        $this->walletService->setRepository(app(WalletRepository::class));
    }

    public function index()
    {
        $users = $this->userService->getList();

        $users = $users->map(function ($user) {
            return UserResource::make($user);
        });

        return $this->responseSuccess(['info' => $users], __('pay.user.list'));
    }

    public function store(Request $request)
    {
        try {
            $attributes = $request->only('phone_number', 'passcode');

            $validator = app(UserValidator::class);
            $this->userService->setValidator($validator);

            DB::beginTransaction();
            $user = $this->userService->create($attributes);

            $this->walletService->create([
                'user_id' => $user->id,
                'wallet_hash'=> (string) Str::uuid(),
                'balance'=> WALLET_BALANCE,
            ]);
            $user = UserResource::make($user);

            DB::commit();
            return $this->responseSuccess(['info' => $user], __('pay.user.create'));
        } catch (ValidatorException $e) {
            DB::rollBack();
            return $this->responseError($e->getMessageBag());
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseError(__('pay.user.error'));
        }
    }
}
