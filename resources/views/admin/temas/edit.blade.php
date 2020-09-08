@extends('adminlte::page')

@section('title', 'Temas')

@section('plugins.Tinymce', true)

@section('content_header')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{route('admin.laravel')}}">Manual de laravel</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.capitulos.show', $tema->capitulo)}}">{{$tema->capitulo->name}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$tema->name}}</li>
    </ol>
  </nav>
@stop

@section('content')
  {!! Form::model($tema, ['route' => ['admin.temas.update', $tema], 'method' => 'put']) !!}
    <div class="row">
      <div class="col-8">
        <div class="card">
            <div class="card-body">
              
              {{-- Nombre --}}
              <div class="form-group">
                  {!! Form::label('name', 'Nombre') !!}
                  {!! Form::text('name', null, ['class' => 'form-control' . ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              
              
              {{-- Body --}}
              <div class="form-group">
                  {!! Form::label('body', 'Contenido') !!}
                  {!! Form::textarea('body', null, ['class' => 'form-control my-editor'  . ( $errors->has('body') ? ' is-invalid' : '' )]) !!}
                  @error('body')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>

                
              
            </div>
        </div>
      </div>

      <div class="col-4">
        <div class="card">
          <div class="card-body">

            <div class="form-group">
              {!! Form::label('title', 'Title') !!}
              {!! Form::text('title', null, ['class' => 'form-control' . ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
              @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::label('description', 'Descripción') !!}
              {!! Form::textarea('description', null, ['class' => 'form-control' . ( $errors->has('description') ? ' is-invalid' : '' ), 'rows' => '4']) !!}
              @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="form-group">
              {!! Form::select('status', $status, null, ['class' => 'form-control']) !!}
            </div>

            {!! Form::submit('Actualizar Tema', ['class' => 'btn btn-primary btn-block']) !!}

          </div>
        </div>
      </div>
    </div>
  {!! Form::close() !!}
@endsection

@section('js')

    <script>
        var editor_config = {
            selector: "textarea.my-editor",
            language: 'es',

            content_css: "{{asset('css/app.css')}}",
            
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