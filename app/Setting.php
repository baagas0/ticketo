<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'slug', 'name', 'description', 'value', 'image'
    ];
}
