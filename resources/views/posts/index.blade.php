@extends('layouts.app')

@section('title', $pagePost->meta_title)

@section('description', $pagePost->meta_description)

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">


    <style>
        .bg-vistas{
            background-color: rgba(52, 58, 64, 0.5);
            color: white;
        }

        /* Artículos similares */

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

        @media (max-width: 1200px) {
            .media-img::before{
                padding-top: 75%
            }
        }
    </style>

@endsection

@section('content')

    @include('layouts.partials.social-bar')

    <section class="buscador bg-oscuro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 py-5">
                    <h1 class="text-white text-md-center h2">{{$pagePost->portada_title}}</h1>
                    <p class="text-white text-md-center">{{$pagePost->portada_text}}</p>
                    <form action="{{route('posts.index')}}">
                        <div class="input-group">
                            <input name='search' type="text" class="form-control" id= "search" placeholder="{{$pagePost->portada_search}}" aria-label="" aria-describedby="basic-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <main class="container mt-4 mb-5">

        <div class="row">
            <div class="col-12 col-lg-8">
                
                <div class="row">

                    @forelse ($posts as $post)

                        @if ($loop->first)

                            <div class="col-12 mb-4">
                                @include('posts.partials.card-post')
                            </div>
                            
                        @else


                            @if ($loop->index == 4)
                                <div class="col-12 col-md-6 mb-4">
                                    <x-publicidad.articulo />
                                </div>

                                <div class="col-12 col-md-6 mb-4">
                                    <x-publicidad.articulo />
                                </div>
                            @endif


                            <div class="col-12 col-md-6 mb-4">
                                @include('posts.partials.card-post')
                            </div>

                        @endif
                        
                    @empty
                        <div class="col-12">
                            <div class="alert alert-primary text-center" role="alert">
                                <strong>No se ha encontrado ningún artículo con esa descripción</strong>
                            </div>
                        </div>
                    @endforelse

                </div>


            </div>

            <div class="col-4 d-none d-lg-block">
                

                <x-publicidad.cuadrado />


                <h1 class="h3 text-center text-dark mb-4">Artículos populares</h1>

                <ul class="list-unstyled">
                    @foreach ($populares as $post)

                        @if ($loop->last)
                            <li class="mb-3">
                                <x-publicidad.recomendacion />
                            </li>
                        @endif

                        <li>
                            <x-articulos-recomendados :post="$post" />
                        </li>


                        @if ($loop->first)

                            <li class="mb-3">
                                <x-publicidad.recomendacion />
                            </li>
                        @endif


                    @endforeach
                </ul>

                {{-- @forelse ($populares as $post)
                    <div class="mb-4">
                        <x-articulos-recomendados :post="$post" />
                    </div>
                @empty
                    
                @endforelse --}}

            </div>
        </div>

        {{$posts->appends(request()->all())->links()}}
    </main>
@endsection

@section('js')
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>

        $('#search').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{route('search.posts')}}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        response(data)
                    }
                });
            },
            select: function(event, ui){
                
                $(location).attr('href','blog/' + ui.item.slug);
                
            }
        });
    </script>
@endsection