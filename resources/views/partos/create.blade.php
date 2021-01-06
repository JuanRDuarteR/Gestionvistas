@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar Parto
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
      <form method="post" action="{{ route('partos.store') }}">
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
              <label for="peso">Peso(Kg):</label>
              <input type="text" class="form-control" name="peso"/>
          </div>
          <div class="form-group col-md-4"> <!-- State Button -->
            <label for="raza" class="control-label">Raza</label>
              <select class="form-control" name="raza">
                <option>Aberdeen angus</option>
                <option>Afrikaner</option>
                <option>Angus-Brangus</option>
                <option>Ankole-Watusi</option>
                <option>Arouquesa</option>
                <option>Belgian Blue</option>
                <option>Braford</option>
                <option>Brahman</option>
                <option>Brangus</option>
                <option>Caracu</option>
                <option>Raza Carora</option>
                <option>Charolesa</option>
                <option>Charolais</option>
                <option>Cholistani</option>
                <option>Clavel</option>
                <option>Fernandina</option>
                <option>Hanu</option>
                <option>Hartón del Valle</option>
                <option>Bovino de Heck</option>
                <option>Hereford</option>
                <option>Holstein</option>
                <option>Vacuno Sanga</option>
                <option>Santa Gertrudis</option>
                <option>Sayaguesa</option>
                <option>Senepol</option>
                <option>Shorthorn</option>
                <option>Simmental</option>
              </select>
          </div>
          <div class="form-group col-md-4">
              <label for="encargado">Encargado:</label>
              <input type="text" class="form-control" name="encargado"/>
          </div>
          <div class="form-group col-md-4"> <!-- State Button -->
            <label for="estado" class="control-label">Estado</label>
              <select class="form-control" name="estado">
                <option>Vivo</option>
                <option>Muerto</option>
              </select>
          </div>
          <div class="form-group col-md-4"> <!-- State Button -->
            <label for="sexo" class="control-label">Sexo</label>
              <select class="form-control" name="sexo">
                <option>Macho</option>
                <option>Hembra</option>
              </select>
          </div>
          <div class="form-group col-md-4" style="display: none">
              <label for="usuario">Usuario</label>
              <input type="text" class="form-control" name="usuario" value="{{auth()->user()->email}}"/>
          </div>
          </div>
          <button type="submit" class="btn btn-primary">Crear Parto</button>
          <a href="{{route('partos.index')}}" class="btn btn-success">Volver</a>
      </form>
  </div>
</div>
@endsection