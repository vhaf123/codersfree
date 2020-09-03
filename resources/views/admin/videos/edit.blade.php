@extends('adminlte::page')

@section('title', 'Video')

@section('plugins.Ckeditor', true)

@section('content_header')

    <nav aria-label="breadcrumb float-right">
        <ol class="breadcrumb">
        {{-- <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li> --}}
        <li class="breadcrumb-item"><a href="{{route('admin.modulos.index')}}">Módulos</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.modulos.show', $video->modulo->id)}}">{{$video->modulo->name}}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$video->name}}</li>
        </ol>
    </nav>
@stop

@section('content')
    <div id="app" class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="embed-responsive embed-responsive-16by9" v-html='video.iframe'>
                    {!!$video->iframe!!}
                </div>

                <div class="card-body">
                    
                    {!! Form::model($video, ['route' => ['admin.videos.update', $video], 'method' => 'put']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Nombre') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion', 'Descripcion') !!}
                            {!! Form::textarea('descripcion', null) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('url', "Url") !!}
                            {!! Form::text('url', null, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Actualizar', ['class' => 'btn btn-block btn-primary']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        CKEDITOR.replace("descripcion");
    </script>
@endsection