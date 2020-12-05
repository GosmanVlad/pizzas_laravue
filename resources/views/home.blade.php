@extends('layouts.layout')

@section('content')

<div id="app">
    <div class="content">
        <div style="float:right;"><a href="{{asset('logout')}}"> Delogare</a></div>
        <homepage></homepage>
    </div>
</div>


<script>
new Vue({
    el: "#app",
})
</script>

@endsection