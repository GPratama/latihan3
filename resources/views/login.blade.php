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
    <form action="{{route('postlogin')}}" method="POST">
    @csrf
  <div class="container" align="center">
      <div class="card col-4 my-5" align="left">
    <div class="card-body">
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
        </div>
        @if (session()->has('status'))
            <span class="text-">{{session('status')}}</span>
        @endif
        <div class="form-group mt-3">
            <button class="btn btn-primary" type="submit">Login</button>
            <a href="{{route('register')}} " class="btn btn-primary">Register</a>
        </div>
    </div>
  </div>
</form>
</div>
     <script src="{{('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>