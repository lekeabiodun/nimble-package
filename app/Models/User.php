<?php

namespace App\Models;

use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function dashboard()
    {
        return url($this->role);
    }

    public function photo()
    {
        if(Storage::disk('photos')->exists($this->role)){
			return secure_asset(Storage::disk('photos')->url($this->role));
        } elseif(Storage::disk('photos')->exists($this->role.'.png')) {
			return secure_asset(Storage::disk('photos')->url($this->role.'.png'));
        } else{
			return secure_asset('storage/not-available.png');
		}
    }
}
