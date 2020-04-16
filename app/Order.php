<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'comic_id','user_id','payment_method_id','shipping_address_id'
    ];
    public function shipping_adress(){
        return $this->hasMany('App\ShippingAdress');
    }

    public function payment_method(){
        return $this->hasMany('App\PaymentMethod');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comic_bought(){
        return $this->belongsToMany('App\ComicBought');
    }






}
