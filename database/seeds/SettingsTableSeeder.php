<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = New Setting;
        $init->slug = "title";
        $init->name = "Nama Website";
        $init->value = "Media Panel";
        $init->save();
    }
}
