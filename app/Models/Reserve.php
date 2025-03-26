<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $guarded = ['id'];

    public function people()
    {
        return $this->hasMany(PeopleReserve::class);
    }
}
