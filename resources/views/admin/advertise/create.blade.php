@extends('layouts.admin')

@section('content')
    @include('admin.errors.errorSummary')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.advertises.store') }}">
        @csrf
        @method('POST')
        @include('admin.advertise._form', ['news' => null,'advertises'=>$advertises])
    </form>
@endsection
