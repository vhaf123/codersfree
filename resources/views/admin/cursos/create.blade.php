@extends('adminlte::page')

@section('title', 'Crear curso')

@section('css')
    <style>
        .nueva-imagen{
            background-color: rgba(0, 123, 255, 0.2);
            color: white;
        }
    </style>
@endsection

@section('content_header')
    <div class="d-flex align-items-center justify-content-between">
        <h1>Editar curso</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Crear</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
    

    {!! Form::open(['route' => 'admin.cursos.store', 'files' => true]) !!}
        <div class="card">

            <div class="portada">
                        
                @if (isset($curso))
                    <img src="{{Storage::url($curso->picture)}}" alt="" id="picture">
                @else
                    <img src="https://via.placeholder.com/1200" alt="" id="picture">
                @endif
                
                
                <div class="portada-text">
                    <div class="nueva-imagen p-2">
                        <input type='file' name="picture" onchange="cambiarImagen(event, '#picture')" />
        
                        @error('picture')
                            <span class="text-danger" role="alert">
                                <strong>Debes escoger una imagen</strong>
                            </span>
                        @enderror
                    </div>
        
                </div>
                        
            </div>
        
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12">
                        {!! Form::label('name', null) !!}
                        {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' ) ]) !!}
                        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group col-12">
                        {!! Form::label('descripcion', null) !!}
                        {!! Form::textarea('descripcion', null, ['class' => 'form-control' . ( $errors->has('descripcion') ? ' is-invalid' : '' ), 'rows' => 4]) !!}
        
                        @error('descripcion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group col-6">
                        {!! Form::label('categoria_id', 'Categoria') !!}
                        {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control'. ( $errors->has('categoria_id') ? ' is-invalid' : '' )]) !!}
                        @error('categoria_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-group col-6">
                        {!! Form::label('nivel_id', 'Nivel') !!}
                        {!! Form::select('nivel_id', $niveles, null, ['class' => 'form-control'. ( $errors->has('nivel_id') ? ' is-invalid' : '' )]) !!}
                        @error('nivel_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    
                </div>
                
            </div>
        
        </div>
        
        <div class="form-group col-12">
            {!! Form::submit("Crear curso", ['class' => 'btn btn-primary btn-block btn-lg']) !!}
        </div>
    {!! Form::close() !!}

     
@endsection

@section('js')
    <script>
        function cambiarImagen(event, img){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                $(img).attr('src', event.target.result); 
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection