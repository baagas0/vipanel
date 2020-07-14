<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = New News;
        $init->title = 'New Layanan';
        $init->category = 'info';
        $init->content = 'Instagram Followers Indonesia S2 [5K] PERINPUT 2K MIN 500 RP 35,000 ID 2995';
        $init->save();

        $init = New News;
        $init->title = 'Update Web';
        $init->category = 'Update';
        $init->content = 'Berikut perubahan & perbaikan sistem yang sudah kami lakukan:
            - Tampilan responsive website untuk device Tablet & Mobile/Smartphone sudah bisa
            - Limit/batas pesanan dengan target pesanan yang sama jika pesanan belum selesai diproses sekarang bertambah menjadi maksimal 5 pesanan';
        $init->save();
    }
}
