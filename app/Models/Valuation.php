<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Valuation extends Model
{
    protected $guarded = [];

    public function value()
    {
        return $this->belongsTo('App\Models\Value');
    }

    public function quality()
    {
        return $this->belongsTo('App\Models\Quality');
    }

    public function utility()
    {
        return $this->belongsTo('App\Models\Utility');
    }
}
