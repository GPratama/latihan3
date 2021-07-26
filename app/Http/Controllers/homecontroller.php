<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\produk;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homecontroller extends Controller
{
    public function home()
    {
        $data =produk::all();

        return view('customer.home',compact('data'));
    }
    public function list(Request  $request)
    {
        $data = produk::with('kategori')->when($request->search, function($query) use ($request) {
            $query->where('name','rlike',$request->search);
        })->get();

        return view('customer.list',compact('data'));
    }
    public function detail(Request $request,produk $produk)
    {
        return view('customer.detail',compact('produk'));
    }
    public function keranjang(Request $request)
    {
        $data = detailtransaksi::where('status','keranjang')->with('produk')->get();

        return view('customer.keranjang',compact('data'));
    }
    public function postkeranjang(Request $request,produk $produk)
    {
        $data = $request->validate([
            'qty'=>'required'
        ]);
        $data['user_id']=Auth::id();
        $data['produk_id']=$produk->id;
        $data['status']='keranjang';
        $data['totalharga']=$produk->harga*$request->qty;

        $detailOld = detailtransaksi::where('produk_id',$produk->id)->where('user_id',Auth::id())->where('status','keranjang')->first();

        if ($detailOld==null) {
            detailtransaksi::create($data);
        } else {
            $detailOld->increment('qty', $request->qty);
            $detailOld->increment('totalharga',$produk->harga*$request->qty);
        }

         return redirect()->route('customer.keranjang')->with('status','dimasukan kedalam keranjang');
    }
    public function deletekeranjang(detailtransaksi $detailtransaksi)
    {
        try {
            $detailtransaksi->delete();
        } catch (\Exception $ex) {

            return back()->with('status','tidak berhasil');
        }
        return back()->with('status','berhasil di hapus');
    }
    public function cekout(Request $request)
    {
        $keranjang = detailtransaksi::where('user_id',Auth::id())->where('status','keranjang')->with('produk')->get();

        $transaksi=transaksi::create([
            'user_id'=>Auth::id(),
            'totalharga'=>$keranjang->sum('totalharga'),
            'kode'=>'INV/' . now()->format('Y-m-d') . transaksi::whereDate('created_at', now())->count()
        ]);

        detailtransaksi::where('user_id',Auth::id())->where('status','keranjang')->update([
            'status'=>'cekout',
            'transaksi_id'=>$transaksi->id,
        ]);

        return redirect()->route('customer.invoice', $transaksi->id);
    }
    public function invoice(transaksi $transaksi)
    {
        
        $transaksi->detailtransaksi;
        
        return view('customer.invoice', compact('transaksi'));
    }
}
