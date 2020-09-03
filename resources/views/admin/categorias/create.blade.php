@extends('adminlte::page')

@section('title', 'Categorias - Crear')

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Crear categorias</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.categorias.index')}}">Categorias</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categorias.store']) !!}
                @include('admin.categorias.partials.form')

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {!! Form::submit('Crear categoría', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>
    @endsection
@endsection