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
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  </div><br />
  @endif
  <div class="p-3 mb-2 bg-white text-dark">
    <div class="table-responsive">
      <table class="table table-striped">
        <div>
          <h1 class="form-check form-check-inline">Partos</h1>
          <!--Buscador de Vacas-->
          <a style="margin-left: 10px;" href="{{route('partos.create')}}" class="btn btn-success float-right">Agragar Parto</a>
          <a style="margin-left: 10px;" href="{{ url('/') }}" class="btn btn-primary float-right">Menu</a>
          <!--Fin del busacador-->
        </div>
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Arete Vaca</th>
            <th>Fecha</th>
            <th>Peso(Kg)</th>
            <th>Raza</th>
            <th>Encargado</th>
            <th>Estado</th>
            <th>Sexo</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>
          @foreach($partos as $parto)
          <tr>
            <td>{{$parto->id}}</td>
            <td>{{$parto->arete_vaca}}</td>
            <td>{{$parto->fecha}}</td>
            <td>{{$parto->peso}}</td>
            <td>{{$parto->raza}}</td>
            <td>{{$parto->encargado}}</td>
            <td>{{$parto->estado}}</td>
            <td>{{$parto->sexo}}</td>
            <td colspan="2">
              <div class="btn-group">
                <a href="{{ route('partos.edit',$parto->id)}}" class="btn btn-primary">Editar</a>
                <form action="{{ route('partos.destroy', $parto->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button style="margin-left: 10px;" class="btn btn-danger" type="submit">Eliminar</button>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    {{ $partos->links() }}
  </div>
</div>

@endsection