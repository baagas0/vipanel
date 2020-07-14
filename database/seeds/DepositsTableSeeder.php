<?php

use Illuminate\Database\Seeder;
use App\Deposit;

class DepositsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = New Deposit;
        $init->user_id = 1;
        $init->payment_id = 1;
        $init->amount = 10134;
        $init->amount_received = 10000;
        $init->save();
    }
}
