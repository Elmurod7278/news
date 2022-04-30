@extends('layouts.admin')

@section('content')
    <a href="{{route('tag.edit',['tag'=>$tag->id])}}" class="btn btn-success"><i class='fas fa-pencil-alt fa-lg'></i></a>
    <form action="{{route('tag.destroy',['tag'=>$tag])}}"method="POST" style="display: inline-block">
        @method('Delete')
        @csrf
        <button type="submit" class="btn btn-danger" onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')"><i class='fas fa-trash fa-lg'></i></button>
    </form>
    <div class="container">
        <div class="card card-gray card-outline w-100">
            <div class="card-body">
                <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name_uz</th>
            <td>{{$tag->name_uz}}</td>


        </tr>
        <tr>
            <th>Name_oz</th>
            <td>{{$tag->name_oz}}</td>
        </tr>
        <tr>

            <th>Name_ru</th>
            <td>{{$tag->name_ru}}</td>
        </tr>
        </thead>
    </table>
            </div>
        </div>
    </div>

@endsection
