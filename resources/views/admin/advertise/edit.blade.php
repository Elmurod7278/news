@extends('layouts.admin')

@section('content')
    @include('admin.errors.errorSummary')
    <form method="POST" enctype="multipart/form-data" action="{{ route('advertises.update',['advertise'=>$advertise->id]) }}">
        @csrf
        @method('PUT')

        @include('admin.advertise._form', ['advertise'=>$advertise])
    </form>
@endsection
