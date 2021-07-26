@extends('adminlte::page')
@section('content_header')
    <h3>kategori</h3>
@endsection
@section('content')
<div class="card">
<div class="card-body">
  <div class="card-body">
    <div class="mb-3" align="right">
      <a href="{{route('kategori.create')}}" class="btn btn-primary">tambah</a>
    </div>
  <table class="table table-bordered" id="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Id_kategori</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $item)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
                <a href="{{route('kategori.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                <form class="d-inline" action="{{route('kategori.destroy',$item->id)}}" method="POST" onsubmit="return confirm('yakin ingin dihapus')">
                  @csrf
                  @method('delete')
                  <button class="btn btn-primary">hapus</button>
                </form>
              </td>
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