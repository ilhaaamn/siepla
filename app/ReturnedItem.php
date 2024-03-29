<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReturnedItem extends Model
{
    //
    public function model(){
        return $this->belongsTo('App\BikeModel');
    }

    public function warehouse(){
        return $this->belongsTo('App\Warehouse');
    }
}
