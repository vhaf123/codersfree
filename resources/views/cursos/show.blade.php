@extends('layouts.app')

@section('title', $curso->title)
@section('description', $curso->description)
@section('image', Storage::url($curso->picture))

@section('css')
    <style>
        .titulo{
            color: #626262;
        }

        .media-img{
            display: block;
            background-color: red;
            display: block;
            position: relative;
            width: 50%;
        }

        .media-img img{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .media-img::before{
            content: '';
            display: block;
            padding-top: 56.25%
        }

        .estrellas li{
            cursor: pointer;
        }

        .comen p:last-child{
            margin-bottom: 0;
        }

        @media (max-width: 1200px) {
            .media-img::before{
                padding-top: 75%
            }
        }

    </style>
@endsection

@section('content')

    @include('layouts.partials.social-bar')

    {{-- Jumbotron --}}
    <section class="bg-oscuro mb-4">
        <div class="container">
            <div class="row align-items-center py-5">
                <div class="col">
                    <div class="card-img">
                        <img src="{{Storage::url($curso->picture)}}" alt="" class="rounded">
                    </div>
                </div>
        
                <div class="col-12 col-lg-7 col-xl-6 text-white">
                    <h1 class="h2 mt-3 mt-lg-0">{{$curso->name}}</h1>
        
                    <p>
                        <i class="fas fa-chart-line"></i>
                        Nivel: {{$curso->nivel->name}}
                    </p>
        
                    <p>
                        <i class="far fa-calendar-alt"></i>
                        Fecha de lanzamiento: {{$curso->created_at->toFormattedDateString()}}
                    </p>
        
                    <p> <i class="fas fa-code"></i> Estado: {{$curso->status == '2' ? 'Borrador' : 'Culminado'}}</p>
        
                    <p>
                        <i class="fas fa-users"></i>
                        Matriculados: {{$curso->users_count + 100}}
                    </p>
        
                    <p>
                        <i class="far fa-star"></i>
                        Calificación: {{$curso->rating}}
                    </p>
               
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="order-2 order-lg-1 col-12 col-lg-8 text-secondary">

                {{-- Primera sección --}}
                <section class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            {{-- Descripcion --}}
                            <article class="col-12">
                                <p class="" style="font-size: 16px">{{$curso->descripcion}}</p>
                            </article>
    
                            {{-- Metas del curso --}}
                            <article class="col-12 col-md-6">
                                <header>
                                    <h1 class="h5 mb-3"><i class="far fa-list-alt"></i> Metas del curso</h1>
                                </header>
                                <ul class="list-unstyled">
                                    @forelse ($curso->metas as $meta)
                                        <li class="d-flex"><i class="mt-1 mr-2 text-primary far fa-check-circle"></i>{{$meta->name}}</li>
                                    @empty
                                        <li>No tienes ningúna meta agregada</li>
                                    @endforelse
                                </ul>
                            </article>
    
                            {{-- Requisitos --}}
                            <article class="col-12 col-md-6">
                                <header>
                                    <h1 class="h5 mb-3"><i class="fas fa-glasses"></i> Conocimientos previos</h1>
                                </header>
                                <ul class="list-unstyled">
                                    @forelse ($curso->requisitos as $requisito)
                                        <li class="d-flex"><i class="mt-1 mr-2 text-primary far fa-check-circle"></i>{{$requisito->name}}</li>
                                    @empty
                                        <li>No tienes ningún requisito agregado</li>
                                    @endforelse
                                </ul>
                            </article>
                        </div>
                    </div>
                </section>

                {{-- Temario --}}
                <section class="mb-4">
                    <header>
                        <h1 class="h2 pl-2 text-secondary">Temario</h1>
                    </header>

                    <div id="accordion" role="tablist">

                        @foreach ($curso->modulos as $modulo)
                            
                            @if ($loop->first)

                                <article class="card">
                                    <header class="card-header" role="tab" id="heading{{$modulo->id}}">
                                        <h5 class="mb-0">
                                            <a class="text-secondary d-block text-decoration-none" data-toggle="collapse" href="#collapse{{$modulo->id}}" aria-expanded="true" aria-controls="collapse{{$modulo->id}}">
                                                {{$modulo->name}}
                                            </a>
                                        </h5>
                                    </header>
                                
                                    <div id="collapse{{$modulo->id}}" class="collapse show" role="tabpanel" aria-labelledby="heading{{$modulo->id}}">
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-0">
                                                @forelse ($modulo->videos as $video)
                                                    <li class="text-secondary">
                                                        <i class="fas fa-check-circle text-primary mr-2"></i>{{$video->name}}
                                                    </li>
                                                @empty
                                                    <li>No tiene ningun tema registrado en este módulo</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </article>

                            @else

                                <article class="card mt-2">
                                    <header class="card-header" role="tab" id="heading{{$modulo->id}}">
                                        <h5 class="mb-0">
                                        <a class="text-secondary collapsed d-block text-decoration-none" data-toggle="collapse" href="#collapse{{$modulo->id}}" aria-expanded="false" aria-controls="collapse{{$modulo->id}}">
                                            {{$modulo->name}}
                                        </a>
                                        </h5>
                                    </header>
                                    <div id="collapse{{$modulo->id}}" class="collapse" role="tabpanel" aria-labelledby="heading{{$modulo->id}}">
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-0">
                                                @forelse ($modulo->videos as $video)
                                                    <li class="text-secondary">
                                                        <i class="fas fa-check-circle text-primary mr-2"></i>{{$video->name}}
                                                    </li>
                                                @empty
                                                    <li>No tiene ningun tema registrado en este módulo</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            
                            @endif

                        @endforeach

                    </div>
                </section>

                {{-- Publicidad --}}
                <div class="mb-4">
                    <x-publicidad.horizontal />
                </div>

                {{-- Valoraciones --}}
                <section class="mb-4">

                    <header>
                        <h1 class="h2">Valoraciones: </h1>
                    </header>


                    <div class="card shadow rounded">
                        <div class="card-body">
                            <p class="pl-3 lead text-secondary">
                                {{$curso->reviews->count()}} valoracion(es)
                            </p>

                            @forelse ($curso->reviews as $review)
                    
                            <article class="mt-3">
                
                                <div class="media">
                                    <img class = "mr-3 img-thumbnail rounded-circle" src="{{asset($review->user->adminlte_image())}}" alt="" style="width:  60px; height:60px; object-fit: cover;">
                                    
                                    <div class="media-body text-secondary">
                                        <div class="card">
                                            <div class="card-body bg-light">
                                                <p class="mb-1"><span class="font-weight-bold">{{$review->user->name}} </span> <i class="fas fa-star text-warning"></i> ({{$review->rating}}) <small>{{$review->created_at->diffForHumans()}}</small></p>
                                                <div class="comen">
                                                    {!!$review->comentario!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                
                            </article>
                
                        @empty
                
                            <article>
                                <div class="card bg-light shadow">
                                    <div class="card-body">
                                        <p class="lead mb-0">Este curso no cuenta con ninguna reseña</p>
                                    </div>
                                </div>
                            </article>
                
                        @endforelse
                        </div>
                    </div>


                </section>

                {{-- Reviews --}}
                @can('matriculado', $curso)
                    <section class="mb-2">

                        @can('valorado', $curso)
                       
                            <div class="alert alert-primary" role="alert">
                                <strong>Ya has valorado este curso</strong>
                            </div>
                        @else

                            <article>
                                {!! Form::open(['route' => ['cursos.review', $curso]]) !!}

                                    <div class="media">
                                        
                                        <div class="d-flex flex-column align-items-center mr-4 mt-2">
                                            <img class = "img-thumbnail rounded-circle" src="{{asset(auth()->user()->adminlte_image())}}" alt="" style="width:  80px; height:80px; object-fit: cover;">
                                        
                                            <div class="form-group">
                                                {{-- {!! Form::hidden('rating', 5, ['id' => 'rating']) !!} --}}
                                                {!! Form::hidden('rating', 5, ['id' => 'rating']) !!}
                                                <ul class="list-inline estrellas">
                    
                                                    <li class="list-inline-item mr-0" data-number = "1">
                                                        <i class="fas fa-star text-warning"></i>
                                                    </li>
                                        
                                                    <li class="list-inline-item mr-0" data-number = "2">
                                                        <i class="fas fa-star text-warning"></i>
                                                    </li>
                                        
                                                    <li class="list-inline-item mr-0" data-number = "3">
                                                        <i class="fas fa-star text-warning"></i>
                                                    </li>
                                        
                                                    <li class="list-inline-item mr-0" data-number = "4">
                                                        <i class="fas fa-star text-warning"></i>
                                                    </li>
                                        
                                                    <li class="list-inline-item" data-number = "5">
                                                        <i class="fas fa-star text-warning"></i>
                                                    </li>
                                        
                                                </ul>
                                            </div>

                                            {!! Form::submit('Valorar', ['class' => 'btn btn-primary float-right']) !!}

                                        </div>

                                        <div class="media-body">
                                            <div class="form-group">
                                                {!! Form::textarea('comentario', null, ['class' => 'form-control shadow rounded mb-2'  . ( $errors->has('comentario') ? ' is-invalid' : '' ), 'rows' => "3", 'placeholder' => 'Ingresa un comentario', 'required']) !!}
                                                @error('comentario')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                {!! Form::close() !!}
                            </article>
                        @endcan
                    </section>
                @endcan
                
            </div>

            <div class="order-1 order-lg-2 col-12 col-lg-4">

                {{-- Profesor --}}
                <section class="mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="media mb-1">
                                
                                
                                <img class="mr-3 img-thumbnail rounded-circle" src="{{$curso->profesor->user->adminlte_image()}}" alt="Generic placeholder image" style="width: 70px">
                                
                    
                                <div class="media-body pt-2">
                                    <h1 class="h5 bold">Prof. {{$curso->profesor->user->name}}</h1>
                                    <p>
                                        <a href="">{{"@".$curso->profesor->user->slug}}</a>
                                    </p>
                                </div>
                            </div>

                    
                            @can('matriculado', $curso)
                    
                                <a href="{{route('course-status.index', $curso)}}" class="btn btn-danger btn-lg btn-block ">
                                    Continuar con el curso
                                </a>
                    
                            @else
                    
                                {!! Form::open(['route' => ['cursos.matricular', $curso]]) !!}
                    
                                    {!! Form::submit('Llevar este curso', ['class' => 'btn btn-danger btn-lg py-2 btn-block']) !!}
                                
                                {!! Form::close() !!}
                            @endcan
                        </div>
                    </div>
                </section>

                <aside class="text-secondary d-none d-lg-block">
                    @forelse ($similares as $similar)

                        @if ($loop->last)
                            <div class="mb-3">
                                <x-publicidad.recomendacion />
                            </div>
                        @endif


                        <article class="media mb-3">

                            <a class="media-img mr-2" href="{{route('cursos.show', $similar)}}">
                                <img class="d-flex rounded" src="{{Storage::url($similar->picture)}}" alt="Generic placeholder image" width="50%">
                            </a>

                            <div class="media-body">
                                <h1 class="mt-0 h5 mb-1"><a class="text-decoration-none text-secondary" href="{{route('cursos.show', $similar)}}">{{Str::limit($similar->name, 30)}}</a></h1>
                                

                                <div class="media align-items-center">
                                    <img class="mr-1 img-thumbnail rounded-circle" src="{{$curso->profesor->user->adminlte_image()}}" alt="Generic placeholder image" style="width: 35px">
                                    <div class="media-body">
                                        {{$curso->profesor->user->name}}
                                    </div>
                                </div>

                                <p class="mb-0"><i class="fas fa-star text-warning"></i> {{$similar->rating}}</p>

                            </div>
                        </article>

                        @if ($loop->first)

                            <div class="mb-3">
                                <x-publicidad.recomendacion />
                            </div>
                        @endif

                    @empty
                        <div>
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- recomendacion_cuadrado -->
                            <ins class="adsbygoogle"
                                style="display:block"
                                data-ad-client="ca-pub-8456964757737909"
                                data-ad-slot="2003747628"
                                data-ad-format="auto"
                                data-full-width-responsive="true"></ins>
                            <script>
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    @endforelse
                </aside>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>
    <script>
        CKEDITOR.replace("comentario");

        $('.estrellas li').click(function(){
        var rating = $(this).data('number');

        $('#rating').val(rating);

        $('.estrellas li').each(function(){
            if($(this).data('number') > rating){
                $(this).children('i').removeClass('text-warning');
            }else{
                $(this).children('i').addClass('text-warning');
            }
        });
        
    });
    </script>
@endsection