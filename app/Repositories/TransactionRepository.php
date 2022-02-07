<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionRepository extends BaseRepository
{
    const SERVICE_COLUMN_COST = 'cost';

    public function __construct(Transaction $transaction)
    {
        parent::__construct($transaction);
    }

    public function all()
    {
        return $this->model->with(['services'])->get();
    }

    public function attachServices(Transaction $transaction, $services){
        $transaction->services()->attach($services);
    }

    public function getTotalCost(Transaction $transaction)
    {
        return $transaction->services()->sum(self::SERVICE_COLUMN_COST);
    }

    public function byAutoId($id)
    {
        return $this->model->where('auto_id', $id)->with(['services'])->get();
    }
}
