<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\StatementRepository;
use App\Models\Statement;
use App\Repositories\Validators\StatementValidator;

/**
 * Class StatementRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquents;
 */
class StatementRepositoryEloquent extends BaseRepository implements StatementRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Statement::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
