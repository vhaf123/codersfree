@extends('adminlte::page')

@section('title', 'Categorias - Editar')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Editar categorias</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.categorias.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($categoria, ['route' => ['admin.categorias.update', $categoria], 'method' => 'put']) !!}
                @include('admin.categorias.partials.form')

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection