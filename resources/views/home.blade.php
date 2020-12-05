@extends('layouts.layout')

@section('content')

<div id="app">
    <div class="content">
        <div style="float:right;"><a href="{{asset('logout')}}"> Delogare</a></div>
        @can('isAdmin')
            <homepage :rangid="1"></homepage>
        @elsecan('isUser')
            <homepage :rangid="0"></homepage>
        @endcan
    </div>
</div>


<script>
new Vue({
    el: "#app",
    data: function() {
        return {
            isAdmin: 0,
        }
    }
})
</script>

@endsection