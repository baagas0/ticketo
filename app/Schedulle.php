<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Schedulle extends Model
{

    public function tour()
    {
        return $this->belongsTo('App\Tour', 'id', 'schedulle_id');
    }

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

    public function getAmountAttribute(){
        $amount = Booking::where('schedulle_id', $this->id)->sum('total');
        return $amount;
    }
}
