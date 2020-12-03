@extends('layouts.layout')

@section('content')

<div id="app">
    <div class="content">
        <div v-if="item == 1">
            <homepage></homepage>
            <button @click="item=4" class="btn btn-primary btn-lg btn-block">Add a new pizza</button>
        </div>
        <div v-else="item==4">
            <addpage></addpage><hr>
            <button @click="item=1" class="btn btn-primary">Back</button>
        </div>
    </div>
</div>


<script>
new Vue({
    el: "#app",

    data: {
        item: 1
    },
})
</script>

@endsection