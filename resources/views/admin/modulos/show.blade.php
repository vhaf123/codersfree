@extends('adminlte::page')

@section('title', 'Modulo')

@section('plugins.Ckeditor', true)

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.cursos.edit', $modulo->curso)}}">{{$modulo->curso->name}}</a></li>
                {{-- <li class="breadcrumb-item"><a href="{{route('admin.modulos.index')}}">Módulos</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">{{$modulo->name}}</li>
            </ol>
        </nav>
    </div>

    
@stop

@section('content')
    <div class="row">

        @if ($errors->any())
            <div class="col-12">
                <div class="alert alert-danger" role="alert">
                    <strong>Ha ocurrido uno o más errores, solucionelo para poder continuar</strong>
                </div>
            </div>
        @endif

        <div class="col-8">
            <div class="card">
                <div class="card-body">

                    {!! Form::open(['route' => 'admin.videos.store']) !!}

                        {!! Form::hidden('modulo_id', $modulo->id) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Título') !!}
                            {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control' . ( $errors->has('descripcion') ? ' is-invalid' : '' ), 'rows' => '4']) !!}
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('url', 'Url:') !!}
                            {!! Form::text('url', null, ['class' => 'form-control' . ( $errors->has('url') ? ' is-invalid' : '' )]) !!}
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        {!! Form::submit('Agregar video', ['class' => 'btn btn-primary btn-block']) !!}
                    {!! Form::close() !!}
                    
                </div>
            </div>
        </div>

        <div class="col-4">
            @forelse ($modulo->videos as $video)
                <div class="card">
                    <div class="card-body">
                        <p class="card-text"><strong>Nombre: </strong>{{$video->name}}</p>
                    </div>

                    <div class="card-footer">
                        <a href="{{route('admin.videos.edit', $video)}}" class="btn btn-primary btn-sm">Editar</a>

                        {!! Form::open(['class' => 'd-inline']) !!}
                            {!! Form::submit('Eliminar', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @empty
                <div class="alert alert-danger" role="alert">
                    <strong>Aún no has agregado ningún video</strong>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('js')
    <script>
        CKEDITOR.replace("descripcion");
    </script>
@endsection
