<div class="form-group">
    {!! Form::label('capitulo', 'Capítulo(opcional)') !!}
    {!! Form::text('capitulo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control' . ( $errors->has('description') ? ' is-invalid' : '' ), 'rows' => '4']) !!}
    @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('body', 'Contenido') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control my-editor'  . ( $errors->has('body') ? ' is-invalid' : '' )]) !!}
    @error('body')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>