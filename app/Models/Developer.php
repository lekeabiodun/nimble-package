<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Developer extends User
{
    
    protected $table = 'users';

    protected $guarded = [];
    
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('developer', function (Builder $builder) {
            $builder->where('role', 'developer');
        });
    }

    public function themes()
    {
        return $this->hasMany(Theme::class, 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function isGroupAdmin()
    {
        if(Group::where('admin_id', $this->id)->count())
        {
            return true;
        }
        return false;
    }
}
