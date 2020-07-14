<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = New User;
        $init->name = "Hiskia Anggi";
        $init->username = "hiskia";
        $init->email = "hiskianggi@gmail.com";
        $init->email_verified_at = now()->format('Y-m-d H:i:s');
        $init->password = Hash::make("123456");
        $init->save();

        $init = New User;
        $init->name = "Bagas Aditya";
        $init->username = "bagas";
        $init->email = "baagas0@gmail.com";
        $init->email_verified_at = now()->format('Y-m-d H:i:s');
        $init->password = Hash::make("123456");
        $init->save();
    }
}
