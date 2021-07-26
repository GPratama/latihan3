@extends('adminlte::page')
@section('content_header')
    <h3>Tambah Produk</h3>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('produk.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>
                <div class="form-group">
                    <label >kategori</label>
                    <select name="kategori_id" class="form-control">
                        @foreach ($kategoris as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection