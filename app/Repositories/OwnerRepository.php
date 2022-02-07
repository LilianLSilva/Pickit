<?php

namespace App\Repositories;

use App\Models\Owner;

class OwnerRepository extends BaseRepository
{
    public function __construct(Owner $owner)
    {
        parent::__construct($owner);
    }
}
