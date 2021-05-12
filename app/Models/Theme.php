<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theme extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function developer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function cover()
    {
        if(Storage::disk('themes')->exists($this->cover)){
			return secure_asset(Storage::disk('themes')->url($this->cover));
        } else{
			return secure_asset('storage/not-available.png');
		}
    }

    public function preview_url()
    {
        return url('/');
    }
}
