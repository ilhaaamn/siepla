<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function document(){
        return $this->hasMany('App\Document');
    }

    public function detail(){
        return $this->hasMany('App\DetailReport');
    }

    public function dealer(){
        return $this->belongsTo('App\Dealer');
    }
}
