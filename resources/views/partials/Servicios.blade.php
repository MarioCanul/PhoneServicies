<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- Styles -->

    </head>
    <body>
    <div class="container">
    @include('partials.nav')
    <div class="row">
        @if(session('status'))
        <h3> {{session('status')}}</h3>
        @endif
    <div class="col">
    <h1>Tabla</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Servicio</th>
      <th scope="col">Precio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Pagar por PayPal</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Servicio 1</th>
      <td> 459$</td>
      <td>Descripcion Servicio</td>
      <td><a class="btn btn-primary" href="{{route('phone.PaywithPaypal')}}" role="button">Pagar Servicio</a></td>
    </tr>
  </tbody>
</table>
    </div>
  </div>
  <div class="div"> @include('partials.footer')</div>
    </div>
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
   </html>
