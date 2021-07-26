<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container-fluid">
    {{-- <form action="{{route('')}}"></form> --}}
   @include('template.navbar')
    <div class="container">
        <div class="home">
            <div class="container">
              <div class="row">
                <h1 class="text-center">Detail</h1>
              </div>
            </div>
          </div>
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
                                  <th scope="col">Hapus</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($data as $item)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img src="{{asset($item->produk->foto)}}" width="150" alt=""></td>
                                <td>{{$item->produk->name}}</td>
                                <td>{{$item->produk->harga}}</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->totalharga}}</td>
                                <td>
                                    <form class="d-inline" action="{{route('customer.deletekeranjang',$item->id)}}" method="POST" onsubmit="return confirm('yakin ingin dihapus')">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-primary">hapus</button>
                                      </form>
                                </td>
                            </tr>
                              @endforeach
                          </tbody>
                      </table>
                      <div class="mt-2 mx-5" align="right" ><a class="btn btn-success" href="{{route('customer.cekout')}}">Cekout</a></div>
                </div>
       
              </div>
</div>
    <script src="{{('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>