<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{


    public function account()
    {
        return $this->hasMany('App\Account');
    }
    
    /**
     * @var array
     */
    
   protected $fillable = [
       'first_name', 'last_name', 'client_type', 'personal_code',
   ];
   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       
   ];
}
