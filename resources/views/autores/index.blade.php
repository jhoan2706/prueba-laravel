@extends('layouts.app') 
@section('title','Trainers Create') 
@section('content')
<div class="row">
  <div class="col">
    <h2>Autores</h2>
    <a href="{{route('autores.create')}}" class="btn btn-info mb-2">Agregar nuevo</a>
    <form class="form-inline mb-3" action="/autores" method="GET">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="search" name="nombre" placeholder="Nombre" aria-label="Search" value="">
      <input class="form-control mr-sm-2" type="search" name="apellido" placeholder="Apellido" aria-label="Search">
      <input class="form-control mr-sm-2" type="search" name="pais" placeholder="Pais" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      <button class="btn btn-outline-primary my-2 my-sm-0 ml-2" type="submit"><i class="fas fa-sync-alt"></i>Reset</button>
    </form>
  @include('common.success')
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Pais/Región</th>
          <th scope="col">Fecha Nacimiento</th>
          <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($autores as $autor)
        <tr>
          <th scope="row">{{$autor->id}}</th>
          <td>{{$autor->nombre}}</td>
          <td>{{$autor->apellido}}</td>
          <td>{{$autor->pais->nombre}}</td>
          <td>{{$autor->fecha_nacimiento}}</td>
          <td id="{{$autor->id}}">
            {{-- componente independiente,se puede llamar desde donde sea(solo "ver mas") --}}
            <show-object-btn object='{{$autor}}'></show-object-btn>
            <a href="/autores/{{$autor->id}}/edit" class="btn btn-info">Editar</a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
    <nav>
      <ul class="pagination justify-content-end">
        {{$autores->links('vendor.pagination.bootstrap-4')}}
      </ul>
    </nav>

  </div>
</div>
<show-autor-modal></show-autor-modal>
@endsection