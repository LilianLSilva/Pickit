<?php

namespace App\Repositories;

use App\Models\Auto;

class AutoRepository extends BaseRepository
{
    public function __construct(Auto $auto)
    {
        parent::__construct($auto);
    }

    public function all()
    {
        return $this->model->with(['owner'])->get();
    }

    public function get(int $id)
    {
        return $this->model->with(['owner'])->find($id);
    }

}
