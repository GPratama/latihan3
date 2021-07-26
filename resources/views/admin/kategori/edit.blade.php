@extends('adminlte::page')
@section('content_header')
    <h3>Edit kategori</h3>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('kategori.update',$kategori)}}" method="POST">
            @csrf
            @method('put')
        <div class="container">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" value={{"$kategori->name"}} required>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        </form>
    </div>
</div>
@endsection