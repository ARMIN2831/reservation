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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->morphTo(__FUNCTION__,'model_type','model_id');
    }

    public function file()
    {
        return $this->morphOne(File::class, 'model','model_type');
    }
}
