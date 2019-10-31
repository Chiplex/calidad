<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    protected $guarded = array();

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
}
