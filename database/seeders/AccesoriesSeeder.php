<?php

namespace Database\Seeders;

use App\Models\Accesories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccesoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'nama_produk' => 'Battery Aki',
                'gambar' => 'assets/images/YGP&Yamalube/battery aki.png',

            ],

            [
                'nama_produk' => 'Kampas REM',
                'gambar' => 'assets/images/YGP&Yamalube/kampasrem1.png',

            ],

            [
                'nama_produk' => 'Rantai SET',
                'gambar' => 'assets/images/YGP&Yamalube/rantai1.png',

            ],

            [
                'nama_produk' => 'Saringan Udara',
                'gambar' => 'assets/images/YGP&Yamalube/saringanudara.png',

            ],

            [
                'nama_produk' => 'Busi',
                'gambar' => 'assets/images/YGP&Yamalube/busi.png',

            ],

            [
                'nama_produk' => 'Ban Luar',
                'gambar' => 'assets/images/YGP&Yamalube/banluar.png',

            ],

            [
                'nama_produk' => 'CVT Grease KIT',
                'gambar' => 'assets/images/YGP&Yamalube/cvt.png',

            ],

            [
                'nama_produk' => 'Oil Filter',
                'gambar' => 'assets/images/YGP&Yamalube/oilfilter.png',

            ],

        ])->each(function ($acc) {
            Accesories::firstOrcreate($acc);
        });
    }
}
