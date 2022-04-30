@extends('layouts.admin')

@section('content')
    <div class="container">
   <div class="card card-gray card-outline w-100">
    <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <td>
                <p>{{ $news->title_uz }}</p>
            </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>
                <p href="">{{ $news->desc_uz }}</p>
            </td>
        </tr>
        <tr>
            <th>Body</th>
            <td>
                <p href="">{{ $news->body_uz }}</p>
            </td>
        </tr>
        <tr>
            <th>Image</th>
            <td>
                <div style="width: 250px">
                    <img style="width: 70%" src="/storage/images/{{$news->image}}" alt="">
                </div>

            </td>
        </tr>
        @if($news->type == \App\Models\News::TYPE_CHECKED)

                <tr>
                    <th>Video link</th>
                    <td>
                        <a href="{{$news->url}}">Videoni ko'rish</a>
                    </td>
                </tr>
        @endif
        <tr>
            <th>Categoriya</th>
            <td>
                <p href="">{{ $news->categoryTable ? $news->categoryTable->name_uz : ''}}</p>
            </td>
        </tr>
        <tr>
            <th>Korishlar soni</th>
            <td>
                <p href="">{{ $news->views_count }}</p>
            </td>
        </tr>
        </thead>
    </table>
    <div class="d-grid gap-2 d-md-block">
    </div>
</div>
    </div>
    </div>

@endsection
