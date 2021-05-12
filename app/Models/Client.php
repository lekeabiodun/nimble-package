<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends User
{
    
    protected $table = 'users';

    protected $guarded = [];
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('client', function (Builder $builder) {
            $builder->where('role', 'client');
        });
    }
}
