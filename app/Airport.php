<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable =
    [
    	'name',
    	'city',
    	'country',
    	'iata_code',
    	'_geoloc',
    	'links_count',
    ];
}
