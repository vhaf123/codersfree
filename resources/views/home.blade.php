@extends('layouts.app')

@section('title'){{$home->meta_title}}@endsection
@section('description'){{$home->meta_description}}@endsection
@section('image'){{$home->portada_picture? Storage::url($home->portada_picture) : asset('img/home/computer-767776_1280.jpg')}}@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@endsection

@section('content')

    {{-- Portada --}}
    <section class="mb-5">
        <div class="portada">

            <img src="{{Storage::url($home->portada_picture)}}" alt="Portada">
    
            <div class="portada-text">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 col-lg-7 align-self-center">
                            <h1 class=" text-white font-weight-bold">
                                {{$home->portada_title}}
                            </h1>
    
                           
                            <p class="text-white lead">
                                {{$home->portada_text}}
                            </p>
                           
    
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" id= "search" placeholder="{{$home->portada_search}}" aria-label="" aria-describedby="basic-addon1">
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

        <div class="bg-degradado py-4 d-none d-md-block">
            <div class="container">
                <div class="row text-white">
                    <div class="col-4">
                        <div class="media">
                            <i class="{{$home->contenido_icon_1}} mr-4 mt-1 d-sm-none d-lg-block"></i>
                            <div class="media-body">
                                <h5 class="mb-0">{{$home->contenido_title_1}}</h5>
                                {{$home->contenido_subtitle_1}}
                            </div>
                        </div>
                    </div>
    
                    <div class="col-4">
                        <div class="media">
                            <i class="{{$home->contenido_icon_2}} mr-4 mt-1 d-sm-none d-lg-block"></i>
                            <div class="media-body">
                                <h5 class="mb-0">{{$home->contenido_title_2}}</h5>
                                {{$home->contenido_subtitle_2}}
                            </div>
                        </div>
                    </div>
    
    
                    <div class="col-4">
                        <div class="media">
                            <i class="{{$home->contenido_icon_3}} mr-4 mt-1 d-sm-none d-lg-block"></i>
                            <div class="media-body">
                                <h5 class="mb-0">{{$home->contenido_title_3}}</h5>
                                {{$home->contenido_subtitle_3}}
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
    </section>

    {{-- contenido --}}
    <section class="contenido pt-5 text-secondary">
                
        <h1 class="text-center mb-4 h2">CONTENIDO</h1>

        <div class="container">

            <div class="row">

                <article class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">

                    <a class="card-img" href="{{route('cursos.index')}}">
                        <img src="{{Storage::url($home->contenido_picture_1)}}" alt="">
                    </a>

                    <h1 class="text-center mt-3 h4"><a href="{{route('cursos.index')}}" class="text-decoration-none text-secondary">{{$home->contenido_title_1}}</a></h1>
                    <p>{{$home->contenido_text_1}}</p>
                </article>



                <article class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5 d-md-none">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-77+e7+3a-76+4y"
                        data-ad-client="ca-pub-8456964757737909"
                        data-ad-slot="6098071151"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </article>


                <article class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                    <a class="card-img" href="{{route('laravel.index')}}">
                        <img src="{{Storage::url($home->contenido_picture_2)}}" alt="">
                    </a>

                    <h4 class="text-center mt-3"><a href="{{route('laravel.index')}}" class="text-decoration-none text-secondary">{{$home->contenido_title_2}}</a></h4>
                    <p>{{$home->contenido_text_2}}</p>
                </article>
                
                <article class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                    <a class="card-img" href="{{route('posts.index')}}">
                        <img src="{{Storage::url($home->contenido_picture_3)}}" alt="">
                    </a>

                    <h4 class="text-center mt-3"><a href="{{route('posts.index')}}" class="text-decoration-none text-secondary">{{$home->contenido_title_3}}</a></h4>
                    <p>{{$home->contenido_text_3}}</p>
                </article>

                <article class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5">
                    
                    <div class="card-img">
                        <img src="{{Storage::url($home->contenido_picture_4)}}" alt="">
                    </div>

                    <h4 class="text-center mt-3">{{$home->contenido_title_4}}</h4>
                    <p>{{$home->contenido_text_4}}</p>
                </article>

                <article class="col-12 col-sm-6 col-md-4 col-lg-3 mb-5 d-md-none">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-format="fluid"
                        data-ad-layout-key="-77+e7+3a-76+4y"
                        data-ad-client="ca-pub-8456964757737909"
                        data-ad-slot="6098071151"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </article>
                
            </div>
        </div>

    </section>

    {{-- Ayuda --}}
    <section class="ayuda my-5 bg-oscuro">
            
        <div class="container py-5">
            <h2 class="text-white text-center"><strong>¿No sabes qué curso llevar?</strong></h2>
            <p class="text-white text-center">Dirígete al catálogo de cursos y filtralos por categoría o nivel</p>

            <div class="d-flex justify-content-center">
                <a href="{{route('cursos.index')}}" class="btn btn-danger">Catálogo de cursos</a>
            </div>
        </div>

    </section>

    {{-- Cursos --}}
    <section class="cursos pt-5">
        <div class="container">
            <h1 class="h2 text-center mb-0 text-secondary">ALGUNO DE LOS CURSOS</h1>
            <p class="text-center mb-4">Trabajo duro para seguir subiendo cursos</p>

            <div class="row">

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


                @forelse ($cursos as $curso)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                        @include('cursos.partials.card-curso')
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-primary text-center" role="alert">
                            <strong>Aquí aparecerá los cursos más contratados</strong>
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
        
        </div>
    </section>

    {{-- Ventajas --}}
    <section class="ventajas my-5 pt-5 bg-gris text-secondary">

        <div class="container">

            <h1 class="text-center h2 mb-4">VENTAJAS</h1>
            
            <div class="row">
                
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="card h-100 shadow">
                        <article class="card-body">
                            <i class="{{$home->ventaja_icon_1}} text-info d-block text-center mb-2" style="font-size:32px"></i>
                            <h1 class="mt-0 text-center h5">{{$home->ventaja_title_1}}</h1>
                            <p class="text-center">{{$home->ventaja_text_1}}</p>
                        </article>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="card h-100 shadow">
                        <article class="card-body">
                            <i class="{{$home->ventaja_icon_2}} text-info d-block text-center mb-2" style="font-size:32px"></i>
                            <h1 class="mt-0 text-center h5">{{$home->ventaja_title_2}}</h1>
                            <p class="text-center">{{$home->ventaja_text_2}}</p>
                        </article>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-4 mb-5">
                    <div class="card h-100 shadow">
                        <article class="card-body">
                            <i class="{{$home->ventaja_icon_3}} text-info d-block text-center mb-2" style="font-size:32px"></i>
                            <h1 class="mt-0 text-center h5">{{$home->ventaja_title_3}}</h1>
                            <p class="text-center">{{$home->ventaja_text_3}}</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Nuevo contenido --}}
    <section class="nuevo_contenido py-5">

        <div class="container-fluid bg-oscuro">
            <div class="row">


                {{-- Imagen --}}
                <div class="col-12 col-lg-6 px-0">
                    @if ($home->nuevo_contenido_picture)
                        <img src="{{Storage::url($home->nuevo_contenido_picture)}}" alt="Card image cap" style="width:100%">
                    @else
                        <img src="{{asset('img/home/stripeimg.jpg')}}" alt="Card image cap" style="width:100%">
                    @endif
                </div>

                {{-- Informacion --}}
                <div class="col-12 col-lg-6  py-5 py-lg-0 align-self-center">

                    <h2 class="text-center text-white">
                        {{$home->nuevo_contenido_title}}
                    </h2>

                    <p class="text-center text-white">
                        {{$home->nuevo_contenido_subtitle}}
                    </p>

                    <div class="d-flex">
                        <div class="mx-auto">
                            <div class="bg-danger mb-5" style="height:2px; width:110px"></div>
                        </div>
                    </div>

                    <div class="row">
                        
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div class="border border-white py-2">
                                <h1 class="text-white text-center mb-1">{{$cursos_publicados}}</h1>
                                <p class="text-white text-center m-0">Cursos subidos</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div class="border border-white py-2">
                                <h1 class="text-white text-center mb-1">{{$manuales_publicados}}</h1>
                                <p class="text-white text-center m-0">Manuales</p>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="border border-white py-2">
                                <h1 class="text-white text-center mb-1">{{$posts_publicados}}</h1>
                                <p class="text-white text-center m-0">Artículos</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    {{-- informacion --}}
    <section class="informacion mt-5 pb-5 text-secondary">

        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-12 col-md-6 col-lg-7">
                    <h2 class="text-center text-md-left">{{$home->informacion_title}}</h2>
                    {!!$home->informacion_text!!}
                </div>

                <div class="col-8 col-md-6 col-lg-4 col-xl-3 offset-lg-1 mt-5">
                    @if ($home->informacion_picture)
                        <img class="img-fluid" src="{{Storage::url($home->informacion_picture)}}" alt="">
                    @else
                        <img class="img-fluid" src="{{asset('img/home/Recurso 2.png')}}" alt="">
                    @endif
                </div>
                
            </div>
        </div>

    </section> 
    
@stop

@section('js')
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>

    $.widget( "custom.catcomplete", $.ui.autocomplete, {
        _create: function() {
            this._super();
            this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
        },
        _renderMenu: function( ul, items ) {
            var that = this,
            currentCategory = "";
            $.each( items, function( index, item ) {
            var li;
            if ( item.category != currentCategory ) {
                ul.append( "<li class='ui-autocomplete-category font-weight-bold mt-2 ml-1'>" + item.category + "</li>" );
                currentCategory = item.category;
            }
            li = that._renderItemData( ul, item );
            if ( item.category ) {
                li.attr( "aria-label", item.category + " : " + item.label );
            }
            });
        }
    });

    var data = [
      { label: "anders", category: "" },
      { label: "andreas", category: "" },
      { label: "antal", category: "" },
      { label: "annhhx10", category: "Products" },
      { label: "annk K12", category: "Products" },
      { label: "annttop C13", category: "Products" },
      { label: "anders andersson", category: "People" },
      { label: "andreas andersson", category: "People" },
      { label: "andreas johnson", category: "People" }
    ];


        $('#search').catcomplete({
            maxShowItems: 5,
            source: function(request, response){
                $.ajax({
                    url: "{{route('search.home')}}",
                    dataType: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        response(data.slice(0,10))
                    }
                });
            },
            select: function(event, ui){
                //alert(ui.item.category);
                
                switch (ui.item.category) {
                    case 'Cursos':
                        $(location).attr('href','cursos/' + ui.item.slug);
                        break;

                    case 'Posts':
                        $(location).attr('href','blog/' + ui.item.slug);
                        break;

                    default:
                        break;
                }
                
            }
        });
    </script>
@endsection