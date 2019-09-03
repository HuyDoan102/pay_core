<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\WalletRepository;
use App\Models\Wallet;
use App\Repositories\Validators\WalletValidator;

/**
 * Class WalletRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class WalletRepositoryEloquent extends BaseRepository implements WalletRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wallet::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
