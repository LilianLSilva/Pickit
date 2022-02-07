<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['auto_id'];

    protected $hidden = ['updated_at', 'created_at'];

    public function auto()
    {
        return $this->hasOne(Auto::class);
    }

    public function services(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(
            Service::class,
            'services_transaction',
            'transaction_id',
            'service_id')
            ->withTimestamps();
    }
}
