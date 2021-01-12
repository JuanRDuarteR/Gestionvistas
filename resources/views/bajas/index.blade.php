@extends('layout')

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
      <table class="table table-striped">
        <div>
          <h1 class="form-check form-check-inline">Bajas</h1>
          <a href="{{route('bajas.create')}}" class="btn btn-success float-right">Agragar baja</a>

        </div>

        <thead>


          <tr>
            <th>Id</th>
            <th>ID vaca</th>
            <th>Nombre</th>
            <th>Lote</th>
            <th>Raza</th>
            <th>Origen</th>
            <th>Fecha de incorporacion</th>
            <th>Fecha de nacimiento</th>
            <th>Edad</th>
            <th>Fecha de Baja</th>
            <th>Motivo</th>
            <td colspan="2">Action</td>
          </tr>
        </thead>
        <tbody>
          @foreach($bajas as $baja)
          <tr>
            <td>{{$baja->id}}</td>
            <td>{{$baja->vaca_id}}</td>
            <td>{{$baja->nombre}}</td>
            <td>{{$baja->lote}}</td>
            <td>{{$baja->raza}}</td>
            <td>{{$baja->origen}}</td>
            <td>{{$baja->fecha_inc}}</td>
            <td>{{$baja->fecha_nac}}</td>
            <td>{{$baja->edad}}</td>
            <td>{{$baja->fecha_baja}}</td>
            <td>{{$baja->motivo}}</td>
            <td><a href="{{ route('bajas.edit',$baja->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
              <form action="{{ route('bajas.destroy', $baja->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
    {{ $bajas->links() }}
  </div>
</div>
@endsection