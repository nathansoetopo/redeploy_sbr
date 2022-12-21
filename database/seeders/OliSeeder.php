<?php

namespace Database\Seeders;

use App\Models\Oli;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OliSeeder extends Seeder
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
                'nama_oli' => 'Matic Motor Oil',
                'jenis' => 'Matic Oil',
                'gambar' => 'assets/images/YGP&Yamalube/maticmotoroil.png',
            ],
            [
                'nama_oli' => 'Power Motor Oil',
                'jenis' => 'Matic Oil',
                'gambar' => 'assets/images/YGP&Yamalube/powermatic.png',
            ],
            [
                'nama_oli' => 'Super Motor Oil',
                'jenis' => 'Matic Oil',
                'gambar' => 'assets/images/YGP&Yamalube/supermatic.png',
            ],
            [
                'nama_oli' => '2T Motor Oil',
                'jenis' => 'Sport Oil',
                'gambar' => 'assets/images/YGP&Yamalube/2t.png',
            ],
            [
                'nama_oli' => 'Sport Motor Oil',
                'jenis' => 'Sport Oil',
                'gambar' => 'assets/images/YGP&Yamalube/sportmotor.png',
            ],
            [
                'nama_oli' => 'Super Sport Oil',
                'jenis' => 'Sport Oil',
                'gambar' => 'assets/images/YGP&Yamalube/supersportoil.png',
            ],
            [
                'nama_oli' => 'RS4GP',
                'jenis' => 'Sport Oil',
                'gambar' => 'assets/images/YGP&Yamalube/rs4gp.png',
            ],
            [
                'nama_oli' => 'Silver Motor Oil',
                'jenis' => 'Moped Oil',
                'gambar' => 'assets/images/YGP&Yamalube/silvermotoroil.png',
            ],
            [
                'nama_oli' => 'Yamalube XP-50',
                'jenis' => 'Moped Oil',
                'gambar' => 'assets/images/YGP&Yamalube/XP50.png',
            ],
            [
                'nama_oli' => 'Brake Fluid',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/brakefluid.png',
            ],
            [
                'nama_oli' => 'Carbon Cleaner',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/carboncleaner.png',
            ],
            [
                'nama_oli' => 'Chanin Lube',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/chaincube.png',
            ],
            [
                'nama_oli' => 'Gear Motor Oil',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/gearmotoroil.png',
            ],
            [
                'nama_oli' => 'Front Fork Oil G-10',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/frontforkoil.png',
            ],
            [
                'nama_oli' => 'Yamacoolant',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/yamacoolant.png',
            ],
            [
                'nama_oli' => 'Multipurpose',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/multipurpose.png',
            ],
            [
                'nama_oli' => 'Yamabond',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/yamabond.png',
            ],
            [
                'nama_oli' => 'Yamalube Parts and Brake Cleaner',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/yamalubepart.png',
            ],
            [
                'nama_oli' => 'Yamalube Mold Technology',
                'jenis' => 'Chemical',
                'gambar' => 'assets/images/YGP&Yamalube/YML.png',
            ],

        ])->each(function ($regions) {
            Oli::firstOrcreate($regions);
        });
    }
}
