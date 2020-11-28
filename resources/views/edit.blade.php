@extends('layouts.layout')

@section('content')

<div class="content">
    <div class="title m-b-md">
        Edit '{{ $pizza->name }}' pizza
    </div>
    <a href="/home">Back to home</a><hr>
</div>

<div class="form">
<div class="row">
    <div class="col-sm">
        <form action="/pizzas/edit" method="POST"> 
        @csrf
        <div class="form-group">
            <input type="hidden" class="form-control" name="id" value="{{$pizza->id}}">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$pizza->name}}">
        </div>

        <div class="form-group">
            <label for="description">Descriere pizza</label><br>
            <textarea rows="5" type="text" class="form-control" id="description" name="description" >{{$pizza->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Imagine</label><br>
            <input type="text" class="form-control" id="image" name="image" value="{{$pizza->image}}">
        </div>

        <div class="form-group">
            <label for="price">Pret</label><br>
            <input type="text" id="price" name="price" value="{{$pizza->price}}" class="form-control">
        </div><hr>

        <input type="submit" value="Editeaza" class="btn btn-outline-primary btn-block">
    </form>
        </div>
        <div class="col-sm">
        <img src="/pizzas/{{$pizza->image}}">
    </div></div>
</div>

@endsection