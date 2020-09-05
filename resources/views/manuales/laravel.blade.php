@extends('layouts.app')

@section('title'){{$laravel->title}}@endsection
@section('description'){{$laravel->description}}@endsection

@section('css')
    <style>

        .indice li{
            padding-left: 38px;
        }

        .indice{
            position: relative;
            list-style-type: none;
            padding-left: 0;
        }

        .indice:before{
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

        .indice li{
            position: relative;
        }

        .indice li:before{
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 50%;
            border: 3px solid #3598FF;
            width: 20px;
            height: 20px;
            z-index: 400;
        }

        .indice .active:before{
            border: 3px solid #facf5a!important;
        }

        .indice li:not(:first-of-type){
            margin: 10px 0;
        }

        .principal p, .principal li{
            color: #636b6f;
        }

        .fa-angle-left, .fa-angle-right{
            font-size: 24px;
        }

        .container{
            max-width: 1200px;
        }

    </style>
@endsection

@section('content')

    @include('layouts.partials.social-bar')

    <div class="container mt-4">
        <div class="row">

            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                      <li class="breadcrumb-item"><a href="{{route('laravel.index')}}">Manual de Laravel</a></li>
                      <li class="breadcrumb-item active" aria-current="page">@if ($actual) {{$actual->name}} @else No hay ningún tema agregado @endif</li>
                    </ol>
                </nav>
            </div>

            <nav class="col-12 col-md-4 text-secondary mb-4">
                <div class="card shadow">
                    <div class="card-body">

                        <h1 class="h3 text-center mb-3">LARAVEL 7</h1>

                        <ul class="list-unstyled indice">

                            @forelse ($laravel->temas as $tema)
                                <li @if ($actual->id == $tema->id) class="active" @endif>
                                    <h2 class = "h6">
                                        <a href="{{route('laravel.tema', $tema)}}" class="text-secondary text-decoration-none">
                                            {{$tema->name}}
                                        </a>
                                    </h2>
                                </li>
                            @empty
                                <div class="alert alert-danger" role="alert">
                                    <strong>No se ha agregado ningún tema aún</strong>
                                </div>                                
                            @endforelse
                            
                         
                        </ul>

                    </div>
                </div>
            </nav>

            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body text-secondary">

                        @if ($actual)
                            <h1>{{$actual->name}}</h1>
                            <p>{{$actual->descripcion}}</p>
                            {!!$actual->body!!}

                        @else
                            <div class="alert alert-danger" role="alert">
                                <strong>No se ha agregado ningún tema aún</strong>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            
        </div>
    </div>

@endsection