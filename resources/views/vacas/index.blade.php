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
  <h1 class="form-check form-check-inline">Vacas</h1>
  <!--Buscador de Vacas-->
{!! Form::open(['route'=>'vacas.index','method'=>'GET','class'=>'navbar-form
pull-right'])!!}
<div class="input-group" style="width:350px;float:right;margin-bottom: 10px;">
{!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Buscar vaca..',
'aria-describedby'=>'search'])!!}
<a style="margin-left: 10px;" href="{{route('vacas.create')}}" class="btn btn-success float-right">Agragar Vaca</a>
<a style="margin-left: 10px;" href="{{ url('/') }}" class="btn btn-primary float-right">Menu</a>
<!--Fin del busacador-->
  </div>
    <thead>
        <tr>
          <th>Id</th>
          <th>Arete</th>
              <th>Nombre</th>
                <th>Lote</th>
                <th>Raza</th>
                <th>Origen</th>
                <th>Fecha de incorporacion</th>
                <th>Fecha de nacimiento</th>
                <th>Edad</th> 
                <th>Estatus</th>
          <th colspan="2">Accion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vacas as $vaca)
        <tr>
                <td>{{$vaca->id}}</td>
                <td>{{$vaca->arete}}</td>
                <td>{{$vaca->nombre}}</td>
                <td>{{$vaca->lote}}</td>
                <td>{{$vaca->raza}}</td>
                <td>{{$vaca->origen}}</td>
                <td>{{$vaca->fecha_inc}}</td>
                <td>{{$vaca->fecha_nac}}</td>
                <td>{{$vaca->edad}}</td>
                <td>{{$vaca->estatus}}</td>
                <td>
                
                  <a href="{{ route('vacas.edit',$vaca->id)}}" class="btn btn-primary">Edit<span class="glyphicon glyphicon-qrcode"></span></a>
                </td>
                <td>
                 <form action="{{ route('vacas.destroy', $vaca->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form></td>
                </td>
                <td>
                  <a href="{{ route('bajas.edit',$vaca->id)}}" class="btn btn-primary">Crear baja</a>      
                </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  
  
  </div>
  {{ $vacas->links() }}  
  </div>
</div>

@endsection