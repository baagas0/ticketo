<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedulle extends Model
{
    public function transportation()
    {
        return $this->belongsTo('App\Transportation', 'transportation_id');
    }

    public function from()
    {
        return $this->belongsTo('App\Airport', 'from_code');
    }

    public function destination()
    {
        return $this->belongsTo('App\Airport', 'destination_code');
    }
}
