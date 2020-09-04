@extends('layouts.app')
@section('title'){{$post->title}}@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/highlight/styles/agate.css')}}">

    <style>
    
        .portada{
            position: relative;
        }

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

        
        .fan-page{
            text-align: center;
        }

        .text-shadow{
            text-shadow: 2px 2px #282828;
        }

        .text-shadow-2{
            text-shadow: 1px 1px #282828;
        }

    </style>
@endsection

@section('content')

    <div id="fb-root"></div>

    @include('layouts.partials.social-bar')

    <section class="portada-post">
        <img src="{{Storage::url($post->picture)}}" alt="">

        <div class="portada-post-text">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-9">

                        @include('posts.partials.categorias-post')
                        
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

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 px-lg-0 contenido">

                    <div class="card shadow-lg">
                        <div class="card-body pt-4">

                            <article class="">

                                <h1>{{$post->name}}</h1>

                                {!!$post->body!!}
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

                <aside class="col-12 col-lg-4 pt-lg-4 mb-5 fan-page">
                    <div class="fb-page w-100" data-href="https://www.facebook.com/codersfree/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/codersfree/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/codersfree/">Coders Free</a></blockquote></div>
                </aside>
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