<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cost'
    ];

    protected $hidden = ['updated_at', 'created_at'];

    public function transactions()
    {
        return $this->belongsToMany(
            Transaction::class,
            'services_transaction',
            'service_id',
            'transaction_id')
            ->withTimestamps();
    }
}
