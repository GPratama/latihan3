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
   @include('template.navbar')
        <div class="home">
            <div class="container">
               @include('template.card')
        </div>
</div>
</div>
    <script src="{{('bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>