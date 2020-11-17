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
    <h1>Tabla</h1>
    <table class="table">
  <thead>

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
        </div></td>
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
    <div class="col">
    <h1>Form Edit</h1>
    <form action="{{route('phone.update',$Phone)}}" method="POST">
    @csrf
    @method('PATCH')
    <div class="form-group">
    <label for="Curso">Folio</label>
    <input type="text" name="folio" class="form-control" id="folio" aria-describedby="Folioid" value="{{ old('curso',$Phone->Folio) }}" >
    <small id="Folioid" class="form-text text-muted">{{$errors->first('folio')}}</small>
    </div>
    <div class="form-group">
    <label for="Curso">Modelo</label>
    <input type="text" name="modelo" class="form-control" id="modelo" aria-describedby="modeloid" value="{{old('maestro',$Phone->Modelo)}}" >
    <small id="modeloid" class="form-text text-muted">{{$errors->first('modelo')}}</small>
    </div>
    <div class="form-group">
    <label for="Curso">Propietario</label>
    <input type="text" name="Propietario" class="form-control" id="Propietario" aria-describedby="Propietarioid" value="{{old('salon',$Phone->NombreP)}}" >
    <small id="Propietarioid" class="form-text text-muted">{{$errors->first('Propietario')}}</small>
    <div class="form-group">
    <label for="Curso">Estatus</label>
    <input type="number" name="Estatus" class="form-control" id="Estatus" aria-describedby="Estatusid" value="{{old('salon',$Phone->Estatus)}}" >
    <small id="Estatusid" class="form-text text-muted">{{$errors->first('Estatus')}}</small>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
 </form>
    </div>
  </div>

  <div class="div"> @include('partials.footer')</div>
    </div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
   </html>



