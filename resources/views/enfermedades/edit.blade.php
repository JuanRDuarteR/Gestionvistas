<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Editando animal
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
    <form method="post" action="{{ route('enfermedades.update', $enfermedad->id) }}">
      <div class="col">
        <h2 class="text-center">Editando: {{$enfermedad->arete_vaca}}</h2>
      </div>
      @csrf
      @method('PATCH')
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="arete">Arete vaca:</label>
          <input type="text" class="form-control" name="arete_vaca" value="{{$enfermedad->arete_vaca}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="fecha">Fecha:</label>
          <input type="date" class="form-control" name="fecha" value="{{$enfermedad->fecha}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="enfermedad">Enfermedad:</label>
          <input type="text" class="form-control" name="enfermedad" value="{{$enfermedad->enfermedad}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="tratamiento">Tratamiento:</label>
          <input type="text" class="form-control" name="tratamiento" value="{{$enfermedad->tratamiento}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="encargado">Encargado:</label>
          <input type="text" class="form-control" name="encargado" value="{{$enfermedad->encargado}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="estado">Estado:</label>
          <input type="text" class="form-control" name="estado" value="{{$enfermedad->estado}}" />
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar enfermedad</button>
      <a href="{{route('enfermedades.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection