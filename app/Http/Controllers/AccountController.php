<?php

namespace App\Http\Controllers;

use App\Account;
use App\Client;
use DB;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Account::all();
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
        $account = Account::create($request->all());

        return response()->json($account, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  $account_id
     * @return \Illuminate\Http\Response
     */
    public function show($account_id)
    {
        return Account::find($account_id);
    }
    /**
     * response with client account.
     *
     * @param  $account_id
     * @return \Illuminate\Http\Response
     */
    public function showClientAccount($client_id)
    {
        return Account::where('client_id', $client_id)->get();
        // return DB::table('accounts')
        //                 ->join('clients', 'accounts.client_id', '=', 'clients.id')
        //                 ->where('client_id', $client_id)
        //                 ->get(array(
        //                             'first_name',
        //                             'last_name',
        //                             'client_type',
        //                             'account_number',
        //                             'balance'
        //                 ));
    }
    /**
     * response with account dietails.
     *
     * @param  $account_id
     * @return \Illuminate\Http\Response
     */
    public function showAccountDietails($account_id)
    {
        
        return DB::table('accounts')
                        ->join('clients', 'accounts.client_id', '=', 'clients.id')
                        ->where('accounts.id', $account_id)
                        ->get(array(
                                    'first_name',
                                    'last_name',
                                    'client_type',
                                    'account_number',
                                    'balance'
                        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
}
