<?php

namespace App\Services;

use App\Http\Requests\CreateAutoRequest;
use App\Http\Requests\UpdateAutoRequest;
use App\Models\Auto;
use App\Repositories\AutoRepository;

class AutoService
{
    private $autoRepository;

    public function __construct(AutoRepository $autoRepository)
    {
        $this->autoRepository = $autoRepository;
    }
    public function all()
    {
        return $this->autoRepository->all();
    }

    public function get(int $id)
    {
        return $this->autoRepository->get($id);
    }

    public function save(CreateAutoRequest $request)
    {
        $auto = New Auto($request->all());
        $this->autoRepository->save($auto);
        return $auto;
    }

    public function update(UpdateAutoRequest $request, Auto $auto)
    {
        $auto->fill($request->all());
        $this->autoRepository->save($auto);
        return $auto;
    }

    public function delete(Auto $auto)
    {
        $this->autoRepository->delete($auto);
        return $auto;
    }
}
