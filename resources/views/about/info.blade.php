@extends('base')
@section('title') About Info @endsection
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ "Information" }}</h1>
    </div>
    <form action="{{ route("about.show", $about->id)}} " method="POST">
        {{ csrf_field() }}
        {{ method_field("PATCH") }}
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$about->name}}" disabled>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$about->email}}" disabled>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="phone" class="form-control" id="phone" name="phone" value="{{$about->phone}}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label" for="message">Message</label>
            <textarea name="message" id="message" class="form-control" cols="30" rows="10" disabled>{{$about->message}}</textarea>
        </div>
    </form>
@endsection