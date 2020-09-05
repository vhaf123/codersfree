@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <div class="d-flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.tags.index')}}">Tags</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear etiqueta</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
    
    {!! Form::open(['route' => 'admin.tags.store']) !!}

        <div class="card">
            <div class="card-body">
            
                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('background', 'Background') !!}
                    {!! Form::text('background', null, ['class' => 'form-control'. ( $errors->has('background') ? ' is-invalid' : '' )]) !!}
                    @error('background')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                
                {!! Form::submit('Crear etiqueta', ['class' => 'btn btn-primary btn-block']) !!}
                    
                
            </div>
        </div>

    {!! Form::close() !!}

@endsection