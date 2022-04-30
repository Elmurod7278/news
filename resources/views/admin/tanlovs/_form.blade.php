@include ('admin.layout.flash')
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('name', 'Номи', ['class' => 'col-form-label']); !!}
            {!! Form::text('name', old('name', $product ? $product->name : null), ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group{{ $errors->has('product_entity_id') ? ' has-error' : '' }}">
            {!! Form::label('product_entity_id', 'Тайёрланадиган махсулот номи', ['class' => 'control-label']) !!}
            {!! Form::select('product_entity_id', \App\Models\Store\ProductEntity::where('status' ,\App\Models\Store\ProductEntity::STATUS_ACTIVE)->pluck('name','id'), old('product_entity_id', $product ? $product->product_entity_id : null),
            ['class'=>'form-control' . ($errors->has('product_entity_id') ? ' is-invalid' : ''), 'required' => true,'id' => 'productEntity']) !!}

            @if ($errors->has('product_entity_id'))
                <span class="invalid-feedback"><strong>{{ $errors->first('product_entity_id') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('amount', 'Миқдори', ['class' => 'col-form-label']); !!}
            {!! Form::number('amount', old('amount', $product ? $product->amount : null), ['class'=>'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('amount'))
                <span class="invalid-feedback"><strong>{{ $errors->first('amount') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price_master', 'Уста учун нарх', ['class' => 'col-form-label']); !!}
            {!! Form::text('price_master', old('price_master', $product ? $product->price_master : null), ['class'=>'form-control' . ($errors->has('price_master') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('price_master'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_master') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price_foreman', 'Прораб учун нарх', ['class' => 'col-form-label']); !!}
            {!! Form::text('price_foreman', old('price_foreman', $product ? $product->price_foreman : null), ['class'=>'form-control' . ($errors->has('price_foreman') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('price_foreman'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_foreman') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price_distributor', 'Дистрибутор дўконлари учун нарх', ['class' => 'col-form-label']); !!}
            {!! Form::text('price_distributor', old('price_distributor', $product ? $product->price_distributor : null), ['class'=>'form-control' . ($errors->has('price_distributor') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('price_distributor'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_distributor') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price_own_store', 'Фирма дўконлари учун нарх', ['class' => 'col-form-label']); !!}
            {!! Form::text('price_own_store', old('price_own_store', $product ? $product->price_own_store : null), ['class'=>'form-control' . ($errors->has('price_own_store') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('price_own_store'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_own_store') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price_market_store', 'Бозор дўконлари учун нарх', ['class' => 'col-form-label']); !!}
            {!! Form::text('price_market_store', old('price_market_store', $product ? $product->price_market_store : null), ['class'=>'form-control' . ($errors->has('price_market_store') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('price_market_store'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_market_store') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('price_organization', 'Ташкилотлар учун нарх', ['class' => 'col-form-label']); !!}
            {!! Form::text('price_organization', old('price_organization', $product ? $product->price_organization : null), ['class'=>'form-control' . ($errors->has('price_organization') ? ' is-invalid' : ''), 'required' => true]) !!}
            @if ($errors->has('price_organization'))
                <span class="invalid-feedback"><strong>{{ $errors->first('price_organization') }}</strong></span>
            @endif
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            {!! Form::label('status', 'Статус', ['class' => 'control-label']) !!}
            {!! Form::select('status', $statuses, old('status', $product ? $product->status : null),
            ['class'=>'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'required' => true]) !!}

            @if ($errors->has('status'))
                <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
            @endif
        </div>
    </div>
    <!--col-md-12-->
</div>
<!--row-->
<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ $product ? 'Таҳрирлаш' : 'Сақлаш' }}</button>
</div>

<script>
    $('#productEntity').select2()
</script>
