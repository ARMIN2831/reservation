<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleReserve extends Model
{
    protected $guarded = ['id'];

    public function room()
    {
        return $this->morphTo(__FUNCTION__,'model_type','model_id');
    }
}
