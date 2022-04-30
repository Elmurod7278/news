@extends('layouts.admin')

@section('content')
    <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-success"><i class='fas fa-pencil-alt fa-lg'></i></a>
    <form action="{{route('category.destroy',['category'=>$category])}}"method="POST" style="display: inline-block">
        @method('Delete')
        @csrf
        <button type="submit" id="button" class="btn btn-danger" onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')"><i class='fas fa-trash fa-lg'></i></button>
    </form>
    <div class="container">
        <div class="card card-gray card-outline w-100">
            <div class="card-body">
                <table class="table table-striped table-bordered" >
                    <tbody>
                    <tr>
                        <th>Name_uz</th>
                        <td>{{$category->name_uz}}</td>
                    </tr>
                    <tr>
                        <th>Name_oz</th>
                        <td>{{$category->name_oz}}</td>
                    </tr>
                    <tr>
                        <th>Name_ru</th>
                        <td>{{$category->name_ru}}</td>
                    </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
@endsection
