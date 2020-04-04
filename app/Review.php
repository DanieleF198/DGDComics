<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = "reviews";

    protected $fillable = [
        'user_id','comic_id','review_text','stars'
    ];

    public function comic(){
        return $this->belongsTo('App\Comic');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
