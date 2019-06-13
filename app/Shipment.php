<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //
    public function dealer(){
        return $this->belongsTo('App\Dealer');
    }

    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }

    public function detail(){
        return $this->hasMany('App\ShipmentDetail');
    }

    public function log(){
        return $this->hasMany('App\ShipmentLog');
    }
}
