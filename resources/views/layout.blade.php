<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Virtua|Gestion Ganado</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body style="background-image: url('{{URL::asset('/images/vaca.jpg')}}'); background-size: cover; background-position: top center;">
<nav class="navbar navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Virtua</a>
    <a href="{{ url('/') }} " class="btn btn-primary">Menu</a>
</nav>
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>