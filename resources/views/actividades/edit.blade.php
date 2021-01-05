@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editar Actividad
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
    <form method="post" action="{{ route('actividades.update', $actividades->id) }}">
      <div class="col">
        <h1 class="text-center">Editando: {{$actividades->nombre_act}}</h1>
      </div>

      @csrf
      @method('PATCH')
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="inputname">Nombre de actividad</label>
          <input type="text" class="form-control" name="nombre_act" value="{{$actividades->nombre_act}}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputname">Descripcion</label>
          <input type="text" class="form-control" name="descripcion" value="{{$actividades->descripcion}}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputraza">Lote o animal</label>
          <input type="text" class="form-control" name="lote_animal" value="{{$actividades->lote_animal}}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputFecha_nac">Fecha</label>
          <input type="date" class="form-control" name="fecha" value="{{$actividades->fecha}}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputOrigen">Origen</label>
          <input type="text" class="form-control" name="encargado" value="{{$actividades->encargado}}">
        </div>
        <div class="form-group col-md-4">
          <label for="inputOrigen">Origen</label>
          <input type="text" class="form-control" name="producto" value="{{$actividades->producto}}">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Actualizar actividad</button>
      <a href="{{route('actividades.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection