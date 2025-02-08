<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];
    public function users()
    {
        return $this->belongsToMany(User::class,'hotel_users');
    }
    public function files()
    {
        return $this->morphMany(File::class, 'model','model_type');
    }
}
