<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quality extends Model
{
    use SoftDeletes;
    
    protected $table = 'quality';

    protected $fillable = ['names'];
}
