@extends('layouts.admin')

@section('content')
    @include('admin.errors.errorSummary')
    <form method="POST" enctype="multipart/form-data" action="{{ route('admin.news.store') }}">
        @csrf
        @method('POST')
        @include('admin.news._form', ['news' => null,'categories' => $categories,'regions' => $regions])
    </form>
@endsection
