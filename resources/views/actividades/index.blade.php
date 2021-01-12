@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
      &times;
    </button>
  </div><br />
  @endif
  <div class="p-3 mb-2 bg-white text-dark">
    <div class="table-responsive">
      <table class="table table-striped">
        <div>
          <h1 class="form-check form-check-inline">Actividades</h1>
          <a style="margin-left: 10px;" href="{{route('actividades.create')}}" class="btn btn-success float-right">Agragar Actividad</a>
          <a style="margin-left: 10px;" href="{{ url('/') }}" class="btn btn-primary float-right">Menu</a>
        </div>
        <thead>
          <tr>
            <th>Id</th>
            <th>Actividad</th>
            <th>Descripcion</th>
            <th>Lote o Animal</th>
            <th>Fecha</th>
            <th>Encargado</th>
            <th>Producto</th>
            <th colspan="2">Action</td>
          </tr>
        </thead>
        <tbody>
          @foreach($actividades as $actividad)
          <tr>
            <td>{{$actividad->id}}</td>
            <td>{{$actividad->nombre_act}}</td>
            <td>{{$actividad->descripcion}}</td>
            <td>{{$actividad->lote_animal}}</td>
            <td>{{$actividad->fecha}}</td>
            <td>{{$actividad->encargado}}</td>
            <td>{{$actividad->producto}}</td>
            <td colspan="2">
              <div class="btn-group">
                <a href="{{ route('actividades.edit',$actividad->id)}}" class="btn btn-primary">Edit</a>
                <form action="{{ route('actividades.destroy', $actividad->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button style="margin-left: 10px;" class="btn btn-danger" type="submit">Delete</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $actividades->links() }}
  </div>
</div>
@endsection