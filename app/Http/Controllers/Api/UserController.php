<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Repositories\Contracts\UserRepository;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

        $this->userService->setRepository(app(UserRepository::class));
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
        $attributes = $request->only('phone_number', 'passcode');

        $this->userService->create($attributes);
    }
}
