<?php

namespace App\Http\Controllers;

use App\Models\Accesories;
use App\Models\Oli;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;

class AccesoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAccesories()
    {
        $accesories = Accesories::latest()->paginate(10);
        return view('admin.accesories.index', compact('accesories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accesories.add');
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
                'nama_produk' => 'required|unique:motors',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');

        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        Image::make($gambar)->resize(560, 460)->save('images/accesories/' . $name_gen);

        $last_img = 'images/accesories/' . $name_gen;

        Accesories::insert([
            'nama_produk' => $request->nama_produk,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('index.acc')->with('success', 'Accesories Sukses Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accesories = Accesories::find($id);
        return view('admin.accesories.edit', compact('accesories'));
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
        $acc = Accesories::find($id);

        $old_image = $request->old_image;
        $acc_image = $request->file('gambar');

        if ($acc_image) {
            $name_gen = hexdec(uniqid()) . '.' . $acc_image->getClientOriginalExtension();
            Image::make($acc_image)->resize(560, 460)->save('images/accesories/' . $name_gen);
            $last_img = 'images/accesories/' . $name_gen;
            // unlink($old_image);
            $acc->update([
                'nama_produk' => $request->nama_produk,
                // 'tipe_motor' => $request->tipe_motor,
                // 'harga' => $request->harga,
                // 'produksi' => $request->produksi,
                // 'buatan' => $request->buatan,
                'gambar' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Accesories Updated Successfully');
        } else {
            $acc->update([
                'nama_produk' => $request->nama_produk,
                // 'tipe_motor' => $request->tipe_motor,
                // 'harga' => $request->harga,
                // 'produksi' => $request->produksi,
                // 'buatan' => $request->buatan,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Accesories Updated Successfully');
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
        $acc = Accesories::find($id);
        unlink($acc->gambar);

        Accesories::find($id)->delete();
        return redirect()->back()->with('success', 'Accesories Deleted Successfully');
    }

    public function detailAcc($id)
    {
        $accesories = Accesories::find($id);

        return view('content.accesories-detail', compact('accesories'));
    }


    public function indexOli()
    {
        $oli = Oli::latest()->paginate(10);
        return view('admin.oli.index', compact('oli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOli()
    {
        return view('admin.oli.add');
    }

    public function storeOli(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_oli' => 'required',
                'jenis' => 'required',
                // 'keterangan' => 'required',
                // 'harga' => 'required',
                // 'part_code' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');

        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        Image::make($gambar)->resize(560, 460)->save('images/accesories/' . $name_gen);

        $last_img = 'images/accesories/' . $name_gen;

        Oli::insert([
            'nama_oli' => $request->nama_oli,
            'jenis' => $request->jenis,
            // 'keterangan' => $request->keterangan,
            // 'harga' => $request->harga,
            // 'part_code' => $request->part_code,
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('index.oli')->with('success', 'Oli Sukses Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showOli($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editOli($id)
    {
        $oli = Oli::find($id);
        return view('admin.oli.edit', compact('oli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateOli(Request $request, $id)
    {
        $oli = Oli::find($id);

        $old_image = $request->old_image;
        $oli_image = $request->file('gambar');

        if ($oli_image) {
            $name_gen = hexdec(uniqid()) . '.' . $oli_image->getClientOriginalExtension();
            Image::make($oli_image)->resize(560, 460)->save('images/accesories/' . $name_gen);
            $last_img = 'images/accesories/' . $name_gen;
            // unlink($old_image);
            $oli->update([
                'nama_oli' => $request->nama_oli,
                'jenis' => $request->jenis,
                // 'keterangan' => $request->keterangan,
                // 'harga' => $request->harga,
                // 'part_code' => $request->part_code,
                'gambar' => $last_img,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Oli Updated Successfully');
        } else {
            $oli->update([
                'nama_oli' => $request->nama_oli,
                'jenis' => $request->jenis,
                // 'keterangan' => $request->keterangan,
                // 'harga' => $request->harga,
                // 'part_code' => $request->part_code,
                'created_at' => Carbon::now()
            ]);

            return redirect()->back()->with('success', 'Oli Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyOli($id)
    {
        $oli = Oli::find($id);
        unlink($oli->gambar);

        Oli::find($id)->delete();
        return redirect()->back()->with('success', 'Oli Deleted Successfully');
    }

    public function detailOli($id)
    {
        $oli = Oli::find($id);

        return view('content.oli-detail', compact('oli'));
    }
}
