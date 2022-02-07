<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTransactionRequest;
use App\Services\TransactionService;

class TransactionController extends Controller
{
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $transaction = $this->transactionService->all();
        return \Response()->json(['res' => true, 'data' => $transaction], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTransactionRequest $request)
    {
        try {
            $transaction = $this->transactionService->save($request);
            return \Response()->json(['res' => true, 'Total cost of services' => $transaction], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => true, 'message' => $e->getMessage()], 422);
        }
    }

    public function transactionByAutoId($id)
    {
        try {
            $transaction = $this->transactionService->transactionByAutoId($id);
            return \Response()->json(['res' => true,'data' => $transaction], 200);
        }
        catch (\Exception $e){
            return \Response()->json(['res' => true, 'message' => $e->getMessage()], 422);
        }
    }

}
