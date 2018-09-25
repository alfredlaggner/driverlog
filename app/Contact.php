<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function customer()
    {
//        return $this->belongsTo('App\Customer','ext_id_customer','ext_id');
    }
}
