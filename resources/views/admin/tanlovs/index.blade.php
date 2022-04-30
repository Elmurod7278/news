@extends('layouts.admin')


@section('content')
    <p><a href="{{ route('tanlov.create') }}" class="btn btn-success">tanlov qo'shish</a></p>
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
                            {!! Form::text('name_oz', request('name_oz'), ['class'=>'form-control', 'placeholder' => 'Номи OZ']) !!}
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form-group">
                            {!! Form::text('name_ru', request('name_ru'), ['class'=>'form-control', 'placeholder' => 'Номи RU']) !!}
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
                        @forelse ($tanlovs as $tanlov)
                            <tr>
                                <td>
                                    <a href="{{route('tanlov.show',['tanlov'=>$tanlov])}}">{{ $tanlov->name_uz }}</a>
                                </td>

                                <td>
                                    <a href="{{route('tanlov.edit',['tanlov'=>$tanlov->id])}}" class="btn btn-success"><i class='fas fa-pencil-alt fa-lg'></i></a>
                                    <form action="{{route('tanlov.destroy',['tanlov'=>$tanlov])}}"method="POST" style="display: inline-block">
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

                    {!! $tanlovs->links("pagination::bootstrap-4") !!}

                </div>
            </div>
        </div>

    </div>
@endsection
