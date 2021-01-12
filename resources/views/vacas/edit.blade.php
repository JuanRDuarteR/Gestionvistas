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
    <form method="post" action="{{ route('vacas.update', $vaca->id) }}">
      <div class="col">
        <h2 class="text-center">Editando: {{$vaca->nombre}}</h2>
      </div>
      @csrf
      @method('PATCH')
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="arete">Arete</label>
          <input type="text" class="form-control" name="arete" value="{{$vaca->arete}}">
        </div>
        <div class="form-group col-md-4">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" name="nombre" value="{{$vaca->nombre}}">
        </div>
        <div class="form-group col-md-4">
          <label for="lote">Lote</label>
          <input type="text" class="form-control" name="lote" value="{{$vaca->lote}}">
        </div>
        <div class="form-group col-md-4">
          <label for="raza">Raza</label>
          <input type="text" class="form-control" name="raza" value="{{$vaca->raza}}">
        </div>
        <div class="form-group col-md-4">
          <label for="origen">Origen</label>
          <input type="text" class="form-control" name="origen" value="{{$vaca->origen}}">
        </div>
        <div class="form-group col-md-4">
          <label for="nacimiento">Fecha Nacimiento</label>
          <input type="date" class="form-control" name="fecha_nac" value="{{$vaca->fecha_nac}}">
        </div>
        <div class="form-group col-md-4">
          <label for="incorporacion">Fecha Incorporacion</label>
          <input type="date" class="form-control" name="fecha_inc" value="{{$vaca->fecha_inc}}">
        </div>
        <div class="form-group col-md-4">
          <label for="Edad">Edad</label>
          <input type="number" min="0" class="form-control" name="edad" value="{{$vaca->edad}}">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar animal</button>
      <a href="{{route('vacas.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection