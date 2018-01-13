<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{



    
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
