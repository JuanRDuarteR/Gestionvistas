@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Dar de baja
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
    <form method="post" action="{{ route('bajas.store') }}">
      @csrf
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="name">ID de la vaca:</label>
          <input type="text" class="form-control" name="vaca_id"/>
        </div>
        <div class="form-group col-md-4">
          <label for="name">Arete:</label>
          <input type="text" class="form-control" name="arete_vaca"/>
        </div>
        <div class="form-group col-md-4">
          <label for="name">Nombre Vaca:</label>
          <input type="text" class="form-control" name="nombre"/>
        </div>
        <div class="form-group col-md-4">
          <label for="name">Lote:</label>
          <input type="text" class="form-control" name="lote"/>
        </div>
        <div class="form-group col-md-4">
          <label for="price">Raza :</label>
          <input type="text" class="form-control" name="raza"/>
        </div>
        <div class="form-group col-md-4">
          <label for="quantity">Origen:</label>
          <input type="text" class="form-control" name="origen"/>
        </div>
        <div class="form-group col-md-4">
          <label for="quantity">Fecha de Incorporacion:</label>
          <input type="date" class="form-control" name="fecha_inc"/>
        </div>
        <div class="form-group col-md-4">
          <label for="quantity">Fecha Nacimiento:</label>
          <input type="date" class="form-control" name="fecha_nac"/>
        </div>
        <div class="form-group col-md-4">
          <label for="quantity">Edad:</label>
          <input type="text" class="form-control" name="edad"/>
        </div>
        <div class="form-group col-md-4">
          <label for="quantity">Fecha de baja:</label>
          <input type="date" class="form-control" name="fecha_baja" />
        </div>
        <div class="form-group col-md-4">
          <label for="quantity">Motivo:</label>
          <input type="text" class="form-control" name="motivo" />
        </div>
        <div class="form-group col-md-4" style="display: none">
          <label for="usuario">Usuario</label>
          <input type="text" class="form-control" name="usuario" value="{{auth()->user()->email}}" />
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Crear Baja</button>
      <a href="{{route('bajas.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection