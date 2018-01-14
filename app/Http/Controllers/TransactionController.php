<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Account;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Transaction::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validate = $this->validate($request, [
        //     'transaction_type' => 'required|integer|in:1,2',
        //     'currency' => 'required|integer|in:1,2,3',
        //     'amount' => 'integer',
        //     'account_id' => 'required',
        //     ]);
        if($request){
            $transaction = new Transaction();

            $transaction->transaction_type=$request->transaction_type;
            $transaction->currency=$request->currency;
            $transaction->amount=$request->amount;
            $transaction->account_id=$request->account_id;
            $transaction->client_id=Account::find($request->account_id)->get('client_id');
            $gallery->save(); 
            return response()->json($transaction, 201);
        }

        return response()->json($request, 500);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  $transaction_id
     * @return \Illuminate\Http\Response
     */
    public function show($transaction_id)
    {
        return Transaction::find($transaction_id);
    }


    public function showAccountTransactions($account_id)
    {
        return Transaction::where('account_id',$account_id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
