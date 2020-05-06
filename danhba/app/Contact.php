<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="contacts";

    public function category(){
        return $this->belongsTo('App\Category', 'id_cat', 'id');
    }
    public function user(){
        return $this->belongsTo('App\User', 'id_owner', 'id');
    }
}
