<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentLog extends Model
{
    //
    public function shipment(){
        return $this->belongsTo('App\Shipment');
    }
}
