<?php

namespace Database\Seeders;

use App\Models\Harga;
use App\Models\Motor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plat = [
            'AB',
            'AD',
            'AE',
            'G',
        ];

        $hargaAB = [
            'Rp.17.410.000',
            'Rp.18.940.000',
            'Rp.25.160.000',
            'Rp.25.610.000',
            'Rp.16.550.000',
            'Rp.17.270.000',
            'Rp.17.770.000',
            'Rp.18.390.000',
            'Rp.19.860.000',
            'Rp.19.860.000',
            'Rp.21.970.000',
            'Rp.22.270.000',
            'Rp.19.300.000',
            'Rp.22.650.000',
            'Rp.25.600.000',
            'Rp.26.850.000',
            'Rp.30.450.000',
            'Rp.28.400.000',
            'Rp.31.830.000',
            'Rp.39.230.000',
            'Rp.43.875.000',
            'Rp.44.480.000',
            'Rp.37.875.000',
            'Rp.38.480.000',
            'Rp.37.750.000',
            'Rp.38.355.000',
            'Rp.62.495.000',
            'Rp.56.030.000',
            'Rp.38.050.000',
            'Rp.35.000.000',
            'Rp.32.270.000',
            'Rp.30.900.000',
            'Rp.62.160.000',
        ];
        $hargaAD = [
            'Rp.18.110.000',
            'Rp.19.610.000',
            'Rp.25.900.000',
            'Rp.26.300.000',
            'Rp.17.090.000',
            'Rp.17.950.000',
            'Rp.18.350.000', 
            'Rp.19.010.000',
            'Rp.20.470.000',
            'Rp.20.470.000',
            'Rp.22.590.000',
            'Rp.22.890.000',
            'Rp.20.040.000',
            'Rp.23.300.000',
            'Rp.26.320.000',
            'Rp.27.630.000',
            'Rp.31.270.000',
            'Rp.29.340.000',
            'Rp.32.790.000',
            'Rp.40.160.000',
            'Rp.44.810.000',
            'Rp.45.410.000',
            'Rp.38.780.000',
            'Rp.39.390.000',
            'Rp.38.540.000',
            'Rp.39.140.000',
            'Rp.63.600.000',
            'Rp.57.010.000',
            'Rp.38.630.000',
            'Rp.35.560.000',
            'Rp.32.980.000',
            'Rp.31.370.000',
            'Rp.63.100.000',

        ];
        $hargaG = [
            'Rp.18.110.000',
            'Rp.19.610.000',
            'Rp.25.900.000',
            'Rp.26.300.000',
            'Rp.17.090.000',
            'Rp.17.950.000',
            'Rp.18.350.000',
            'Rp.19.010.000',
            'Rp.20.470.000',
            'Rp.20.470.000',
            'Rp.22.590.000',
            'Rp.22.890.000',
            'Rp.20.040.000',
            'Rp.23.300.000',
            'Rp.26.320.000',
            'Rp.27.630.000',
            'Rp.31.270.000',
            'Rp.29.340.000',
            'Rp.32.790.000',
            'Rp.32.790.000',
            'Rp.40.160.000',
            'Rp.44.810.000',
            'Rp.45.410.000',
            'Rp.38.780.000',
            'Rp.39.390.000',
            'Rp.38.540.000',
            'Rp.39.140.000',
            'Rp.63.600.000',
            'Rp.57.010.000',
            'Rp.38.630.000',
            'Rp.35.560.000',
            'Rp.32.980.000',
            'Rp.31.370.000',
            'Rp.63.100.000',
        ];
        $hargaAE = [
            'RP.18.470.000',
            'RP.20.050.000',
            'RP.26.415.000',
            'RP.26.685.000',
            'RP.17.445.000',
            'RP.18.595.000',
            'RP.19.110.000',
            'RP.19.730.000',
            'RP.20.705.000',
            'RP.20.705.000',
            'RP.22.690.000',
            'RP.22.990.000',
            'RP.20.380.000',
            'RP.23.765.000',
            'RP.26.590.000',
            'RP.28.400.000',
            'RP.31.960.000',
            'RP.38.715.000',
            'RP.33.445.000',
            'RP.40.355.000',
            'RP.45.000.000',
            'RP.45.605.000',
            'RP.39.120.000',
            'RP.39.725.000',
            'RP.38.585.000',
            'RP.39.190.000',
            'RP.63.520.000',
            'RP.57.820.000',
            'RP.38.965.000',
            'RP.36.060.000',
            'RP.33.520.000',
            'RP.32.165.000',
            'RP.63.740.000',

        ];
        // Harga::firstOrCreate($harga);
        $motorsAD = Motor::where('plat','AD')->get();
        $motorsAE = Motor::where('plat','AE')->get();
        $motorsAB = Motor::where('plat','AB')->get();
        $motorsG = Motor::where('plat','G')->get();
        for ($i = 0; $i < 4; $i++) {
            foreach ($motorsAD as $key => $motor) {
                if ($plat[$i] == 'AD') {
                    $m = Motor::find($motor->id);
                    $m->harga()->attach('AD', ['harga' => $hargaAD[$key]]);
                }
            }

            foreach ($motorsAE as $key => $motor) {
                if ($plat[$i] == 'AE') {
                    $m = Motor::find($motor->id);
                    $m->harga()->attach('AE', ['harga' => $hargaAE[$key]]);
                }
            }

            foreach ($motorsAB as $key => $motor) {
                if ($plat[$i] == 'AB') {
                    $m = Motor::find($motor->id);
                    $m->harga()->attach('AB', ['harga' => $hargaAB[$key]]);
                }
            }

            foreach ($motorsG as $key => $motor) {
                if ($plat[$i] == 'G') {
                    $m = Motor::find($motor->id);
                    $m->harga()->attach('G', ['harga' => $hargaG[$key]]);
                }
            }
        }
    }
}
