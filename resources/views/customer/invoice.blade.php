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
    <div class="container">
        <div class="home">
            <div class="container">
              <div class="row">
                <h1 class="text-center">terima kasih</h1>
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
                                <td>{{$item->qty*$item->produk->harga}}</td>
                            </tr>
                              @endforeach
                          </tbody>
                      </table>
                </div>
       
              </div>
</div>
    <script src="{{('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>