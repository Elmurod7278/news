@extends('layouts.admin')

@section('content')
    @include('admin.errors.flash')
    <a href="{{route('admin.news.edit',['news'=>$news->id])}}" class="btn btn-success">Taxrirlash
         </a>
    <form action="{{route('admin.news.destroy',['news'=>$news])}}" method="POST" style="display: inline-block">
        @method('Delete')
        @csrf
        <button type="submit" class="btn btn-danger"
                onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')">
            O'chirish</button>
    </form>

    <form action="{{route('admin.tanlov',['news' => $news])}}" method="POST" style="display: inline-block">
        @method('POST')
        @csrf
                <button class="btn btn-success {{\App\Models\Tanlov::where(['news_id'=>$news->id])->first() ? 'disabled':''}}"  type="submit">Tanlovga qo'shish</button>

    </form>

    <div class="container">
        <div class="card card-gray card-outline w-100">
            <div class="card-body">
                <table class="table table-striped table-bordered">
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

                            <img style="width: 250px;height:250px " src="/storage/images/{{$news->image}}" alt="">


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
                </table>
                <div class="d-grid gap-2 d-md-block">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card card-gray card-outline w-100">
            <div class="card-body">
                <h5>Teglar ro'yhati</h5>
                <table class="table table-striped table-bordered">
                    <tr>
                        <td>Teg nomi</td>
                        <td>Tegni o'chirish</td>
                    </tr>
                    @forelse($newsTags as $tag)
                               <tr>
                            <td>{{ $tag->tag->name_uz }}</td>
                            <td>
                                <form action="{{route('admin.del',['tag'=>$tag])}}" method="POST" style="display: inline-block">
                                    @method('Delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Siz haqiqatdan ham ushbu maxsulotni o\'chirmoqchimisiz')">
                                        <i class='fas fa-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-danger">Teg mavjud emas</td>
                        </tr>
                    @endforelse
                </table>

            </div>
        </div>
    </div>

    {{--Teg qoshish--}}

    <div class="container">
        <form action="{{route('admin.news-add-tag',['news' => $news])}}" method="POST">
            @method('POST')
            @csrf
            <h5>Teg qo'shish</h5>
            <div class="row">
                <div class="col-sm">
                    <select name="tag_id" id="" class="form-control">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">
                                {{$tag->name_uz}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-success" type="submit"><i class="fas fa-plus-square"></i></button>
                </div>
            </div>
        </form>
    </div>
    <br><br>

@endsection
