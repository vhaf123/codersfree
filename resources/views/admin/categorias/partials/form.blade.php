
<div class="form-group row">
    {!! Form::label('name', 'Nombre de la categoría: ', ['class'=>"col-md-4 col-form-label text-md-right"]) !!}

    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    {!! Form::label('badge', 'Badge color: ', ['class'=>"col-md-4 col-form-label text-md-right"]) !!}

    <div class="col-md-6">
        {!! Form::text('badge', null, ['class' => 'form-control' . ( $errors->has('badge') ? ' is-invalid' : '' )]) !!}

        @error('badge')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>