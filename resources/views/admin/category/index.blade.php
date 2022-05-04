@extends('layouts.admin')


@section('content')
    <p><a href="{{ route('admin.category.create') }}" class="btn btn-success">Kategoriya qo'shish</a></p>

    <div class="card mb-3">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('name_uz', request('name_uz'), ['class'=>'form-control', 'placeholder' => 'Номи UZ']) !!}
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('name_ru', request('name_ru'), ['class'=>'form-control', 'placeholder' => 'Номи RU']) !!}
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('name_oz', request('name_oz'), ['class'=>'form-control', 'placeholder' => 'Номи OZ']) !!}
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
                            <th>Номи UZ</th>
                            <th>Номи RU</th>
                            <th>Номи OZ</th>
                            <th>Amallar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    <a href="{{route('admin.category.show',['category'=>$category])}}">{{ $category->name_uz }}</a>
                                </td>
                                <td>
                                    <p href="">{{ $category->name_ru }}</p>
                                </td>
                                <td>
                                    <p href="">{{ $category->name_oz }}</p>
                                </td>
                                <td>
                                    <a href="{{route('admin.category.edit',['category'=>$category->id])}}"
                                       class="btn btn-success"><i class='fas fa-pencil-alt fa-lg'></i></a>
                                    <form action="{{route('admin.category.destroy',['category'=>$category])}}" method="POST"
                                          style="display: inline-block">
                                        @method('Delete')
                                        @csrf
                                        <button type="submit" id="button" class="btn btn-danger"
                                                onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')">
                                            <i class='fas fa-trash fa-lg'></i></button>
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

                    {!! $categories->links("pagination::bootstrap-4") !!}

                </div>
            </div>
        </div>
    </div>
@endsection

