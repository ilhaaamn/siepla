<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailReport extends Model
{
    //
    public function dealer(){
        return $this->belongsTo('App\Dealer');
    }
}
