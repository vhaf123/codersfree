@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="d-flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Roles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear rol</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')


    
    {!! Form::open(['route' => 'admin.roles.store']) !!}
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    {!! Form::label('name', "Nombre") !!}
                    {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', "Slug") !!}
                    {!! Form::text('slug', null, ['class' => 'form-control' . ( $errors->has('slug') ? ' is-invalid' : '' )]) !!}
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('description', "Descripción") !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control' . ( $errors->has('description') ? ' is-invalid' : '' ), 'rows' => '4']) !!}
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <h1 class="h3">Permisos</h1>

        <div class="card @error('permissions') border border-danger @enderror">
            <div class="card-body">

                <div class="row">
                    @foreach ($permissions as $permission)
                        <div class="form-group col-4">
                            <label>
                                {!! Form::checkbox('permissions[]', $permission->id, null) !!}
                                {{$permission->name}}
                            </label>
                        </div>
                    @endforeach
                    
                    <div class="col-12">
                        @error('permissions')
                            <div class="mt-0">
                                <small class="text-danger">
                                    <strong>Tiene que seleccionar al menos un permiso</strong>
                                </small>    
                            </div>
                        @enderror
                    </div>
                    
                </div>
            </div>
        </div>
        
        {!! Form::submit('Crear role', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}
       
    

@endsection