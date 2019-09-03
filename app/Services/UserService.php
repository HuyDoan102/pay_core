<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepository;

class UserService extends AbstractService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function beforeCreate(array $attributes)
    {
        $attributes['password'] = bcrypt($attributes['password']);

        return $attributes;
    }
}
