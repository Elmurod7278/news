@extends('layouts.admin')


@section('content')
    <p><a href="{{ route('news.create') }}" class="btn btn-success">Yangilik qo'shish</a></p>
    <div class="card mb-3">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('title_uz', request('title_uz'), ['class'=>'form-control', 'placeholder' => 'Title UZ']) !!}
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('desc_ru', request('desc_ru'), ['class'=>'form-control', 'placeholder' => 'Desc RU']) !!}
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('category', request('category'), ['class'=>'form-control', 'placeholder' => 'Category']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Қидириш</button>
                            <a href="?" class="btn btn-outline-secondary">Тозалаш</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Body</th>
                            <th>Categoriya</th>
                            <th>Korishlar soni</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($news as $new)

                            <tr>
                                <td>
                                    <a href="{{route('news.show',['news'=>$new])}}">{{ $new->title_uz }}</a>
                                </td>
                                <td>
                                    <p href="">{{ $new->desc_uz }}</p>
                                </td>
                                <td>
                                    <p href="">{{ $new->body_uz }}</p>
                                </td>

                                <td>
                                    <p href="">{{  $new->categoryTable->name_uz}}</p>
                                </td>
                                <td>
                                    <p href="">{{ $new->views_count }}</p>
                                </td>
                                <td>
                                    <a href="{{route('news.edit',['news'=>$new->id])}}" class="btn btn-success"><i class='fas fa-pencil-alt fa-lg'></i></a>
                                    <form action="{{route('news.destroy',['news'=>$new])}}" method="POST" style="display: inline-block">
                                        @method('Delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')"><i class='fas fa-trash fa-lg'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Сиз ҳали ҳеч қандай маҳсулот қўшмадингиз</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    {!! $news->links("pagination::bootstrap-4") !!}

                </div>
            </div>
        </div>

    </div>
@endsection
