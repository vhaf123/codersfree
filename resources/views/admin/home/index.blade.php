@extends('adminlte::page')

@section('title', 'Home')

@section('css')
    
    <style>
        .nueva-imagen{
            background-color: rgba(0, 123, 255, 0.2);
            color: white;
        }

        .nueva-imagen-2{
            background-color: rgba(52, 58, 64, 0.5);
            color: white;
            font-size: 14px;
        }
    </style>

@endsection


{{-- @section('content_header')
    <h1>Home</h1>
@stop --}}

@section('content')

    {!! Form::model($home, ['route' => ['admin.home.update', $home], 'method' => 'put', 'files' => true]) !!}

        <div class="row mb-3">

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

                            <img src="{{Storage::url($home->portada_picture)}}" alt="Portada" id="portada_picture">
                            
                            <div class="portada-text">
                                <div class="nueva-imagen p-2">
                                    <input type='file' name="portada_picture" onchange="cambiarImagen(event, '#portada_picture')" />
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

                {{-- Contenido --}}
                <section>
                    <h1 class="text-center">Contenido</h1>

                    <div class="row">

                        {{-- Contenido 1 --}}
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-img">
                                    @if ($home->contenido_picture_1)
                                        <img src="{{Storage::url($home->contenido_picture_1)}}" alt="" id="contenido_picture_1">
                                    @else
                                        <img src="{{asset('img/home/work4-460x263.jpg')}}" alt="" id="contenido_picture_1">
                                    @endif
                                    <div class="card-text">
                                        <div class="nueva-imagen-2 p-2">
                                            <input type='file' name="contenido_picture_1" onchange="cambiarImagen(event, '#contenido_picture_1')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="form-group">
                                        {!! Form::label('contenido_icon_1', 'Icono:') !!}
                                        {!! Form::text('contenido_icon_1', null, ['class' => 'form-control' . ( $errors->has('contenido_icon_1') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_icon_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_title_1', 'Título:') !!}
                                        {!! Form::text('contenido_title_1', null, ['class' => 'form-control' . ( $errors->has('contenido_title_1') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_title_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('contenido_subtitle_1', 'Subtítulo:') !!}
                                        {!! Form::text('contenido_subtitle_1', null, ['class' => 'form-control' . ( $errors->has('contenido_subtitle_1') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_subtitle_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    

                                    <div class="form-group">
                                        {!! Form::label('contenido_text_1', 'Descripción:') !!}
                                        {!! Form::textarea('contenido_text_1', null, ['class' => 'form-control' . ( $errors->has('contenido_text_1') ? ' is-invalid' : '' ), 'rows' => 4]) !!}
                                        @error('contenido_text_1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Contenido 2 --}}
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-img">
                                    @if ($home->contenido_picture_2)
                                        <img src="{{Storage::url($home->contenido_picture_2)}}" alt="" id="contenido_picture_2">
                                    @else
                                        <img src="{{asset('img/home/work1-460x263.jpg')}}" alt="" id="contenido_picture_2">
                                    @endif

                                    <div class="card-text">
                                        <div class="nueva-imagen-2 p-2">
                                            <input type='file' name="contenido_picture_2" onchange="cambiarImagen(event, '#contenido_picture_2')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        {!! Form::label('contenido_icon_2', 'Icono:') !!}
                                        {!! Form::text('contenido_icon_2', null, ['class' => 'form-control' . ( $errors->has('contenido_icon_2') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_icon_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_title_2', 'Título:') !!}
                                        {!! Form::text('contenido_title_2', null, ['class' => 'form-control' . ( $errors->has('contenido_title_2') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_title_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('contenido_subtitle_2', 'Subtítulo:') !!}
                                        {!! Form::text('contenido_subtitle_2', null, ['class' => 'form-control' . ( $errors->has('contenido_subtitle_2') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_subtitle_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_text_2', 'Descripción:') !!}
                                        {!! Form::textarea('contenido_text_2', null, ['class' => 'form-control' . ( $errors->has('contenido_text_2') ? ' is-invalid' : '' ), 'rows' => 4]) !!}
                                        @error('contenido_text_2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Contenido 3 --}}
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-img">
                                    @if ($home->contenido_picture_3)
                                        <img src="{{Storage::url($home->contenido_picture_3)}}" alt="" id="contenido_picture_3">
                                    @else
                                        <img src="{{asset('img/home/work3-460x263.jpg')}}" alt="" id="contenido_picture_3">
                                    @endif

                                    <div class="card-text">
                                        <div class="nueva-imagen-2 p-2">
                                            <input type='file' name="contenido_picture_3" onchange="cambiarImagen(event, '#contenido_picture_3')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        {!! Form::label('contenido_icon_3', 'Icono:') !!}
                                        {!! Form::text('contenido_icon_3', null, ['class' => 'form-control' . ( $errors->has('contenido_icon_3') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_icon_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_title_3', 'Título:') !!}
                                        {!! Form::text('contenido_title_3', null, ['class' => 'form-control' . ( $errors->has('contenido_title_3') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_title_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('contenido_subtitle_3', 'Subtítulo:') !!}
                                        {!! Form::text('contenido_subtitle_3', null, ['class' => 'form-control' . ( $errors->has('contenido_subtitle_3') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_subtitle_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_text_3', 'Subtítulo:') !!}
                                        {!! Form::textarea('contenido_text_3', null, ['class' => 'form-control' . ( $errors->has('contenido_text_3') ? ' is-invalid' : '' ), 'rows' => 4]) !!}
                                        @error('contenido_text_3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        {{-- Contenido 4 --}}
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-img">
                                    @if ($home->contenido_picture_4)
                                        <img src="{{Storage::url($home->contenido_picture_4)}}" alt="" id="contenido_picture_4">
                                    @else
                                        <img src="{{asset('img/home/work2-460x263.jpg')}}" alt="" id="contenido_picture_4">
                                    @endif

                                    <div class="card-text">
                                        <div class="nueva-imagen-2 p-2">
                                            <input type='file' name="contenido_picture_4" onchange="cambiarImagen(event, '#contenido_picture_4')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    
                                    <div class="form-group">
                                        {!! Form::label('contenido_icon_4', 'Icono:') !!}
                                        {!! Form::text('contenido_icon_4', null, ['class' => 'form-control' . ( $errors->has('contenido_icon_4') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_icon_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_title_4', 'Título:') !!}
                                        {!! Form::text('contenido_title_4', null, ['class' => 'form-control' . ( $errors->has('contenido_title_4') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_title_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('contenido_subtitle_4', 'Subtítulo:') !!}
                                        {!! Form::text('contenido_subtitle_4', null, ['class' => 'form-control' . ( $errors->has('contenido_subtitle_4') ? ' is-invalid' : '' )]) !!}
                                        @error('contenido_subtitle_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('contenido_text_4', 'Subtítulo:') !!}
                                        {!! Form::textarea('contenido_text_4', null, ['class' => 'form-control' . ( $errors->has('contenido_text_4') ? ' is-invalid' : '' ), 'rows' => 4]) !!}
                                        @error('contenido_text_4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>

                {{-- Ventajas --}}
                <section>
                    <h1 class="text-center">Ventajas</h1>

                    {{-- Ventaja 1 --}}
                    <article class="card">
                        <div class="card-header">
                            Ventaja #1
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('ventaja_icon_1', 'Icono:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::text('ventaja_icon_1', null, ['class' => 'form-control' . ( $errors->has('ventaja_icon_1') ? ' is-invalid' : '' )]) !!}
                                    @error('ventaja_icon_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('ventaja_title_1', 'Titulo:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::text('ventaja_title_1', null, ['class' => 'form-control' . ( $errors->has('ventaja_title_1') ? ' is-invalid' : '' )]) !!}
                                    @error('ventaja_title_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('ventaja_text_1', 'Descripción:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::textarea('ventaja_text_1', null, ['class' => 'form-control' . ( $errors->has('ventaja_text_1') ? ' is-invalid' : '' ), 'rows' => 2]) !!}
                                    @error('ventaja_text_1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </article>

                    {{-- Ventaja 2 --}}
                    <article class="card">
                        <div class="card-header">
                            Ventaja #2
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('ventaja_icon_2', 'Icono:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::text('ventaja_icon_2', null, ['class' => 'form-control' . ( $errors->has('ventaja_icon_2') ? ' is-invalid' : '' )]) !!}
                                    @error('ventaja_icon_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('ventaja_title_2', 'Titulo:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::text('ventaja_title_2', null, ['class' => 'form-control' . ( $errors->has('ventaja_title_2') ? ' is-invalid' : '' )]) !!}
                                    @error('ventaja_title_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('ventaja_text_2', 'Descripción:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::textarea('ventaja_text_2', null, ['class' => 'form-control' . ( $errors->has('ventaja_text_2') ? ' is-invalid' : '' ), 'rows' => 2]) !!}
                                    @error('ventaja_text_2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </article>

                    {{-- Ventaja 3 --}}
                    <article class="card">
                        <div class="card-header">
                            Ventaja #3
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                {!! Form::label('ventaja_icon_3', 'Icono:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::text('ventaja_icon_3', null, ['class' => 'form-control' . ( $errors->has('ventaja_icon_3') ? ' is-invalid' : '' )]) !!}
                                    @error('ventaja_icon_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('ventaja_title_3', 'Titulo:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::text('ventaja_title_3', null, ['class' => 'form-control' . ( $errors->has('ventaja_title_3') ? ' is-invalid' : '' )]) !!}
                                    @error('ventaja_title_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                {!! Form::label('ventaja_text_3', 'Descripción:', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    
                                <div class="col-md-8">
                                    {!! Form::textarea('ventaja_text_3', null, ['class' => 'form-control' . ( $errors->has('ventaja_text_3') ? ' is-invalid' : '' ), 'rows' => 2]) !!}
                                    @error('ventaja_text_3')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </article>

                </section>

                {{-- Nuevo contenido --}}
                <section>
                    <div class="card shadow">

                        <div class="portada">

                            @if ($home->nuevo_contenido_picture)
                                <img src="{{Storage::url($home->nuevo_contenido_picture)}}" alt="Card image cap" style="width:100%" id="nuevo_contenido_picture">
                            @else
                                <img src="{{asset('img/home/stripeimg.jpg')}}" alt="Card image cap" style="width:100%" id="nuevo_contenido_picture">
                            @endif


                            <div class="portada-text">
                                <div class="nueva-imagen p-2">
                                    <input type='file' name="nuevo_contenido_picture" onchange="cambiarImagen(event, '#nuevo_contenido_picture')" />
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                {!! Form::label('nuevo_contenido_title', 'Titulo de nuevo contenido: ') !!}
                                {!! Form::text('nuevo_contenido_title', null, ['class' => 'form-control' . ( $errors->has('nuevo_contenido_title') ? ' is-invalid' : '' )]) !!}
                                @error('nuevo_contenido_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                {!! Form::label('nuevo_contenido_subtitle', 'Subitulo de nuevo contenido: ') !!}
                                {!! Form::text('nuevo_contenido_subtitle', null, ['class' => 'form-control' . ( $errors->has('nuevo_contenido_subtitle') ? ' is-invalid' : '' )]) !!}
                                @error('nuevo_contenido_subtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                </section>

                {{-- informacion --}}
                <section>
                    <h1 class="text-center">Información</h1>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('informacion_title', 'Titulo:') !!}
                                        {!! Form::text('informacion_title', null, ['class' => 'form-control' . ( $errors->has('informacion_title') ? ' is-invalid' : '' )]) !!}
                                        @error('informacion_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('informacion_text', 'Descripción') !!}
                                        {!! Form::textarea('informacion_text', null, ['class' => 'form-control' . ( $errors->has('informacion_text') ? ' is-invalid' : '' )]) !!}
                                        @error('informacion_text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="col-12 col-md-6">
                                    @if ($home->informacion_picture)
                                        <img class="img-fluid" src="{{Storage::url($home->informacion_picture)}}" alt="">
                                    @else
                                        <img class="img-fluid" src="{{asset('img/home/Recurso 2.png')}}" alt="">
                                    @endif
                                </div>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')


<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
<script>
    function cambiarImagen(event, img){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload = (event) => {
            $(img).attr('src', event.target.result); 
        };

        reader.readAsDataURL(file);
    }

    CKEDITOR.replace("informacion_text");

</script>
@stop