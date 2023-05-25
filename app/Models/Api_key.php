<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api_key extends Model
{
    protected $fillable =[
        'id',
        'name',
        'email',
        'city',
    ];
}
