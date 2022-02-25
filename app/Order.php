<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    //Relation with Plate
    public function plates() {
        return $this->belongsToMany('App\Plate')
        ->withPivot(['quantity']);
    }
}
