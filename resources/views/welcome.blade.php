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
    <div class="col">
        <h1>Tabla de Servicios</h1>
        <div class="table-responsive-lg">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Folio</th>
      <th scope="col">Modelo</th>
      <th scope="col">Propietario</th>
      <th scope="col">Fecha</th>
      <th scope="col">Estatus</th>
      @auth
      <th scope="col">Eliminar</th>
      <th scope="col">Editar</th>
      @endauth
    </tr>
  </thead>
  <tbody>

  @forelse($Phones as $PhoneItem)
    <tr>
      <th scope="row">{{ $PhoneItem->Folio }}</th>
      <td>{{ $PhoneItem->Modelo }}</td>
      <td>{{ $PhoneItem->NombreP }}</td>
      <td>{{ $PhoneItem->created_at }}</td>
      <td>
          <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: {{ $PhoneItem->Estatus }}%"></div>
        </div>
    </td>
      {{--  <td>{{ $PhoneItem->Estatus }}</td>  --}}
      @auth
      <td><a class="btn btn-primary" href="{{route('phone.destroy',$PhoneItem)}}" role="button">Eliminar</a></td>
      <td><a class="btn btn-primary" href="{{route('phone.edit',$PhoneItem)}}" role="button">Editar</a></td>
      @endauth
    </tr>
    @empty
    <li>No hay Datos</li>
@endforelse

  </tbody>
</table>
    </div>
    </div>
    @auth
    <div class="col">
    <h1>Form</h1>

    @include('partials.create')
    </div>
    @endauth

  </div>
   @include('partials.footer')

    </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
   </html>
