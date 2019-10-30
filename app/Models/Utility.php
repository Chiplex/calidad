<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    protected $fillable = ['voyager_id'];

    public function voyager()
    {
        return $this->belongsTo(
            'App\Models\Voyager', 
            'voyager_id', 
            'id'
        );
    }
}
