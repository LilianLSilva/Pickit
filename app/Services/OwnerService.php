<?php

namespace App\Services;

use App\Http\Requests\CreateOwnerRequest;
use App\Http\Requests\UpdateOwnerRequest;
use App\Models\Owner;
use App\Repositories\OwnerRepository;

class OwnerService
{
    private $ownerRepository;

    public function __construct(OwnerRepository $ownerRepository)
    {
        $this->ownerRepository = $ownerRepository;
    }
    public function all()
    {
        return $this->ownerRepository->all();
    }

    public function get(int $id)
    {
        return $this->ownerRepository->get($id);
    }

    public function save(CreateOwnerRequest $request)
    {
        $owner = New Owner($request->all());
        $this->ownerRepository->save($owner);
        return $owner;
    }

    public function update(UpdateOwnerRequest $request, Owner $owner)
    {
        $owner->fill($request->all());
        $this->ownerRepository->save($owner);
        return $owner;
    }

    public function delete(Owner $owner)
    {
        $this->ownerRepository->delete($owner);
        return $owner;
    }
}
