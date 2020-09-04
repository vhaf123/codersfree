@extends('adminlte::page')

@section('title', 'Temas')

@section('plugins.Tinymce', true)

@section('content_header')
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="{{route('admin.laravel')}}">Manual de laravel</a></li>
      <li class="breadcrumb-item active" aria-current="page">Nuevo tema</li>
    </ol>
  </nav>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
          {!! Form::open(['route' => 'admin.temas.store']) !!}
            {!! Form::hidden('manual_id', $manual->id, ['class' => 'form-control']) !!}

            @include('admin.temas.partials.form')

            {!! Form::submit('Agregar Tema', ['class' => 'btn btn-primary btn-block']) !!}
          {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('js')

    <script>
        var editor_config = {
            language: 'es',
            path_absolute : "/",
            selector: "textarea.my-editor",
            
            plugins: [
            "autosave",
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | restoredraft | code",
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