<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('title_uz') ? "border-danger": ''}}"
                           name="title_uz" value="{{old('title_uz',@$news->title_uz)}}" placeholder="Title UZ">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('title_oz') ? "border-danger": ''}}"
                           name="title_oz" value="{{old('title_oz',@$news->title_oz)}}" placeholder="Title OZ">
                </div>

            </div>
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('title_ru') ? "border-danger": ''}}"
                           name="title_ru" value="{{old('title_ru',@$news->title_ru)}}" placeholder="Title RU">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('desc_uz') ? "border-danger": ''}}"
                           name="desc_uz" value="{{old('desc_uz',@$news->desc_uz)}}" placeholder="Desc UZ">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('desc_oz') ? "border-danger": ''}}"
                           name="desc_oz" value="{{old('desc_oz',@$news->desc_oz)}}" placeholder="Desc OZ">
                </div>

            </div>
            <div class="col-sm">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('desc_ru') ? "border-danger": ''}}"
                           name="desc_ru" value="{{old('desc_ru',@$news->desc_ru)}}" placeholder="Desc RU">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                            <textarea class="form-control {{$errors->has('body_uz') ? "border-danger": ''}}"
                                      name="body_uz" placeholder="Body UZ">{{old('body_uz',@$news->body_uz)}}</textarea>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                            <textarea class="form-control {{$errors->has('body_oz') ? "border-danger": ''}}"
                                      name="body_oz" placeholder="Body oz">{{old('body_oz',@$news->body_oz)}}</textarea>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                            <textarea class="form-control {{$errors->has('body_ru') ? "border-danger": ''}}"
                                      name="body_ru" placeholder="Body ru">{{old('body_ru',@$news->body_ru)}}</textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <select name="category" class="form-control">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                    @if ($category->id == old('category', @$news->category))
                                    selected="selected"
                                @endif
                            >{{ $category->name_uz }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <select name="region" class="form-control">
                        <option value="">Select region</option>
                        @foreach ($regions as $region)
                            <option value="{{ $region->id }}"
                                    @if ($region->id == old('region', @$news->region))
                                    selected="selected"
                                @endif
                            >{{ $region->name_uz }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <div class="form-group">
                    <label for="type">Is Video</label>
                    <input type="checkbox" class="form-check-inline" id="type" name="type"
                           value="1" <?= (old('type',@$news->type) == \App\Models\News::TYPE_CHECKED) ? 'checked' : '' ?>>
                </div>
            </div>
            <div class="col-sm" style="display: <?=(old('type',@$news->type) == \App\Models\News::TYPE_CHECKED) ? 'block' : 'none' ?>" id="urlDiv">
                <div class="form-group">
                    <input type="text" class="form-control {{$errors->has('url') ? "border-danger": ''}}"
                           name="url" value="{{old('url',@$news->url)}}" placeholder="Url video">
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="type">Image</label>
                    <input type="file" class="form-group" id="image" name="image"
                           value="{{ old('image','/storage/images/'.@$news->image) }}">
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Saqlash</button>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        let type = $('#type');
        let urlDiv = $('#urlDiv');
        type.on('change', function () {
            urlDiv.toggle();
        })
    </script>
@endsection
