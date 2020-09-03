@extends('adminlte::page')

@section('title', 'Editar curso')

@section('css')
    <style>
        .nueva-imagen{
            background-color: rgba(0, 123, 255, 0.2);
            color: white;
        }
    </style>
@endsection

@section('content_header')
    <div class="d-flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.cursos.index')}}">Cursos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$curso->name}}</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
{!! Form::model($curso, ['route' => ['admin.cursos.update', $curso], 'method' => 'put', 'files' => true]) !!}
    <div class="row">
        <div class="order-2 order-lg-1 col-12 col-lg-8">
                
            <div class="card">

                <div class="portada">
                        
                    <img src="{{Storage::url($curso->picture)}}" alt="" id="picture">
                    
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

                        <div class="form-group col-12">

                            <h1 class="h2 text-secondary text-center mt-4">Meta datos</h1>

                            {!! Form::label('title', 'Meta title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-12">
                            {!! Form::label('description', 'Meta description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => '4']) !!}
                        </div>
            
                        
                    </div>
                    
                </div>
            </div>

        </div>

        <div class="order-1 order-lg-2 col-12 col-lg-4">
            
            <div class="card">
                <div class="card-body">
                    <a href="{{route('admin.cursos.metas', $curso)}}" target="_blank" class="btn btn-primary btn-block">Agregar metas</a>

                    <a href="{{route('admin.cursos.requisitos', $curso)}}" target="_blank" class="btn btn-success btn-block">Agregar requisitos</a>

                    <a href="{{route('admin.cursos.modulos', $curso)}}" target="_blank" class="btn btn-info btn-block">Agregar módulos</a>
                </div>
            </div>

            <div class="card text-secondary">
                <div class="card-body">
                    <p class="card-text"><strong>Metas: </strong>{{$curso->metas_count}} metas encontrados</p>
                    <p class="card-text"><strong>Requisitos: </strong>{{$curso->requisitos_count}} requisitos encontrados</p>
                    <p class="card-text"><strong>Módulos: </strong>{{$curso->modulos_count}} módulos encontrados</p>
                    <p class="card-text"><strong>Videos: </strong>{{$curso->videos_count}} videos encontrados</p>
                    <p class="card-text"><strong>Alumnos: </strong>{{$curso->users_count}} matriculados</p>
                    <p class="card-text"><strong>Puntaje: </strong> <i class="fas fa-star text-warning"></i> {{$curso->rating}} puntos</p>
                   
                    {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
                </div>
            </div>

            {!! Form::submit("Actualizar curso", ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    </div>

{!! Form::close() !!}


    {{-- <div class="row">
      

        <div class="col-4">

           


              
        </div>
    </div> --}}
     
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

        new Vue({
            el: '#app',
            data: {
                modulos: "xd"
            },
            /* created(){
                this.getCurso();
            }, */
            methods:{
                getCurso(){
                    axios.get("{{route('axios.cursos.show', $curso)}}")
                    .then(response => {
                        this.modulos = response.data
                    })
                }
            }
        });

    </script>
@endsection