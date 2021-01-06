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
    </div><br />
  @endif
  <div class="p-3 mb-2 bg-white text-dark">
  <div class="table-responsive">
  <table class="table table-striped" >
  <div>
  <h1 class="form-check form-check-inline">Enfermedades</h1>
  <!--Buscador de Vacas-->
<a style="margin-left: 10px;" href="{{route('enfermedades.create')}}" class="btn btn-success float-right">Agragar Enfermedad</a>
<a style="margin-left: 10px;" href="{{ url('/') }}" class="btn btn-primary float-right">Menu</a>
<!--Fin del busacador-->
  </div>
    <thead class="thead-dark">
        <tr>
          <th>Id</th>
          <th>Arete Vaca</th>
              <th>Fecha</th>
                <th>Enfermedad</th>
                <th>Tratamiento</th>
                <th>Encargado</th>
                <th>Estado</th>
                <th colspan="2">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($enfermedades as $enfermedad)
        <tr>
                <td>{{$enfermedad->id}}</td>
                <td>{{$enfermedad->arete_vaca}}</td>
                <td>{{$enfermedad->fecha}}</td>
                <td>{{$enfermedad->enfermedad}}</td>
                <td>{{$enfermedad->tratamiento}}</td>
                <td>{{$enfermedad->encargado}}</td>
                <td>{{$enfermedad->estado}}</td>
                <td>
                    <a href="{{ route('enfermedades.edit',$enfermedad->id)}}" class="btn btn-sm btn-outline-info">Editar</a>
                </td>
                <td>
                    <form action="{{ route('enfermedades.destroy', $enfermedad->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-sm btn-outline-danger" type="submit" value="Eliminar">
                    </form>                                                  
                </td>                
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>
  {{ $enfermedades->links() }}  
  </div>
</div>

@endsection