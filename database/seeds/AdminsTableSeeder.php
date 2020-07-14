<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = New Admin;
        $init->name = "Hiskia Anggi";
        $init->username = "hiskia";
        $init->email = "hiskianggi@gmail.com";
        $init->password = Hash::make("123456");
        $init->save();

        $init = New Admin;
        $init->name = "Bagas Aditya";
        $init->username = "bagas";
        $init->email = "baagas0@gmail.com";
        $init->password = Hash::make("123456");
        $init->save();
    }
}
