<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   public function scopeRr(){
       return 'working?';
   }
    
    public function ValidateTransaction($request){
        return validate($request, [
            'transaction_type' => 'required|integer|in:1,2',
            'currency' => 'required|integer|in:1,2,3',
            'amount' => 'integer',
            'account_id' => 'required',
            ]);
    }


    public function account()
    {
        return $this->hasOne('App\Account');
    }

    public function client()
    {
        return $this->hasOne('App\Client');
    }
}
