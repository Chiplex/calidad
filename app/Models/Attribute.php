<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function levels()
    {
        return $this->belongsToMany('App\Models\Level', 'values', 'attribute_id', 'level_id');
    }

    public function valuations()
    {
        return $this->hasManyThrough(
            'App\Models\Valuation', 
            'App\Models\Value'
        );
    }
}
