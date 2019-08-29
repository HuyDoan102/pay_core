<?php

namespace App\Services;

use Illuminate\Routing\Matching\ValidatorInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

abstract class AbstractService
{
    protected $repository;
    protected $validator;

    public function setRepository(RepositoryInterface $repository)
    {
        $this->repository = $repository;

        return $this;
    }

    public function setValidator(ValidatorInterface $validator)
    {
        $this->validator = $validator;

        return $this;
    }

    public function getList()
    {
        $instances = $this->repository->all();

        return $instances;
    }

    protected function beforeCreate(array $attributes)
    {
        return $attributes;
    }

    protected function beforeUpdate(array $attributes)
    {
        return $attributes;
    }

    public function with(array $relationship)
    {
        $this->repository->with($relationship);

        return $this;
    }

    public function create(array $attributes)
    {
        $attributes = $this->beforeCreate($attributes);
        $instance = $this->repository->create($attributes);
        dd($instance);

        return $instance;
    }
}
