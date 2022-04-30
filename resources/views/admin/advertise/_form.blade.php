<div class="card mb-3">
    <div class="card-body">
        <div class="row">
            <div class="col-sm" >
                <div class="form-group">
                    <label for="type">Link</label>
                    <input type="text" class="form-control {{$errors->has('link') ? "border-danger": ''}}"
                           name="link"
                           value="{{old('link',@$advertise->link)}}" placeholder="Url"
                    >
                </div>
            </div>
            <div class="col-sm">
                <div class="form-group">
                    <label for="type">Image</label>
                    <input type="file" class="form-group" id="image" name="image"
                           value="{{ old('image','/storage/images/'.@$advertise->image) }}"
                    >
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

