@extends('adminlte::page')
@section('content_header')
    <h3>Transaksi </h3>
@endsection
@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-body">
    <table class="table table-bordered" id="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">invoice</th>
          <th scope="col">total harga</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transaksi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->kode}}</td>
                <td>{{$item->totalharga}}</td>
                <td><a class="btn btn-primary" href="{{route('transaksi.show',$item->id)}}">detail</a></td>
            </tr>
        @endforeach
      </tbody>
    </table>
    </div>
</div>
@endsection
@push('js')
<script>
  $(function() {
      $("#table").DataTable();
  })
</script>
@endpush