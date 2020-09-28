@extends('layouts.app')

@section('title', $post->title)
@section('description', $post->description)
@section('image', Storage::url($post->picture))

@section('css')
    
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.2/build/styles/default.min.css">

    <style>
        /* Portada */
        .portada{
            position: relative;
        }

        .text-shadow{
            text-shadow: 2px 2px #282828;
        }

        .text-shadow-2{
            text-shadow: 1px 1px #282828;
        }

        /* Fecha */
        .fecha{
            position: absolute;
            right: 0;
            align-items: center;
        }

        .numero{
            font-size: 36px;
            border-right: 1px solid white;
            
        }

        .contenido{
            z-index: 800;
            position: relative;
            top: -40px;
        }

        .contenido p{
            font-size: 16px;
            line-height: 28px;
            
        }

        .redes{
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .redes > a{
            font-size: 32px;
            margin-left: 10px;
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

    {{-- Social-bar --}}
    @include('layouts.partials.social-bar')

    {{-- Portada --}}
    <section class="portada-post">
        <img src="{{Storage::url($post->picture)}}" alt="">

        <div class="portada-post-text">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-9">

                        <div class="d-flex">
                            @foreach ($post->tags as $tag)
                        
                                <p class="lead mb-0 mr-3">
                                    <span class="badge {{$tag->background}}">
                                        {{$tag->name}}
                                    </span>
                                </p>
                                
                            @endforeach
                        </div>
                        
                        <hgroup>
                            <h1 class="text-white font-weight-bold text-shadow">
                                {{$post->name}}
                            </h1>
                        </hgroup>

                        <p class="text-white d-none d-lg-block lead text-shadow-2">{{$post->descripcion}}</p>

                        <div class="media align-items-center">

                            <img class = "rounded-circle shadow-lg mr-3" src="{{asset($post->blogger->user->adminlte_image())}}" alt="" width="40px">

                            <div class="media-body">
                                <p class="text-white mt-3">Escrito por {{$post->blogger->user->name}}</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-2 bg-secondary shadow-lg fecha text-white rounded-left d-none d-lg-flex">

                    <div class="numero px-3">
                            {{$post->created_at->format('d')}}
                    </div>

                    <div class="pl-3">
                            <b class="">{{$post->created_at->format('M')}}</b>
                            <br>
                            <b class="">{{$post->created_at->format('Y')}}</b>
                    </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    {{-- Principal --}}
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 px-lg-0 contenido">
                    
                    {{-- Contenido principal --}}
                    <div class="card shadow-lg">
                        <article class="card-body">
                            <h1>{{$post->name}}</h1>
                            {!!$post->body!!}

                            {{-- Te puede interesar --}}
                            <aside class="alert alert-primary mt-4" role="alert">
                                <h1 class="h2">TE PUEDE INTERESAR:</h1>
                                <ul class="pl-3">
                                    @foreach ($similares as $similar)
                                        <li>
                                            <a href="">
                                                {{$similar->name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <hr>
                            {{-- Compartir redes sociales --}}
                            <footer class="redes">

                                <p class="lead mb-0 font-weight-bold mr-2 text-secondary">Compartir: </p>
    
                                <a  href=""
                                    id="shareBtn"                                    
                                    title="Compartir en Facebook"
                                    class="text-facebook"
                                    rel="nofollow">
                                    <i class="fab fa-facebook-square"></i>
                                </a>
    
                                <a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$post->name}}&via=CodersFree&hashtags=CodersFree"
                                    title="Compartir en Twitter"
                                    class="text-twitter" target="_blank"
                                    rel="nofollow">
                                    <i class="fab fa-twitter-square"></i>
                                </a>
    
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{request()->fullUrl()}}"
                                    title="Compartir en Linkedin"
                                    class="text-linkedin" target="_blank"
                                    rel="nofollow">
                                    <i class="fab fa-linkedin"></i>
                                </a>
    
                                <a href=""
                                    title="Compartir en WhatsApp"
                                    class="text-whatsApp" target="_blank"
                                    rel="nofollow">
                                    <i class="fab fa-whatsapp-square"></i>
                                </a>
                            </footer>

                        </article>
                    </div>
                </div>

                <div class="d-none d-lg-block col-4 pt-lg-4 mb-5">
                    <aside>
                        

                        <div class="alert alert-primary mt-4 text-center" role="alert">
                            <strong>Últimos artículos</strong>
                        </div>

                        {{-- <h1 class="h2 text-secondary text-center border-bottom border-secondary pb-2 mt-4 mb-4">Último artículos</h1> --}}

                        <ul class="list-unstyled">
                            @foreach ($ultimos as $ultimo)
                                <li class="media mb-3">
                                    <a class="media-img mr-2" href="{{route('posts.show', $ultimo)}}">
                                        <img class="d-flex rounded" src="{{Storage::url($ultimo->picture)}}" alt="Generic placeholder image" width="50%">
                                    </a>
                                    <div class="media-body">
                                        <h1 class="mt-0 h5 mb-1"><a class="text-decoration-none text-secondary" href="{{route('cursos.show', $ultimo)}}">{{Str::limit($ultimo->name, 50)}}</a></h1>
                                        
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </aside>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('js')
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v7.0&appId=264847741428588&autoLogAppEvents=1" nonce="hnF0HBgN"></script>
    <script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@10.1.1/build/highlight.min.js"></script>

    <script>
        document.getElementById('shareBtn').onclick = function() {
          FB.ui({
            display: 'popup',
            method: 'share',
            href: '{{request()->fullUrl()}}',
          }, function(response){});
        }

        hljs.initHighlightingOnLoad();
    </script>

@endsection


{{-- 

@section('css')

    

    <style>
    
        

        
        
        .fan-page{
            text-align: center;
        }

        


        

    </style>
@endsection

@section('content')

    

    

    

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 px-lg-0 contenido">

                    <div class="card shadow-lg">
                        <div class="card-body pt-4">

                            <article class="">

                                <h1>{{$post->name}}</h1>

                                {!!$post->body!!}


                                <div class="alert alert-primary" role="alert">
                                    <h1 class="h2">TE PUEDE INTERESAR:</h1>
                                    <ul class="pl-3">
                                        @foreach ($similares as $similar)
                                            <li>
                                                <a href="">
                                                    {{$similar->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                                <hr>

                                <footer class="redes">

                                    <p class="lead mb-0 font-weight-bold mr-2 text-secondary">Compartir: </p>
        
                                    <a  href=""
                                        id="shareBtn"                                    
                                        title="Compartir en Facebook"
                                        class="text-facebook"
                                        rel="nofollow">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
        
                                    <a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$post->name}}&via=CodersFree&hashtags=CodersFree"
                                        title="Compartir en Twitter"
                                        class="text-twitter" target="_blank"
                                        rel="nofollow">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
        
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{request()->fullUrl()}}"
                                        title="Compartir en Linkedin"
                                        class="text-linkedin" target="_blank"
                                        rel="nofollow">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
        
                                    <a href=""
                                        title="Compartir en WhatsApp"
                                        class="text-whatsApp" target="_blank"
                                        rel="nofollow">
                                        <i class="fab fa-whatsapp-square"></i>
                                    </a>
                                </footer>

                            </article>

                        </div>
                    </div>
                </div>

                <div class="">

                    

                    <aside class="mb-5">

                        <div class="alert alert-primary" role="alert">
                            <h1 class="text-center h5 mb-0"><strong>Últimos posts</strong></h1>
                        </div>
                    

                        



                       
                        
                    </aside>

                    <div class="alert alert-primary" role="alert">
                        <h1 class="text-center h5 mb-0"><strong>Facebok</strong></h1>
                    </div>

                    <div class="fan-page">

                        <div class="fb-page w-100" data-href="https://www.facebook.com/codersfree/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codersfree/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codersfree/">Coders Free</a></blockquote></div>
                    </div>
                    
                </div>
            </div>
        </div>
    </main>

@endsection

 --}}