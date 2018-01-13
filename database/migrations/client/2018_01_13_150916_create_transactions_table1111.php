<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('transaction_type', ['cash_in', 'cash_out']);
            $table->integer('client_id')->unsigned();
            $table->integer('account_number')->unsigned();
            $table->double('amount');
            $table->enum('currency', ['EUR', 'USD', 'JPY']);
            $table->timestamps();
            
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('account_number')->references('account_number')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
