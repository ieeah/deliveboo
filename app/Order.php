<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        $this->belongsTo('App\User');
    }

    //Relation with Plate
    public function plates() {
        $this->belongsToMany('App\Plate')
        ->withPivot('quantity');
    }
}
