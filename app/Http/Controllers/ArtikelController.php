<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Artikel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();
        return view('admin.artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.artikel.add');
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
                'judul' => 'required',
                // 'tipe_motor' => 'required',
                // 'produksi' => 'required',
                // 'harga' => 'required',
                'description' => 'required',
                'gambar' => 'required|mimes:jpg,jpeg,png',
            ]

        );

        $gambar = $request->file('gambar');

        $name_gen = hexdec(uniqid()) . '.' . $gambar->getClientOriginalExtension();
        // Image::make($gambar)->resize(500, 300)->save('images/artikel/' . $name_gen);

        $last_img = 'images/artikel/' . $name_gen;

        Artikel::insert([
            'judul' => $request->judul,
            'author' => $request->author,
            'description' => $request->description,
            // 'produksi' => $request->produksi,
            'slug' => Str::slug($request->judul),
            'gambar' => $last_img,
            'created_at' => Carbon::now()
        ]);


        return redirect()->route('index.artikel')->with('success', 'Artikel Sukses Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $acc = Artikel::find($id);

        $old_image = $request->old_image;
        $acc_image = $request->file('gambar');

        if ($acc_image) {
            $name_gen = hexdec(uniqid()) . '.' . $acc_image->getClientOriginalExtension();
            Image::make($acc_image)->resize(500, 300)->save('images/artikel/' . $name_gen);
            $last_img = 'images/artikel/' . $name_gen;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            // unlink($old_image);
            $acc->update([
                'judul' => $request->judul,
                'author' => $request->author,
                'description' => $request->description,
                'slug' => Str::slug($request->judul),
                'gambar' => $last_img,
            ]);

            return redirect()->back()->with('success', 'Artikel Updated Successfully');
        } else {
            $acc->update([
                'judul' => $request->judul,
                'author' => $request->author,
                'description' => $request->description,
                'slug' => Str::slug($request->judul),
            ]);

            return redirect()->back()->with('success', 'Artikel Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $acc = Artikel::find($id);
        if (file_exists($acc->gambar)) {
            unlink($acc->gambar);
            Artikel::find($id)->delete();
            return redirect()->back()->with('success', 'Artikel Deleted Successfully');
        } else {
            Artikel::find($id)->delete();
            return redirect()->back()->with('success', 'Artikel Deleted Successfully');
        }
    }

    public function list_artikel()
    {
        $artikel = Artikel::latest()->paginate(5);
        return view('content.blog', compact('artikel'));
    }

    public function artikel(Artikel $artikel)
    {
        return view('content.blog-detail', compact('artikel'));
    }
}
