<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Client::class, 10)->create();
        factory(\App\Account::class, 10)->create();
        factory(\App\Transaction::class, 10)->create();
    }
}
