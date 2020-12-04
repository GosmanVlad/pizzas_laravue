@extends('layouts.layout')

@section('content')

<div id="app">
    <div class="content">
        <homepage></homepage>
    </div>
</div>


<script>
new Vue({
    el: "#app",
})
</script>

@endsection