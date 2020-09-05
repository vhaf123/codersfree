@extends('layouts.app')

@section('title', 'Contáctanos')

@section('style')
    
@endsection

@section('content')
<main class="pt-4 mb-5">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-7 mb-3 mb-md-0">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3 font-weight-bold card-title">Ponte en contácto</h1>
                        <p class="card-text">Complete el formulario y nos pondremos en contácto lo más pronto posible</p>

                        {!! Form::open(['route' => 'contactanos.mensaje']) !!}
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', "placeholder"=>"Escribe tu nombre", 'required']) !!}

                            </div>

                            <div class="form-group">
                                {!! Form::label('email', "Correo") !!}
                                {!! Form::text('email', null, ['class' => 'form-control', "placeholder"=>"Escribe tu correo", 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('telefono', 'Teléfono') !!}
                                {!! Form::text('telefono', null, ['class' => 'form-control', "placeholder"=>"Escribe tu teléfono", 'required']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('mensaje', 'Mensaje') !!}
                                {!! Form::textarea('mensaje', null, ['rows' => '3', 'class' => 'form-control', "placeholder"=>"Escribe tu correo", 'required']) !!}
                            </div>

                            {!! Form::submit('Envíar', ['class' => 'btn btn-danger font-weight-bold']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-5 px-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h4 cart-title font-weight-bold">Contáctanos</h1>
                        <p class="card-text mb-2">Si deseas, también puedes escribirnos a nuestro correo electrónico</p>
                        <address>
                            <a href="">victor.aranaf92@gmail.com</a>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('script')
    
@endsection