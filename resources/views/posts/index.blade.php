@extends('layouts.app')

@section('title', '▷ Blog de programación e informática')

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@endsection

@section('content')

    @include('layouts.partials.social-bar')

    <section class="buscador bg-oscuro">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 py-5">
                    <h1 class="text-white text-md-center h2">¿Estás buscando algún artículo en particular?</h1>
                    <p class="text-white text-md-center">Encuentra los mejores post de programación y desarrollo web. Nuevo contenido todos los días.</p>
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" id= "search" placeholder="Escribe el nombre del artículo" aria-label="" aria-describedby="basic-addon1">
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

                            <div class="col-12 col-md-6 mb-4">
                                @include('posts.partials.card-post')
                            </div>

                        @endif
                        
                    @empty
                        
                    @endforelse

                </div>

            </div>

            <div class="col-4 d-none d-lg-block">

                {{-- <h1 class="mb-0 h4 bg-oscuro text-center text-white py-2 mb-4 shadow">Populares</h1> --}}

                <h1 class="h3 text-center text-dark mb-4">Artículos populares</h1>

                @forelse ($populares as $post)
                    <div class="mb-4">
                        @include('posts.partials.card-populares')
                    </div>
                @empty
                    
                @endforelse

            </div>
        </div>

        {{$posts->links()}}
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