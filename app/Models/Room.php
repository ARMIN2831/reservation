<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded = ['id'];

    public function files()
    {
        return $this->morphMany(File::class, 'model','model_type');
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class,'room_facilities');
    }

    public function options()
    {
        return $this->hasMany(RoomOption::class);
    }
}
