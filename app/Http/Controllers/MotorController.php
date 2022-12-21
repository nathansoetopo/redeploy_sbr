<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Image;
use Carbon\Carbon;
use App\Models\Motor;
use App\Models\Warna;
use App\Models\Region;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use DB;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = Motor::with('harga')->latest()->paginate(10);
        $nopol = Region::all();
        return view('admin.motor.index', compact('motors', 'nopol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.motor.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_produk' => 'required',
                'tipe' => 'required',
                'plat' => 'required',
                'transmisi' => 'required',
                'harga' => 'required',
                'type_motor' => 'required',
                'berat' => 'required',
                'vol_silinder' => 'required',
                'sistem_start' => 'required',
                'suspensi_depan' => 'required',
                'tipe_ban' => 'required',
                'volume' => 'required',
                'kapasitas_tangki' => 'required',
                'image' => 'required|mimes:jpg,jpeg,png',
                'gambar_tabel' => 'required|mimes:jpg,jpeg,png',
                'gambar_spek' => 'required|mimes:jpg,jpeg,png',
                'judul_image' => 'required|mimes:jpg,jpeg,png',
            ]
        );

        $gambar = $request->file('image');
        $gambar_table = $request->file('gambar_tabel');
        $gambar_spek = $request->file('gambar_spek');
        $gambar_judul = $request->file('judul_image');
        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        $name_tbl = hexdec(uniqid()) . '.' . $gambar_table->getClientOriginalExtension();
        $name_spek = hexdec(uniqid()) . '.' . $gambar_spek->getClientOriginalExtension();
        $name_judul = hexdec(uniqid()) . '.' . $gambar_judul->getClientOriginalExtension();

        Image::make($gambar)->resize(560, 460)->save('images/motor/' . $name_gen);
        Image::make($gambar_table)->save('images/tabel/' . $name_tbl);
        Image::make($gambar_spek)->save('images/spesifikasi/' . $name_spek);
        Image::make($gambar_judul)->save('images/judul/' . $name_judul);

        $last_img = 'images/motor/' . $name_gen;
        $tabel_img = 'images/tabel/' . $name_tbl;
        $spek_img = 'images/spesifikasi/' . $name_spek;
        $judul_img = 'images/judul/' . $name_judul;

        $data = Motor::create([
            'nama_produk' => $request->nama_produk,
            'tipe' => $request->tipe,
            'plat' => $request->plat,
            'transmisi' => $request->transmisi,
            'type_motor' => $request->type_motor,
            'berat' => $request->berat,
            'vol_silinder' => $request->vol_silinder,
            'sistem_start' => $request->sistem_start,
            'suspensi_depan' => $request->suspensi_depan,
            'tipe_ban' => $request->tipe_ban,
            'volume' => $request->volume,
            'kapasitas_tangki' => $request->kapasitas_tangki,
            'created_at' => Carbon::now(),
            'gambar' => $last_img,
            'gambar_tabel' => $tabel_img,
            'gambar_spek' => $spek_img,
            'judul_image' => $judul_img,
        ]);

        $data->harga()->create([
            'plat' => $request->plat,
            'harga' => $request->harga,
        ]);

        return redirect()->route('indexMotor')->with('success', 'Motor Added Successfully');
    }

    public function updateColour($id)
    {
        $motor = Motor::with('warna')->where('id', $id)->first();
        $data = $motor->load('warna');
        $warna = Warna::all();
        return view('admin.motor.add-colour', [
            'data' => $data,
            'warna' => $warna,
        ]);
    }

    public function storeColour(Request $request)
    {
        $colour_count = count($request->colour);
        $file_count = count($request->file('files'));
        $file = $request->file('files');
        if ($file_count == $colour_count) {
            $insert = Motor::find($request->id);

            if ($insert->warna->count() > 0) {
                foreach ($insert->warna as $w) {
                    $insert->warna()->detach($w);
                }
            }
            for ($i = 0; $i < $file_count; $i++) {
                $name = time() . "_" . $file[$i]->getClientOriginalName();
                $file[$i]->move(public_path('data_motor/' . $request->id . '/warna'), $name);
                $insert->warna()->attach($request->colour[$i], ['image' => $name]);
            }
        } else {
            echo 'Jumlah Foto Dan Warna Harus Sama';
        }
        return redirect('admin/motor');
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
        $motors = Motor::find($id);
        $hargas = Harga::where('motor_id', $id)->first();

        return view('admin.motor.edit', [
            'motors' => $motors,
            'hargas' => $hargas->harga ?? 0
        ]);
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

        $motors = Motor::find($id);
        $old_image = $request->old_image;
        $motor_image = $request->file('gambar');
        $table_image = $request->file('gambar_tabel');
        $spek_image = $request->file('gambar_spek');
        $judul_image = $request->file('judul_image');

        if ($motor_image) {
            $name_gen = hexdec(uniqid()) . '.' . $motor_image->getClientOriginalExtension();
            Image::make($motor_image)->resize(560, 460)->save('images/motor/' . $name_gen);
            $last_img = 'images/motor/' . $name_gen;

            // return $motor_image;
            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                // 'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                'gambar' => $last_img,
                'updated_at' => Carbon::now()
            ]);
            $hargas = Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);
            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else if ($table_image) {
            $name_tbl = hexdec(uniqid()) . '.' . $table_image->getClientOriginalExtension();
            Image::make($table_image)->save('images/tabel/' . $name_tbl);
            $tabel_img = 'images/tabel/' . $name_tbl;
            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                // 'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                // 'gambar' => $last_img,
                'gambar_tabel' => $tabel_img,
                // 'gambar_spek' => $spek_img,
                'updated_at' => Carbon::now()
            ]);
            Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);
            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else if ($judul_image) {

            $name_jdl = hexdec(uniqid()) . '.' . $judul_image->getClientOriginalExtension();
            Image::make($judul_image)->save('images/judul/' . $name_jdl);
            $judul_img = 'images/judul/' . $name_jdl;
            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                // 'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                // 'gambar' => $last_img,
                // 'gambar_tabel' => $tabel_img,
                'judul_image' => $judul_img,
                // 'gambar_spek' => $spek_img,
                'updated_at' => Carbon::now()
            ]);
            Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);
            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else if ($spek_image) {

            $name_spek = hexdec(uniqid()) . '.' . $spek_image->getClientOriginalExtension();
            Image::make($spek_image)->save('images/spesifikasi/' . $name_spek);
            $spek_img = 'images/spesifikasi/' . $name_spek;
            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                // 'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                // 'gambar' => $last_img,
                // 'gambar_tabel' => $tabel_img,
                'gambar_spek' => $spek_img,
                'updated_at' => Carbon::now()
            ]);
            Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);

            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else if ($spek_image && $motor_image) {

            $motor_image = $request->file('gambar');
            $table_image = $request->file('gambar_tabel');
            $spek_image = $request->file('gambar_spek');

            $name_spek = hexdec(uniqid()) . '.' . $spek_image->getClientOriginalExtension();
            Image::make($spek_image)->save('images/spesifikasi/' . $name_spek);
            $spek_img = 'images/spesifikasi/' . $name_spek;

            $name_gen = hexdec(uniqid()) . '.' . $motor_image->getClientOriginalExtension();
            Image::make($motor_image)->resize(560, 460)->save('images/motor/' . $name_gen);
            $last_img = 'images/motor/' . $name_gen;


            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                'gambar' => $last_img,
                'gambar_spek' => $spek_img,
                'updated_at' => Carbon::now()
            ]);
            $hargas->update([
                'harga' => $request->harga,
            ]);

            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else if ($spek_image && $table_image) {

            $motor_image = $request->file('gambar');
            $table_image = $request->file('gambar_tabel');
            $spek_image = $request->file('gambar_spek');

            $name_tbl = hexdec(uniqid()) . '.' . $table_image->getClientOriginalExtension();
            Image::make($table_image)->save('images/tabel/' . $name_tbl);
            $tabel_img = 'images/tabel/' . $name_tbl;

            $name_spek = hexdec(uniqid()) . '.' . $spek_image->getClientOriginalExtension();
            Image::make($spek_image)->save('images/spesifikasi/' . $name_spek);
            $spek_img = 'images/spesifikasi/' . $name_spek;
            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                // 'gambar' => $last_img,
                'gambar_tabel' => $tabel_img,
                'gambar_spek' => $spek_img,
                'updated_at' => Carbon::now()
            ]);
            Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);
            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else if ($spek_image && $table_image && $motor_image) {
            $motor_image = $request->file('gambar');
            $table_image = $request->file('gambar_tabel');
            $spek_image = $request->file('gambar_spek');

            $name_tbl = hexdec(uniqid()) . '.' . $table_image->getClientOriginalExtension();
            Image::make($table_image)->save('images/tabel/' . $name_tbl);
            $tabel_img = 'images/tabel/' . $name_tbl;

            $name_spek = hexdec(uniqid()) . '.' . $spek_image->getClientOriginalExtension();
            Image::make($spek_image)->save('images/spesifikasi/' . $name_spek);
            $spek_img = 'images/spesifikasi/' . $name_spek;

            $name_gen = hexdec(uniqid()) . '.' . $motor_image->getClientOriginalExtension();
            Image::make($motor_image)->resize(560, 460)->save('images/motor/' . $name_gen);
            $last_img = 'images/motor/' . $name_gen;

            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                'gambar' => $last_img,
                'gambar_tabel' => $tabel_img,
                'gambar_spek' => $spek_img,
                'updated_at' => Carbon::now()
            ]);
            Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);

            return redirect()->back()->with('success', 'Motor Updated Successfully');
        } else {
            $motors->update([
                'nama_produk' => $request->nama_produk,
                'tipe' => $request->tipe,
                'plat' => $request->plat,
                'transmisi' => $request->transmisi,
                'type_motor' => $request->type_motor,
                'berat' => $request->berat,
                'harga' => $request->harga,
                'vol_silinder' => $request->vol_silinder,
                'sistem_start' => $request->sistem_start,
                'suspensi_depan' => $request->suspensi_depan,
                'tipe_ban' => $request->tipe_ban,
                'volume' => $request->volume,
                'kapasitas_tangki' => $request->kapasitas_tangki,
                'updated_at' => Carbon::now()
            ]);

            Harga::where('motor_id', $id)->update([
                'harga' => $request->harga,
            ]);

            return redirect()->back()->with('success', 'Motor Updated Successfully');
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
        $motors = Motor::find($id);
        unlink($motors->gambar);

        Motor::find($id)->delete();
        return redirect()->back()->with('success', 'Motor Deleted Successfully');
    }

    public function listMotor($wilayahID)
    {
        $wilayah = Region::find($wilayahID);
        $motors = Motor::whereHas('harga')->where('plat', $wilayah->nomor_polisi)->get();
        $prices = Harga::where('plat', $wilayah->nomor_polisi)->first();
        return view('content.list-motor', compact('motors', 'wilayah', 'prices'));
    }


    public function detailMotor($id)
    {
        $motors = Motor::with('harga')->find($id);
        // return $motors;
        $image = $motors->warna()->where('id', 1)->first();
        $data = $motors->load('warna');
        return view('content.detail-motor', compact('motors', 'data', 'image'));
    }
}
