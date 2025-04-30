<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgencyUser extends Model
{
    protected $guarded = ['id'];

    public function agencyUser()
    {
        return $this->belongsTo(User::class,'agency_id','id');
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
