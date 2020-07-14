<?php

use Illuminate\Database\Seeder;
use App\Payment;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = New Payment;
        $init->slug = "ovo";
        $init->name = "OVO";
        $init->rate = 0;
        $init->value = "otomatis";
        $init->is_bank = 0;
        $init->save();
    }
}
