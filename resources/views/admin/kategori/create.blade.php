@extends('adminlte::page')
@section('content_header')
    <h3>Tambah kategori</h3>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('kategori.store')}}" method="POST">
            @csrf
            <div class="container">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection