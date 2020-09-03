@extends('adminlte::page')

@section('title', 'Modulo')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Editar módulo</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.cursos.edit', $modulo->curso)}}">{{$modulo->curso->name}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$modulo->name}}</li>
            </ol>
        </nav>
    </div>
@stop


@section('content')
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($modulo) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>


@endsection