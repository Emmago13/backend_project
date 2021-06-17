@extends('base')
@section('title') Participantes Edit @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ "Participantes Edit" }}</h1>
    </div>
    <form action="{{ route("participantes.update", $participante->id)}}" method="POST">
        {{ csrf_field() }}
        {{ method_field("PATCH") }}
        <div>
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{$participante->nombre}}">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{$participante->apellido}}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad" value="{{$participante->edad}}">
        </div>
        <div class="mb-3">
            <label for="pais" class="form-label">Pais</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{$participante->pais}}">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
@endsection