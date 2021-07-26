@extends('adminlte::page')
@section('content')
<form action="{{route('produk.update',$produk->id)}}" method="post" enctype="multipart/form-data" >
    @csrf
    @method('put')
<div class="container">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{$produk->name}}" required>
    </div>
    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" value="{{$produk->harga}}" required>
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
    <button type="submit" class="btn btn-primary">edit</button>
</form>
@endsection