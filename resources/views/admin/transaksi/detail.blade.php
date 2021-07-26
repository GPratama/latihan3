@extends('adminlte::page')

@section('content')
<div class="row py-5">
    <div class="container-fluid">
      <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                  
                    @foreach ($transaksi->detailtransaksi as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td><img src="{{asset($item->produk->foto)}}" width="150" alt=""></td>
                      <td>{{$item->produk->name}}</td>
                      <td>{{$item->produk->harga}}</td>
                      <td>{{$item->qty}}</td>
                      <td>{{$item->totalharga}}</td>
                  </tr>
                    @endforeach
                </tbody>
            </table>
@endsection