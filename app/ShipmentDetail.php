<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentDetail extends Model
{
    //
    public function model(){
        return $this->belongsTo('App\BikeModel');
    }
}
