<?php

namespace App\Services;

use App\Repositories\Contracts\WalletRepository;

class WalletService extends AbstractService
{
    protected $walletRepository;

    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }
}
