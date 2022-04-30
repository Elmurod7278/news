@extends('layouts.admin')

@section('content')
    @include('admin.errors.errorSummary')
    <form method="POST" enctype="multipart/form-data" action="{{ route('news.update',['news'=>$news->id]) }}">
        @csrf
        @method('PUT')
        @include('admin.news._form', ['news' => $news,'categories' => $categories,'regions' => $regions])
    </form>
@endsection
