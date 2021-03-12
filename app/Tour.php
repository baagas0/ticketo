<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'schedulle_id', 'image', 'title', 'description'
    ];

    public function schedulle()
    {
        return $this->belongsTo('App\Schedulle');
    }
}
