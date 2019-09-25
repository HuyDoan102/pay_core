<?php

namespace App\Services;

use App\Repositories\Contracts\StatementRepository;

class StatementService extends AbstractService
{
    protected $statementRepository;

    public function __construct(StatementRepository $statementRepository)
    {
        $this->statementRepository = $statementRepository;
    }
}
