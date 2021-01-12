@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Agregar Vaca
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
    <form method="post" action="{{ route('vacas.store') }}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="arete">Arete:</label>
          <input type="text" class="form-control" name="arete" />
        </div>
        <div class="form-group col-md-4">
          <label for="nombre">Nombre Vaca:</label>
          <input type="text" class="form-control" name="nombre" />
        </div>
        <div class="form-group col-md-4">
          <label for="name">Lote:</label>
          <input type="text" class="form-control" name="lote" />
        </div>
        <div class="form-group col-md-4">
          <!-- Lista de Razas -->
          <label for="lote" class="control-label">Raza</label>
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
          <label for="origen">Origen:</label>
          <input type="text" class="form-control" name="origen" />
        </div>
        <div class="form-group col-md-4">
          <label for="incorporacion">Fecha de Incorporacion:</label>
          <input type="date" class="form-control" name="fecha_inc" />
        </div>
        <div class="form-group col-md-4">
          <label for="nacimiento">Fecha Nacimiento:</label>
          <input type="date" class="form-control" name="fecha_nac" />
        </div>
        <div class="form-group col-md-4">
          <label for="edad">Edad:</label>
          <input type="number" min="0" class="form-control" name="edad" />
        </div>
        <div class="form-group col-md-4" style="display: none">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" name="usuario" value="{{auth()->user()->email}}" />
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Crear Vaca</button>
      <a href="{{route('vacas.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection