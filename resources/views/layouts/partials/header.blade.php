<header class="header_principal bg-white shadow-sm">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cabecera">
                    {{-- Logotipo --}}
                    <a class="navbar-brand text-secondary d-flex align-items-center" href="{{ url('/') }}">
                        <img src="{{asset('img/layouts/logo.svg')}}" alt="" height="30px">
                    </a>

                    <button class="btn d-md-none boton-menu" id="boton-abrir">
                        <i class="fas fa-bars"></i>
                    </button>

                    {{-- Botones de acción --}}
                    <div class="d-none d-md-block">

                        @guest

                            {{-- Botones de login --}}
                            <a href="{{ route('login') }}" class="btn btn-outline-dark font-weight-bold" rel="nofollow">
                                Iniciar sesión
                            </a>
                
                            <a href="{{ route('register') }}" class="btn btn-danger font-weight-bold ml-2" rel="nofollow">
                                Registrarse
                            </a>

                        @else

                            {{-- opciones usuario --}}
                            @include('layouts.partials.opciones-usuario')

                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.nav')

</header>