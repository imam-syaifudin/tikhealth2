<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Set waktu local untuk digunakan pada field tanggal pembuatan artikel
date_default_timezone_set("Asia/Jakarta");

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // Mengambil seluruh data artikel
        $artikel = Artikel::all();

        return view('artikel.artikel',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // Mengambil seluruh data kategori untuk dikirim ke halaman view/add
        $kategori = Kategori::all();

        return view('artikel.add',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // Melakukan syntax create artikel

        Artikel::create([
            'kategori_id' => $request->kategori_id,
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'foto' => $request->file('foto')->store('artikel/foto'),
            'isi' => $request->isi,
            'tanggalArtikel' => date("Y/m/d"),
        ]);
        
        return redirect('/artikel');
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
    public function edit(Artikel $artikel)
    {
        //
        // Mengambil seluruh data kategori untuk dikirim ke halaman view/edit
        $kategori = Kategori::all();

        // mereturn ke view beserta data
        return view('artikel.edit',compact('artikel','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
        // pengecekan jika ada foto yang diupload apa tidak
        $foto = '';

        // jika ada maka akan mengganti foto baru, dan menghapus yang lama dari penyimpanan
        if ( $request->file('foto') ){
            Storage::delete($artikel->foto);
            $foto = $request->file('foto')->store('artikel/foto');
        } else {
            // jika tidak tetap menggunakan foto lama
            $foto = $artikel->foto;
        }
        
        // Melakukan syntax update
        $artikel->update([
            'kategori_id' => $request->kategori_id,
            'kategori_id' => $artikel->user_id,
            'judul' => $request->judul,
            'foto' => $foto,
            'isi' => $request->isi,
            'tanggalArtikel' => $artikel->tanggalArtikel,
        ]);
        
        return redirect('/artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        //
        // Melakukan delete artikel beserta menghapus gambar dari storage
        Storage::delete($artikel->foto);
        $artikel->delete();

        return redirect('/artikel');
    }
}
