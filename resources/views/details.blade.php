@extends('layouts.layout')

@section('content')

<div class="content">
    <div class="title m-b-md">
        {{ $pizza->name }}
    </div>
    <a href="/home">Back to home</a><hr>
</div>

<div class="centerText">
    <img src="/pizzas/{{$pizza->image}}"> <br>
    <strong>{{$pizza->name}}</strong> <br>
    {{$pizza->description}} <br>
    <strong>Pret:</strong> {{$pizza->price}}<strong style="color:#098E05;">RON</strong> <br>

</div>

@endsection