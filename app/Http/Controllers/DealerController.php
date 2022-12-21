<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Motor;
use App\Models\Dealer;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealers = Dealer::latest()->paginate(10);
        return view('admin.dealer.index', compact('dealers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::all();
        return view('admin.dealer.add', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_dealer' => 'required',
                'lokasi' => 'required',
                'plat' => 'required',
                'link_lokasi' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');

        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        Image::make($gambar)->resize(560, 460)->save('images/dealer/' . $name_gen);

        $last_img = 'images/dealer/' . $name_gen;

        Dealer::insert([
            'nama_dealer' => $request->nama_dealer,
            'lokasi' => $request->lokasi,
            'plat' => $request->plat,
            'link_lokasi' => $request->link_lokasi,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('index.dealer')->with('success', 'Dealer Sukses Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dealers = Dealer::find($id);
        return view('admin.dealer.edit', compact('dealers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dealer = Dealer::find($id);

        $old_image = $request->old_image;
        $dealer_image = $request->file('gambar');

        if ($dealer_image) {
            $name_gen = hexdec(uniqid()) . '.' . $dealer_image->getClientOriginalExtension();
            Image::make($dealer_image)->resize(560, 460)->save('images/dealer/' . $name_gen);
            $last_img = 'images/dealer/' . $name_gen;
            // unlink($old_image);
            $dealer->update([
                'nama_dealer' => $request->nama_dealer,
                'lokasi' => $request->lokasi,
                'plat' => $request->plat,
                'link_lokasi' => $request->link_lokasi,
                'gambar' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Dealer Updated Successfully');
        } else {
            $dealer->update([
                'nama_dealer' => $request->nama_dealer,
                'lokasi' => $request->lokasi,
                'plat' => $request->plat,
                'link_lokasi' => $request->link_lokasi,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Dealer Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealer = Dealer::find($id);
        unlink($dealer->gambar);

        Dealer::find($id)->delete();
        return redirect()->back()->with('success', 'Dealer Delete Successfully');
    }

    public function listDealer($id)
    {
        $wilayah = Region::find($id);
        $dealers = Dealer::where('plat', $wilayah->nomor_polisi)->get();
        return view('content.list-dealer', compact('dealers'));
    }

    public function detailDealer($id)
    {
        $dealers = Dealer::find($id);
        return view('content.detail-dealer', compact('dealers'));
    }
}
