@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.Tinymce', true)

@section('css')
    <style>
        .nueva-imagen{
            background-color: rgba(52, 58, 64, 0.5);
            color: white;
        }
        
    </style>
@endsection

@section('content_header')
    <div class="d-flex">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('admin.posts.index')}}">Posts</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$post->name}}</li>
            </ol>
        </nav>
    </div>
@stop

@section('content')
    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' => 'put', 'files' => true]) !!}
        <div class="row">

            @if ($errors->any())
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <strong>Ocurrió un error, es posible que haya dejado un campo vacío, o el nombre del post ya existe</strong>
                    </div>
                </div>
            @endif

            <div class="col-8">

                <div class="card">
                    {{-- portada --}}
                    <section>
                        <div class="card shadow">

                            <div class="portada">

                                <img src="{{Storage::url($post->picture)}}" alt="Portada" id="picture">
                                
                                <div class="portada-text">
                                    <div class="nueva-imagen p-2">
                                        <input type='file' name="picture" onchange="cambiarImagen(event, '#picture')" />
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="card-body">
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
                            </div> --}}
                            
                        </div>
                    </section>
                
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('name', 'Título') !!}
                            {!! Form::text('name', null, ['class' => 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control'. ( $errors->has('descripcion') ? ' is-invalid' : '' ), 'rows' => '4']) !!}
                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Contenido:') !!}
                            {!! Form::textarea('body', null, ['class' => 'my-editor'. ( $errors->has('body') ? ' is-invalid' : '' )]) !!}

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <h1 class="h2">SEO</h1>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control'. ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control'. ( $errors->has('description') ? ' is-invalid' : '' ), 'rows' => '4']) !!}
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4">
                
                <div class="card shadow @error('tags') border border-danger @enderror" style="background-color: #D6DEE8">
                        
                    <div class="card-body">

                        <h1 class="h4 mb-3">Etiquetas:</h1>

                        <div class="form-row">
                            @foreach ($tags as $tag)
                                <div class="form-group col-6 mb-0">
                                    <label>
                                        {!! Form::checkbox('tags[]', $tag->id, null) !!}
                                        {{$tag->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @error('tags')
                    <div class="mt-0 mb-3">
                        <small class="text-danger">
                            <strong>Tiene que seleccionar al menos una categoría</strong>
                        </small>    
                    </div>
                @enderror

                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            {!! Form::label('categoria_id', "Categoria") !!}
                            {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Estado') !!}
                            {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
                        </div>
                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary btn-block']) !!}
                        <a href="{{route('admin.posts.show', $post)}}" class="btn btn-success btn-block">Vista previa</a>
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


        var editor_config = {
            
            selector: "textarea.my-editor",
            language: 'es',
            
            content_css: "{{asset('css/app.css')}}",

            height: 400,
            encoding: 'UTF-8',
            entity_encoding: 'raw',

            plugins: [
            "autosave",
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | restoredraft | code",


            path_absolute : "/",
            relative_urls: false,

            autosave_interval: "30s",
            extended_valid_elements : "script[class|src|type], input[rel|href]",

            file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"});
            }

           

            
        };
      
        tinymce.init(editor_config);

    </script>
@endsection