<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
   
    
    
    public static function store($request)
    {       
        $account = Account::find($request->account_id);
        $account_balance = $account->balance; 
        $transaction_type = $request->transaction_type;
        $transaction_currency = $request->currency;

        $transaction_amount = Transaction::currencyConverter($transaction_currency, $request->amount);

        if($transaction_type == 2) // Cash out
        {
            if($account_balance > $transaction_amount)
            {
                $final_balance = $account_balance-$transaction_amount;
                $account->balance = $final_balance;
                $account->save();
                return Transaction::createTransaction($request);
            }
            else //Cash in
            {
                return response()->json("Insufficient funds", 403);
            }
        }
        else
        {
            $final_balance = $account_balance+$transaction_amount;
            $account->balance = $final_balance;
            $account->save();
            return Transaction::createTransaction($request);
        }  
        
    }

    public static function createTransaction($request)
    {
        $transaction = new Transaction();
        $transaction->transaction_type=$request->transaction_type;
        $transaction->currency=$request->currency;
        $transaction->amount=$request->amount;
        $transaction->account_id=$request->account_id;
        $transaction->client_id=Account::where('id',$request->account_id)->value('client_id');
        
        $transaction->save(); 
        return response()->json($request, 201);
    }

    public static function currencyConverter($currency, $amount){
        if($currency == 2) //USD
        {
            return $amount / 1.1497;
        }
        else if($currency == 3) //JPY
        {
            return $amount / 129.53;
        }
        else //EUR
        {
            $amount; 
        }

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
