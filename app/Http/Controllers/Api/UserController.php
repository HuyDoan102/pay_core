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
    protected $userValidator;

    public function __construct(UserService $userService, WalletService $walletService, UserValidator $userValidator)
    {
        $this->userService = $userService;
        $this->userService->setRepository(app(UserRepository::class));

        $this->walletService = $walletService;
        $this->walletService->setRepository(app(WalletRepository::class));
        $this->userValidator = $userValidator;
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
            $attributes = $request->only('phone_number', 'password');

            DB::beginTransaction();
            $this->userValidator->with($attributes)->passesOrFail(UserValidator::RULE_CREATE);
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

    public function getById($id)
    {
        try {
            $user = $this->userService->find($id);

            return $this->responseSuccess(UserResource::make($user), 'Create information user by id');
        } catch (\Exception $e) {
            return $this->responseError($e->getMessage());
        }
    }
}
