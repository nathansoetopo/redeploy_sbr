<?php

namespace Database\Seeders;

use App\Models\Accesories;
use App\Models\Warna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            MotorSeeder::class,
            RegionSeeder::class,
            DealerSeeder::class,
            OliSeeder::class,
            AccesoriesSeeder::class,
            HargaSeeder::class,
            WarnaSeeder::class,
            // JudulSeeder::class,
        ]);
    }
}
