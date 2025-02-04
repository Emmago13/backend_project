@extends('base')
@section('title') Inicio @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ "About" }}</h1>
    </div>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="btn btn-outline-primary" aria-current="page" href="{{ route("about.create")}}">Nuevo</a>
            </li>
          </ul>
          <form action="{{route("about.search")}}" method="POST" class="d-flex">
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
                <th scope="col">Email</th>
                <th scope="col">Telefono</th>
                <th scope="col">Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($abouts as $about)
                <tr>
                  <th scope="row">{{ $about->id }}</th>
                  <td>{{ $about->name }}</td>
                  <td>{{ $about->email }}</td>
                  <td>{{ $about->phone }}</td>
                  <td>
                    <div class="d-grid gap-2 d-md-flex">
                      <a href="{{route("about.edit",$about->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                      <form action="{{route("about.destroy",$about->id)}}" method="post">
                        {{ csrf_field() }}
                        {{method_field("DELETE")}}
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Desea eliminar este registro?')">Delete</button>
                      </form>
                      <a href="{{route("about.show",$about->id)}}" class="btn btn-sm btn-outline-secondary">Info</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
    </div>
@endsection
