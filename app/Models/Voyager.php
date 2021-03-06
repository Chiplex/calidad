<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voyager extends Model
{
    protected $fillable = [
        'username',
        'type',
        'linea'
    ];

    /**
     * Get the utility record associated with the voyager.
     */
    public function utilities()
    {
        return $this->hasMany('App\Models\Utility');
    }
}
