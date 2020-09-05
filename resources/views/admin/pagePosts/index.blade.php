@extends('adminlte::page')

@section('title', 'Blog')

@section('css')
    
    <style>
        .nueva-imagen{
            background-color: rgba(52, 58, 64, 0.5);
            color: white;
        }

        .nueva-imagen-2{
            background-color: rgba(52, 58, 64, 0.5);
            color: white;
            font-size: 14px;
        }
    </style>

@endsection

@section('content')
    {!! Form::model($page_post, ['route' => ['page.posts.update', $page_post], 'method' => 'put', 'files' => 'true']) !!}

        <div class="row pb-3">
            @if ($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>No puede dejar ningún campo vacío</strong>
                    </div>
                </div>
            @endif


            <div class="col-12 col-lg-8">
                {{-- portada --}}
                <section>
                    <div class="card shadow">

                        <div class="portada">

                            <img src="{{Storage::url($page_post->picture)}}" alt="Portada" id="portada_picture">
                            
                            <div class="portada-text">
                                <div class="nueva-imagen p-2">
                                    <input type='file' name="picture" onchange="cambiarImagen(event, '#portada_picture')" />
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('portada_title', 'Titulo de la portada: ') !!}
                                {!! Form::text('portada_title', null, ['class' => 'form-control' . ( $errors->has('portada_title') ? ' is-invalid' : '' )]) !!}
                                @error('portada_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('portada_text', 'Descripción de la portada: ') !!}
                                {!! Form::textarea('portada_text', null, ['class' => 'form-control' . ( $errors->has('portada_text') ? ' is-invalid' : '' ), 'rows'=>3]) !!}
                                @error('portada_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('portada_search', 'Texto del buscador: ') !!}
                                {!! Form::text('portada_search', null, ['class' => 'form-control' . ( $errors->has('portada_search') ? ' is-invalid' : '' )]) !!}
                                @error('portada_search')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                </section>
            </div>

            <div class="col-12 col-lg-4">
                <div class="card">

                    <div class="card-header bg-dark">
                        <h1 class="text-center h5 mb-0">Meta datos</h1>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('meta_title', 'Title') !!}
                            {!! Form::textarea('meta_title', null, ['class' => 'form-control' . ( $errors->has('meta_title') ? ' is-invalid' : '' ), 'rows' => 2]) !!}
                            @error('meta_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_description', 'Description') !!}
                            {!! Form::textarea('meta_description', null, ['class' => 'form-control' . ( $errors->has('meta_description') ? ' is-invalid' : '' ), 'rows' => 4]) !!}
                            @error('meta_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    </div>
                </div>
            </div>


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