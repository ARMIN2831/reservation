<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainPageSetting extends Model
{
    protected $guarded = ['id'];


    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
