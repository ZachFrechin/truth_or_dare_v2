<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Truth extends Model
{
    protected $fillable = [
        'truth',
        'author',
        'asked',
        'response',
        'give_up'
    ];
}
