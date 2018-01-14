<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
     
    public function client()
    {
        return $this->hasOne('App\Client');
    }

    public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }


}
