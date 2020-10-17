@extends('layouts.app')

@section('title'){{$page_curso->meta_title}}@endsection
@section('description'){{$page_curso->meta_description}}@endsection
@section('image'){{Storage::url($page_curso->portada_picture)}}@endsection

@section('css')

    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">

    <style>

        .filtro{
            background-color: #F0F0F1;
        }

        .filtro .nav-item > a{
            background-color: white;
            margin-right: 10px;
            color: #636b6f;
        }

        .filtro i{
            margin-right: 5px;
        }

    </style>
@endsection

@section('content')

    @include('layouts.partials.social-bar')

    {{-- Portada --}}
    <section>
        <div class="portada">
            <img src="{{Storage::url($page_curso->portada_picture)}}" alt="">

            <div class="portada-text">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-7 align-self-center">
                            <h1 class="text-white font-weight-bold">
                            {{$page_curso->portada_title}}
                            </h1>

                            <p class="text-white lead">
                                {{$page_curso->portada_text}}
                            </p>

                            <form action="{{route('cursos.index')}}">
                                <div class="input-group">
                                    <input name="search" type="text" class="form-control"  id= "search" placeholder="{{$page_curso->portada_search}}" aria-label="" aria-describedby="basic-addon1">
                                    <div class="input-group-append">
                                        <button class="btn btn-danger" type="submit">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="filtro shadow-sm d-none d-md-block">

            <div class="container">
        
                <div class="row">
                    <nav class="col">
                        
                        <ul class="nav nav-pills py-3">
        
                            {{-- Todos los cursos --}}
                            <li class="nav-item mb-2 mb-lg-0">
                                <a href="{{route('cursos.index')}}" class="nav-link shadow-sm">
                                    <i class="fas fa-layer-group"></i>
                                    Todos los cursos
                                </a>
                            </li>

                            {{-- Categorias --}}
                            <li class="nav-item dropdown mb-2 mb-lg-0">
                                <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-tags"></i>
                                    Categorías
                                </a>
        
                                <div class="dropdown-menu">
        
                                    @foreach ($categorias as $categoria)
                                        <a class="dropdown-item" rel="nofollow" href="{{route('cursos.index').'?categoria_id='.$categoria->id}}">{{$categoria->name}}</a>
                                    @endforeach
                                    
                                </div>
                            </li>

                            {{-- Niveles --}}
                            <li class="nav-item dropdown mb-2 mb-lg-0">
                                <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-glasses"></i>
                                    Niveles
                                </a>
        
                                <div class="dropdown-menu">
        
                                    @foreach ($niveles as $nivel)
                                        <a class="dropdown-item" rel="nofollow" href="{{route('cursos.index').'?nivel_id='.$nivel->id}}">{{$nivel->name}}</a>
                                    @endforeach
                                    
                                </div>
                            </li>

                            {{-- Estado --}}
                            <li class="nav-item dropdown mb-2 mb-lg-0">
                                <a class="nav-link dropdown-toggle dropdown-toggle shadow-sm" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cogs"></i>
                                    Estado    
                                </a>
        
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" rel="nofollow" href="{{route('cursos.index').'?status=2'}}">En elaboración</a>
                                    <a class="dropdown-item" rel="nofollow" href="{{route('cursos.index').'?status=3'}}">Culminado</a>
                                    
                                </div>
                            </li>
                    
                        </ul>
        
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <main class="my-5">

        <div class="container">
         
            <h1 class="h2 mb-3 d-lg-none">Lista de cursos</h1>
            <div class="row">


                @forelse ($cursos as $curso)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
        
                        @include('cursos.partials.card-curso')

                    </div>

                @empty
                    <div class="col-12">
                        <div class="alert alert-primary text-center" role="alert">
                            <strong>Ningún curso coincide con los criterios de busqueda</strong>
                        </div>
                    </div>
                @endforelse
                
                {{-- Publicidad --}}
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-74+cn+3r-1o+36"
                        data-ad-client="ca-pub-8456964757737909"
                        data-ad-slot="1907367096"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                    
            </div>
    
            {{-- {{$cursos->links()}} --}}
            {{ $cursos->appends(request()->all())->links() }}
        </div>
    
    </main>
@endsection

@section('js')
    {{-- Libreria jequery --}}
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>

        $('#search').autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{route('search.cursos')}}",
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
                
                $(location).attr('href','cursos/' + ui.item.slug);
                
            }
        });
    </script>
@endsection