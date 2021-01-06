@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Registrat Enfermedad
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
      <form method="post" action="{{ route('enfermedades.store') }}">
      @csrf
      <div class="form-row">
          <div class="form-group col-md-4">
              <label for="arete">Arete vaca:</label>
              <input type="text" class="form-control" name="arete_vaca"/>
          </div>
          <div class="form-group col-md-4">
              <label for="incorporacion">Fecha:</label>
              <input type="date" class="form-control" name="fecha"/>
          </div>
          <div class="form-group col-md-4">
              <label for="peso">Enfermedad:</label>
              <input type="text" class="form-control" name="enfermedad"/>
          </div>
          <div class="form-group col-md-4">
              <label for="peso">Tratamiento:</label>
              <input type="text" class="form-control" name="tratamiento"/>
          </div>
          <div class="form-group col-md-4">
              <label for="name">Encargado:</label>
              <input type="text" class="form-control" name="encargado"/>
          </div>
          <div class="form-group col-md-4">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="estado"/>
          </div>
          <div class="form-group col-md-4" style="display: none">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" name="usuario" value="{{auth()->user()->email}}"/>
          </div>
          </div>
          <button type="submit" class="btn btn-primary">Registrar enfermedad</button>
          <a href="{{route('enfermedades.index')}}" class="btn btn-success">Volver</a>
      </form>
  </div>
</div>
@endsection