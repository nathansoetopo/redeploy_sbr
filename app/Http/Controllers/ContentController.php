<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Artikel;
use App\Models\Dealer;
use App\Models\Region;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function detailMotor($id){
        $data = Motor::find($id);
        return view('content.detail-motor', [
            'data' => $data,
        ]);
    }
     public function sitemapArtikel()
    {         
        $region = Region::all();
        $dealer = Dealer::all();
        $motor = Motor::all();
        $artikel = Artikel::all();
        // return $artikel;
        return response()->view('content.sitemap-artikel', compact('artikel', 'motor', 'dealer', 'region'))->header('Content-type', 'text/xml');
    }
}
