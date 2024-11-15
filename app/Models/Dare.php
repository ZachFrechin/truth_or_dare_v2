<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dare extends Model
{
    protected $fillable = [
        'dare',
        'author',
        'asked',
        'response',
        'give_up'
    ];
}
