@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

<div class="content px-4">
    <div class="{{config('adminlte.classes_content', 'container-fluid')}}">
        @section('content')
            hi
        @endsection
    </div>
</div>

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
