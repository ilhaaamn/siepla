<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehouseInventory extends Model
{
    //
    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }

    public function bike(){
        return $this->belongsTo('App\BikeModel');
    }
}
