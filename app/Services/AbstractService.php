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

    public function setValidate(ValidatorInterface $validator)
    {
        $this->validator = $validator;

        return $this;
    }

    public function getList()
    {
        $data = $this->repository->all();

        return $data;
    }

    public function with(array $relationship)
    {
        $this->repository->with($relationship);

        return $this;
    }
}
