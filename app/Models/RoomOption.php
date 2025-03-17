<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomOption extends Model
{
    protected $guarded = ['id'];


    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
