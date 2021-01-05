@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar Actividad
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('actividades.store') }}">
      @csrf
      <div class="form-row">
          
          <div class="form-group col-md-4"> <!-- State Button -->
            <label for="actividad" class="control-label">Actividad</label>
              <select class="form-control" name="nombre_act">
                <option>Colocacion de arete</option>
                <option>Herrar</option>
                <option>Revision</option>
                <option>Vacunacion</option>
              </select>
          </div>
          <div class="form-group col-md-4">
              <label for="name">Descripcion:</label>
              <input type="text" class="form-control" name="descripcion"/>
          </div>
          <div class="form-group col-md-4">
              <label for="name">Lote o Animal:</label>
              <input type="text" class="form-control" name="lote_animal"/>
          </div>
          <div class="form-group col-md-4">
              <label for="quantity">Fecha:</label>
              <input type="date" class="form-control" name="fecha"/>
          </div>
          <div class="form-group col-md-4">
              <label for="price">Encargado :</label>
              <input type="text" class="form-control" name="encargado"/>
          </div>
          <div class="form-group col-md-4">
              <label for="quantity">Producto:</label>
              <input type="text" class="form-control" name="producto"/>
          </div>
          <div class="form-group col-md-4" style="display: none">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" name="usuario" value="{{auth()->user()->email}}"/>
          </div>
          </div>
          <button type="submit" class="btn btn-primary">Crear Actividad</button>
          <a href="{{route('actividades.index')}}" class="btn btn-success">Volver</a>
      </form>
  </div>
</div>
@endsection