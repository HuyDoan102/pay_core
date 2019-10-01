<?php

namespace App\Services;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

abstract class AbstractService
{
    protected $repository;
    protected $validator;
    protected $actionValidator = '';

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

    public function setActionValidate($action = null)
    {
        $this->actionValidator = $action;
    }

    public function getList()
    {
        $instances = $this->repository->all();

        return $instances;
    }

    public function find($id)
    {
        $instance = $this->repository->find($id);

        return $instance;
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
//        $this->validator->with($attributes)->passesOrFail($this->validator::RULE_CREATE);
        $attributes = $this->beforeCreate($attributes);
        $instance = $this->repository->create($attributes);

        return $instance;
    }
}
