
    <div class="form-group">
    <label for="Curso">Folio</label>
    <input type="text" name="folio" class="form-control" id="folio" aria-describedby="Folioid" value="{{ old('curso',$Phone->Curso) }}" >
    <small id="Folioid" class="form-text text-muted">{{$errors->first('folio')}}</small>
    </div>
    <div class="form-group">
    <label for="Curso">Modelo</label>
    <input type="text" name="modelo" class="form-control" id="modelo" aria-describedby="modeloid" value="{{old('maestro',$Phone->Maestro)}}" >
    <small id="modeloid" class="form-text text-muted">{{$errors->first('modelo')}}</small>
    </div>
    <div class="form-group">
    <label for="Curso">Propietario</label>
    <input type="text" name="Propietario" class="form-control" id="Propietario" aria-describedby="Propietarioid" value="{{old('salon',$Phone->Salon)}}" >
    <small id="Propietarioid" class="form-text text-muted">{{$errors->first('Propietario')}}</small>
    <div class="form-group">
    <label for="Curso">Estatus</label>
    <input type="number" name="Estatus" class="form-control" id="Estatus" aria-describedby="Estatusid" value="{{old('salon',$Phone->Salon)}}" >
    <small id="Estatusid" class="form-text text-muted">{{$errors->first('Estatus')}}</small>
    </div>
