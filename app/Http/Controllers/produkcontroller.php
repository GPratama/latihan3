<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;

class produkcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = produk::all();

        return view('admin.produk.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = kategori::all();

        return view('admin.produk.create',compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'=>'required',
            'harga'=>'required',
            'foto'=>'required|image',
            'kategori_id'=>'required'
        ]);

        $data ['foto']=$request->foto->store('images');

        produk::create($data);

        return redirect()->route('produk.index')->with('berhasil tambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(produk $produk)
    {
        $kategoris =kategori::all();
        return view('admin.produk.edit' ,compact('produk','kategoris'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, produk $produk)
    {
        $data=$request->validate([
            'name'=>'required',
            'harga'=>'required',
            'foto'=>'required|image',
            'kategori_id'=>'required'
        ]);

        $data ['foto']=$request->foto->store('images');

        $produk->update($data);

        return redirect()->route('produk.index')->with('berhasil tambah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(produk $produk)
    {
        try {
            $produk->delete();
        } catch (\Exception $ex) {

            return back()->with('status','tidak berhasil');
        }
        return back()->with('status','berhasil di hapus');
    }
}
