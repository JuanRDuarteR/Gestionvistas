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
    <form method="post" action="{{ route('partos.update', $parto->id) }}">
      <div class="col">
        <h2 class="text-center">Editando: {{$parto->arete_vaca}}</h2>
      </div>
      @csrf
      @method('PATCH')
      <div class="form-row">
        <div class="form-group col-md-4">
              <label for="arete">Arete vaca:</label>
              <input type="text" class="form-control" name="arete_vaca" value="{{$parto->arete_vaca}}"/>
        </div>
        <div class="form-group col-md-4">
              <label for="incorporacion">Fecha:</label>
              <input type="date" class="form-control" name="fecha"  value="{{$parto->fecha}}"/>
          </div>
          <div class="form-group col-md-4">
              <label for="peso">Peso:</label>
              <input type="text" class="form-control" name="peso" value="{{$parto->peso}}"/>
          </div>
          <div class="form-group col-md-4">
              <label for="name">Raza:</label>
              <input type="text" class="form-control" name="raza" value="{{$parto->raza}}"/>
          </div>
          <div class="form-group col-md-4">
              <label for="encargado">Encargado:</label>
              <input type="text" class="form-control" name="encargado" value="{{$parto->encargado}}"/>
          </div>
          <div class="form-group col-md-4">
              <label for="estado">Estado:</label>
              <input type="text" class="form-control" name="estado" value="{{$parto->estado}}"/>
          </div>
          <div class="form-group col-md-4"> <!-- State Button -->
            <label for="sexo" class="control-label">Sexo</label>
              <select class="form-control" name="sexo" value="{{$parto->sexo}}">
                <option>Macho</option>
                <option>Hembra</option>
              </select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary">Actualizar parto</button>
      <a href="{{route('partos.index')}}" class="btn btn-success">Volver</a>
    </form>
  </div>
</div>
@endsection