<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";

    public function contact(){
        return $this->hasMany('App\Contact', 'id_cat', 'id');
    }
}
