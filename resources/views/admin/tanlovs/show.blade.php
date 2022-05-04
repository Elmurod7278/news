@extends('layouts.admin')

@section('content')
    <a href="{{route('admin.tanlov.edit',['tanlov'=>$tanlov->id])}}" class="btn btn-success"><i class='fas fa-pencil-alt fa-lg'></i></a>
    <form action="{{route('admin.tanlov.destroy',['tanlov'=>$tanlov])}}"method="POST" style="display: inline-block">
        @method('Delete')
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')"><i class='fas fa-trash fa-lg'></i></button>
    </form>

    <table class="table table-bordered">
        <thead>
        <tr>
            <td>Name_uz</td>
            <td>Name_oz</td>
            <td>Name_ru</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$tag->name_uz}}</td>
            <td>{{$tag->name_oz}}</td>
            <td>{{$tag->name_ru}}</td>
        </tr>

        </tbody>
    </table>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{route('admin.tag.index')}}" class="btn btn-primary" type="button">ortga</a>
    </div>
@endsection
