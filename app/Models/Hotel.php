<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded = ['id'];
    public function users()
    {
        return $this->belongsToMany(User::class,'hotel_users')->withPivot('role');
    }
    public function facilities()
    {
        return $this->belongsToMany(Facility::class,'hotel_facilities')->withPivot('status');
    }
    public function files()
    {
        return $this->morphMany(File::class, 'model','model_type');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'model','model_type');
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
}
