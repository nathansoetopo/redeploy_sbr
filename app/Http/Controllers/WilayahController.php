<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Motor;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexWilayah()
    {
        $wilayah = Region::latest()->paginate(5);
        return view('admin.region.index', compact('wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.region.add');
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
                'nomor_polisi' => 'required|unique:regions',
                'provinsi' => 'required',
                'wilayah' => 'required',
                'kota' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');

        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        Image::make($gambar)->resize(500, 300)->save('images/wilayah/' . $name_gen);

        $last_img = 'images/wilayah/' . $name_gen;
        Region::insert([
            'nomor_polisi' => $request->nomor_polisi,
            'provinsi' => $request->provinsi,
            'wilayah' => $request->wilayah,
            'kota' => $request->kota,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('index')->with('success', 'Wilayah Sukses Ditambahkan');
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
        $wilayah = Region::find($id);
        return view('admin.region.edit', compact('wilayah'));
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
        $wilayah = Region::find($id);

        $old_image = $request->old_image;
        $region_image = $request->file('gambar');

        if ($region_image) {
            $name_gen = hexdec(uniqid()) . '.' . $region_image->getClientOriginalExtension();
            Image::make($region_image)->resize(500, 300)->save('images/wilayah/' . $name_gen);
            $last_img = 'images/wilayah/' . $name_gen;
            // unlink($old_image);
            $wilayah->update([
                'nomor_polisi' => $request->nomor_polisi,
                'provinsi' => $request->provinsi,
                'wilayah' => $request->wilayah,
                'kota' => $request->kota,
                'gambar' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Region Updated Successfully');
        } else {
            $wilayah->update([
                'nomor_polisi' => $request->nomor_polisi,
                'provinsi' => $request->provinsi,
                'wilayah' => $request->wilayah,
                'kota' => $request->kota,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Region Updated Successfully');
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
        $wilayah = Region::find($id);
        unlink($wilayah->gambar);

        Region::find($id)->delete();
        return redirect()->back()->with('success', 'Region Deleted Successfully');
    }

    public function ListMotorWilayah($id)
    {
        $motors = Motor::find($id);
        return view('content.product', compact('motors'));
    }
}
