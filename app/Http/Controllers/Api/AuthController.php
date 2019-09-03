<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Contracts\WalletRepository;
use App\Repositories\Validators\UserValidator;
use App\Services\UserService;
use App\Services\WalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    protected $userService;
    protected $userValidator;
    protected $walletService;

    public function __construct(UserService $userService, WalletService $walletService, UserValidator $userValidator)
    {
        $this->middleware('api', ['except' => ['login']]);
        $this->userService = $userService;
        $this->userService->setRepository(app(UserRepository::class));
        $this->walletService = $walletService;
        $this->walletService->setRepository(app(WalletRepository::class));
        $this->userValidator = $userValidator;
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->only('phone_number', 'password');
            if (!$token = $this->guard()->attempt($credentials)) {

                return $this->responseError(__('errors.credentials_mismatched'), 401);
            }
            $user = $this->guard()->user();
            $user = UserResource::make($user);

            return $this->responseWithToken($token, [
                'info' => $user
            ]);
        } catch (ValidatorException $e) {
            return $this->responseError($e->getMessageBag());
        } catch (\Exception $e) {
            return $this->responseError(__('errors.server_error'), 400);
        }

    }

    public function register(Request $request)
    {
        $attributes = $request->only([
            'phone_number',
            'password',
        ]);
        try {
            DB::beginTransaction();
            $this->userValidator->with($attributes)->passesOrFail(UserValidator::RULE_CREATE);
            $user = $this->userService->create($attributes);
            $this->walletService->create([
                'user_id' => $user->id,
                'wallet_hash'=> (string) Str::uuid(),
                'balance'=> WALLET_BALANCE,
            ]);
            $token = $this->guard()->login($user);

            $user = UserResource::make($user);

            DB::commit();
            return $this->responseWithToken($token, [
                'info' => $user
            ]);
        } catch (ValidatorException $e) {
            DB::rollBack();
            return $this->responseError($e->getMessageBag());
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->responseError(__('errors.server_error'), 400);
        }
    }
}
