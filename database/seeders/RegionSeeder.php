<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionSeeder extends Seeder
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
                'nomor_polisi' => 'AD',
                'provinsi' => 'Jawa Tengah',
                'wilayah' => 'Karesidenan Surakarta',
                'kota' => 'Surakarta',
                'gambar' => 'assets/images/Region/NEW/4.png',

            ],
            [
                'nomor_polisi' => 'G',
                'provinsi' => 'Jawa Tengah',
                'wilayah' => 'Tegal',
                'kota' => 'Pekalongan',
                'gambar' => 'assets/images/Region/NEW/3.png',

            ],
            [
                'nomor_polisi' => 'AB',
                'provinsi' => 'Daerah Istimewa Yogyakarta',
                'wilayah' => 'Yogyakarta',
                'kota' => 'Sleman',
                'gambar' => 'assets/images/Region/NEW/1.png',

            ],
            [
                'nomor_polisi' => 'AE',
                'provinsi' => 'Jawa Timur',
                'wilayah' => 'Madiun',
                'kota' => 'Ponorogo',
                'gambar' => 'assets/images/Region/NEW/2.png',

            ],

        ])->each(function ($regions) {
            Region::firstOrcreate($regions);
        });
    }
}
