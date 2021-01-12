@extends('layout')

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
          <label for="id">ID de la vaca:</label>
          <input type="text" class="form-control" name="vaca_id" value="{{$vaca->id}}" />
        </div>

        <div class="form-group col-md-4">
          <label for="nombre">Nombre Vaca:</label>
          <input type="text" class="form-control" name="nombre" value="{{$vaca->nombre}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="lote">Lote:</label>
          <input type="text" class="form-control" name="lote" value="{{$vaca->lote}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="raza">Raza :</label>
          <input type="text" class="form-control" name="raza" value="{{$vaca->raza}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="origen">Origen:</label>
          <input type="text" class="form-control" name="origen" value="{{$vaca->origen}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="incorporacion">Fecha de Incorporacion:</label>
          <input type="date" class="form-control" name="fecha_inc" value="{{$vaca->fecha_inc}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="nacimineto">Fecha Nacimiento:</label>
          <input type="date" class="form-control" name="fecha_nac" value="{{$vaca->fecha_nac}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="edad">Edad:</label>
          <input type="text" class="form-control" name="edad" value="{{$vaca->edad}}" />
        </div>
        <div class="form-group col-md-4">
          <label for="baja">Fecha de baja:</label>
          <input type="date" class="form-control" name="fecha_baja" />
        </div>
        <div class="form-group col-md-4">
          <label for="motivo">Motivo:</label>
          <input type="text" class="form-control" name="motivo" />
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Crear Baja</button>
      <a href="{{route('bajas.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection