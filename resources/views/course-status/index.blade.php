@extends('layouts.app')

@section('title', 'Course-Status')

@section('css')
    <style>

        .subindice{
            position: relative;
            list-style-type: none;
            padding-left: 0;
            cursor: pointer;
        }

        .subindice:before{
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            top: 0;
            left: 9px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        .subindice li{
            position: relative;
        }

        .subindice li:not(:first-of-type){
            margin: 15px 0;
        }
        
        

        .subindice li:before{
            content: ' ';
            display: inline-block;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 50%;
            background: #7F8588;
            border: 3px solid #7F8588;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        .subindice li.cursado:before{
            border: 3px solid #facf5a;
            background: #facf5a;
        }

        .subindice li.actual:before{
            background-color: white;
        }


        .subindice li h3{
            padding-left: 30px;
        }

    </style>
@endsection

@section('content')

    <div id="app" class="mb-5">

        <div class="container mt-4">
            <div class="row">

                <div class="col-12 col-lg-8">
                    <main class="video">

                        <div class="embed-responsive embed-responsive-16by9" v-html = "actual.iframe">
                        </div>
                        
                        <h1 class="h3 font-weight-bold mt-3" id="titulo">@{{actual.name}}</h1>
                        
                        {{-- <p class="" id="">@{{actual.descripcion}}</p> --}}
                        {{-- <div v-html = "actual.descripcion"></div> --}}
                        <div>
                            <div class="alert alert-danger" role="alert">
                                <b class="h4">¡¡¡ MIS CURSOS DE UDEMY A 12.99 !!! 🤩🤩🤩</b>
                            </div>
                            
                            <p>🟢 <a target="_blank" href="https://udemy.codersfree.com/notificaciones-laravel">https://udemy.codersfree.com/notificaciones-laravel</a></p>
                            <p>🟢 <a target="_blank" href="https://udemy.codersfree.com/bootstrap-5">https://udemy.codersfree.com/bootstrap-5</a></p>
                            <p>🟢 <a target="_blank" href="https://udemy.codersfree.com/api-RESTful-laravel">https://udemy.codersfree.com/api-RESTful-laravel</a></p>
                            <p>🟡 <a target="_blank" href="https://udemy.codersfree.com/ecommerce-laravel-livewire-tailwind-alpine">https://udemy.codersfree.com/ecommerce-laravel-livewire-tailwind-alpine</a></p>
                            <p>🔴 <a target="_blank" href="https://udemy.codersfree.com/plataforma-de-cursos-laravel">https://udemy.codersfree.com/plataforma-de-cursos-laravel</a></p>
                            <p>🟣 <a target="_blank" href="https://udemy.codersfree.com/pasarela-pago-laravel-cashier">https://udemy.codersfree.com/pasarela-pago-laravel-cashier</a></p>
                            
                            <p><strong>DONACIONES:</strong></p>
                            <p>Patreon:&nbsp;<a href="https://www.patreon.com/join/codersfree" target="_blank">https://www.patreon.com/join/codersfree</a></p>
                            <p>PayPal:&nbsp;<a href="https://www.paypal.com/paypalme/CodersFreePeru" target="_blank">https://www.paypal.com/paypalme/CodersFreePeru</a></p>
                        </div>
                        
                        <div class="mt-4 d-flex align-items-center">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="cursado" v-model = "checked" v-on:change = "cursado">
                                <label class="custom-control-label" for="cursado">Marcar esta unidad como culminada</label>
                            </div>
                        
                            <p v-if = "actual.file" class="d-flex align-items-center text-secondary ml-auto mb-0">
                                <i class="fas fa-save mr-2" style="font-size: 24px;"></i>
                                <a :href="'/recursos/' + actual.slug + '/download'" class="text-secondary">Archivos base del tema</a>
                            </p>
                        
                        </div>
                        
                        <div class="card my-3 bg-whithe shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="" class="text-secondary font-weight-bold text-decoration-none" v-if = "actual.anterior" v-on:click.prevent="cambiarActual(actual.anterior)">
                                            <i class="fas fa-angle-left mr-2"></i>
                                            Tema anterior
                                        </a>
                                    </div>
                                        
                                    <div>
                                        <a href="" class="text-secondary font-weight-bold text-decoration-none" v-if = "actual.next" v-on:click.prevent="cambiarActual(actual.next)">
                                            Siguiente tema
                                            <i class="fas fa-angle-right ml-2"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        {{-- <div class="my-4 d-lg-none">
                            <x-publicidad.horizontal/>
                        </div> --}}
                    </main>
                </div>

                <aside class="col-12 col-lg-4 px-lg-4 indice">

                    {{-- <div class="mb-4 d-none d-lg-block">
                        <x-publicidad.horizontal/>
                    </div> --}}



                    <div class="card shadow">
                        <div class="card-body">
                            <h1 class="h4 text-center">
                                {{$curso->name}}
                            </h1>

                            <div class="media mb-3">

                                <img class = "rounded-circle shadow mr-3" src="{{asset($curso->profesor->user->adminlte_image())}}" style="width: 60px">

                                <div class="media-body mt-1">
                                    <p class="bold mb-0">Prof. {{$curso->profesor->user->name}}</p>
                                    <a href="" class="text-primary">{{"@" . $curso->profesor->user->slug}}</a>
                                </div>
                                
                            </div>

                            <div class="progreso mb-3">
                                
                                <p class="mb-0"> @{{avance + '% completado'}}</p>

                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" :style="'width: ' + avance + '%'" :aria-valuenow="avance" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <ul  class="list-unstyled indice">

                                @foreach ($curso->modulos as $modulo)
                                    <li>
                                        <h2  class="h6 font-weight-bold mb-3">
                                            {{$modulo->name}}
                                        </h2>

                                        <ul class="subindice">
                                            @foreach ($modulo->videos as $video)
                                                <li id="{{$video->id}}"
                                                    @if ($video->cursado && $video->actual)
                                                        class = "cursado actual"
                                                    @endif
                                                    @if ($video->cursado)
                                                        class = "cursado"
                                                    @endif
                                                    @if ($video->actual)
                                                        class = "actual"
                                                    @endif>

                                                    <h3 class="h6 text-secondary" v-on:click = "cambiarActual({{$video->id}})">
                                                        {{$video->name}}
                                                    </h3>

                                                </li>
                                            @endforeach
                                        </ul> 
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        new Vue({
            el: '#app',
            data:{
                prueba: "",
                avance: "",
                curso: "",
                actual: "",
                checked: ""
            },
            created(){
                this.getAvance();
                this.getActual();
            },

            methods: {
                getAvance() {
                    axios
                    .post("{{route('course-status.avance', $curso)}}")
                    .then(response => (this.avance = response.data))
                },

                getActual() {
                    axios
                    .post("{{route('course-status.actual', $curso)}}")
                    .then(response => {
                        this.actual = response.data;
                        this.checked = response.data.actual;
                    })
                },

                cambiarActual(id){
                    axios
                    .post("{{route('course-status.actual', $curso)}}",{
                        id: id
                    })
                    .then(response => {
                        this.actual = response.data;
                        this.checked = response.data.actual;

                        $('.subindice > li').removeClass('actual');
                        $('#' + id).addClass('actual');
                        
                    })

                    $('html, body').animate({
                        scrollTop: 0
                    }, 1000);
                    
                },

                cursado(){

                    axios
                    .post("{{route('course-status.cursado', $curso)}}",{
                        id: this.actual.id,
                        checked: this.checked

                    })
                    .then(response => {
                        
                        this.getAvance();

                        if(this.checked){
                            $('#' + this.actual.id).addClass('cursado');
                        }else{
                            $('#' + this.actual.id).removeClass('cursado');
                        }

                    })
                }
            
            }
        });
        
    </script>
@endsection
