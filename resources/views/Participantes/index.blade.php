@extends('base')
@section('title') Inicio @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ "Participantes" }}</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="btn btn-outline-primary" aria-current="page" href="{{ route("participantes.create")}}">Nuevo</a>
            </li>
          </ul>
          <form action="{{route("participantes.search")}}" method="POST" class="d-flex">
            {{ csrf_field() }}
            <input class="form-control me-2" type="search" placeholder="Buscar" name="search">
            <button class="btn btn-outline-primary" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
                <th scope="col">Pais</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($participantes as $participante)
                <tr>
                  <th scope="row">{{ $participante->id }}</th>
                  <td>{{ $participante->nombre }}</td>
                  <td>{{ $participante->apellido }}</td>
                  <td>{{ $participante->edad }}</td>
                  <td>{{ $participante->pais}}</td>
                  <td>
                    <div class="d-grid gap-2 d-md-flex">
                      <a href="{{route("participantes.edit",$participante->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                      <form action="{{route("participantes.destroy",$participante->id)}}" method="post">
                        {{ csrf_field() }}
                        {{method_field("DELETE")}}
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Desea eliminar este registro?')">Delete</button>
                      </form>
                      <a href="{{route("participantes.show",$participante->id)}}" class="btn btn-sm btn-outline-secondary">Info</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection