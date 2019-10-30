<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';

    protected $fillable = [
        'positions'
    ];

    public function attributes()
    {
        return $this->belongsToMany(
            'App\Models\Attribute', 
            'values', 
            'level_id', 
            'attribute_id'
        );
    }
}
