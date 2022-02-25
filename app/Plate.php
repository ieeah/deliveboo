<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

    protected $fillable = [
        'name', 'slug', 'description', 'ingredients', 'price', 'visibility', 'thumb', 'user_id',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    //Relation with Order
    public function orders() {
        return $this->belongsToMany('App\Order')
        ->withPivot(['quantity']);
    }
}
