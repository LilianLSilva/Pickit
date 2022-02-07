<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'brand',
        'model',
        'year',
        'license_plate',
        'color'
    ];

    protected $hidden = ['updated_at', 'created_at'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
