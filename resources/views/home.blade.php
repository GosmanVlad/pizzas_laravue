@extends('layouts.layout')

@section('content')

<div class="content">
    <div class="title m-b-md">
        Pizzas
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pizzas as $pizza)
            <tr>
                <td>{{ $pizza->id }}</td>
                <td>{{ $pizza->name }}</td>
                <td>{{ $pizza->price }}</td>
                <td>{{ $pizza->description }}</td>
                <td><a href='{{asset("pizzas/$pizza->image")}}' target="_blank">Click to view</a></td>
                <td><a href='/pizzas/delete/{{$pizza->id}}' class="btn btn-outline-danger">Sterge</a> <a href='/pizzas/edit/{{$pizza->id}}' class="btn btn-outline-primary">Editeaza</a> <a href='/pizzas/details/{{$pizza->id}}' class="btn btn-outline-info">Detalii</a></td>
            </tr>
        @endforeach
        </tbody>
    </table> <hr>
    <a href="pizzas/add" class="btn btn-primary btn-lg btn-block">Add a new pizza</a>
</div>
@endsection