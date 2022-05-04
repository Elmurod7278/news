@extends('layouts.admin')

@section('content')

    <form method="POST" action="{{ route('admin.tanlov.store') }}">
        @csrf
        <div class="card mb-3">
            <div class="card-body">
                <form action="?" method="GET">
                    <div class="row">
                        <div class="col-sm">
                            <div class="form-group">
                                <input type="text" class="form-control {{$errors->has('news_id') ? "border-danger": ''}}"  name="news_id" value="{{old('news_id')}}" placeholder="News_id">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Saqlash</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
@endsection

