<?php

namespace Database\Seeders;

use App\Models\Warna;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WarnaSeeder extends Seeder
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
                'name' => 'Cyan',
                'kode' => '#00ffff',
            ],
            [
                'name' => 'Hitam',
                'kode' => '#000000',
            ],
            [
                'name' => 'Grey',
                'kode' => '#d4d4d4',
            ],
            [
                'name' => 'Red',
                'kode' => '#FF0000',
            ],
            [
                'name' => 'White',
                'kode' => '#F8F8FF',
            ],
            [
                'name' => 'Grey',
                'kode' => '#696969',
            ],
            [
                'name' => 'Black Matte',
                'kode' => '#080808',
            ],
            [
                'name' => 'Red Matte',
                'kode' => '#c51f1a',
            ],
            [
                'name' => 'Matte Olive',
                'kode' => '#777838',
            ],
            [
                'name' => 'Blue Navy',
                'kode' => '#000080',
            ],
            [
                'name' => 'Light Blue',
                'kode' => '#badbff',
            ],
            [
                'name' => 'Pink',
                'kode' => '#ffc0cb',
            ],
            [
                'name' => 'Matte Grey',
                'kode' => '#383838',
            ],
            [
                'name' => 'Dark Green',
                'kode' => '#254038',
            ],
            [
                'name' => 'Yellow',
                'kode' => '#ffff00',
            ],
            [
                'name' => 'Silver',
                'kode' => '#c0c0c0',
            ],
            [
                'name' => 'Blue Matte',
                'kode' => '#000035',
            ],
        ])->each(function ($warna) {
            Warna::firstOrcreate($warna);
        });
    }
}
