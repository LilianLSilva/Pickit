<?php

namespace App\Services;

use App\Http\Requests\CreateTransactionRequest;
use App\Models\Transaction;
use App\Repositories\AutoRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\TransactionRepository;

class TransactionService
{
    private $transactionRepository;
    private $autoRepository;
    private $serviceRepository;

    public function __construct(TransactionRepository $transactionRepository,
                                AutoRepository $autoRepository,
                                ServiceRepository $serviceRepository)
    {
        $this->transactionRepository = $transactionRepository;
        $this->autoRepository = $autoRepository;
        $this->serviceRepository = $serviceRepository;
    }
    public function all()
    {
        return $this->transactionRepository->all();
    }

    public function get(int $id)
    {
        return $this->transactionRepository->get($id);
    }

    public function save(CreateTransactionRequest $request)
    {
        $transaction = New Transaction($request->all());
        $auto = $this->autoRepository->get($request['auto_id']);
        $services = $request['services'];

        if ($auto->color === 'gray'){
            $services = array_filter($services, function ($service_id){
                $service = $this->serviceRepository->get($service_id);
                return $service['name'] !== 'Pintura';
            });
        }
        $this->transactionRepository->save($transaction);
        $this->transactionRepository->attachServices($transaction, $services);
        $cost = $this->transactionRepository->getTotalCost($transaction);
        return $cost;
    }

    public function transactionByAutoId($id)
    {
        return $this->transactionRepository->byAutoId($id);
    }
}
