<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Contracts\StatementRepository;
use App\Services\StatementService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StatementController extends Controller
{
    protected $statementService;

    public function __construct(StatementService $statementService)
    {
        $this->statementService = $statementService;
        $this->statementService->setRepository(app(StatementRepository::class));
    }

    public function create(Request $request)
    {
        $attributes = $request->only(['amount', 'balance', 'type']);
        $attributes['user_id'] = Auth::user()->id;
        $this->statementService->create($attributes);
    }
}
