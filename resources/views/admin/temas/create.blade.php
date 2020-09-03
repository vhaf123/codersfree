@extends('adminlte::page')

@section('title', 'Temas')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        

    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::hidden('manual_id', $manual->id, ['class' => 'form-control']) !!}

            <div class="form-group">
                {!! Form::label('capitulo', 'Capítulo(opcional)') !!}
                {!! Form::text('capitulo', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Contenido') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
@endsection