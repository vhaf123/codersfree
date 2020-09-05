<nav class="sidebar bg-oscuro d-md-none">
    <div class="logo-sidebar bg-semi-oscuro border-bottom">
        <a class="navbar-brand text-white d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{asset('img/layouts/logo_letras_blancas.svg')}}" alt="" height="24px">
            {{-- <span class=" ml-1">Coders</span>Free --}}
        </a>
    </div>

    <div class="scrollbar">
        <ul class="menu">
            <li class="{{setActive('home')}}">
                <a href="{{route('home')}}" class="">
                    <i class="fas fa-laptop-house"></i>
                    Home
                </a>
            </li>

            <li class="{{setActive('cursos.*')}}">
                <a href="{{route('cursos.index')}}" class="">
                    <i class="fab fa-discourse"></i>
                    Cursos
                </a>
            </li>

            <li class="{{setActive('laravel.*')}}">
                <a href="{{route('laravel.index')}}">
                    <i class="fas fa-chalkboard-teacher"></i>
                    Manual de Laravel
                </a>
            </li>

            <li>
                <a href="{{route('posts.index')}}">
                    <i class="fas fa-blog"></i>
                    Blog
                </a>
            </li>


            <li class="{{setActive('contactanos.index')}}">
                <a href="{{route('contactanos.index')}}" class="">
                    <i class="far fa-address-card"></i>
                    Contáctanos
                </a>
            </li>
    
    
        </ul>

        

        <div class="text-white ml-4 mt-4 mb-2">
            USUARIOS
        </div>

        @guest
        
            <ul class="menu">

                <li>
                    <a href="{{ route('login') }}" rel="nofollow">
                        <i class="fas fa-user"></i>
                        Iniciar sesión
                    </a>
                </li>

                <li>
                    <a href="{{ route('register') }}" rel="nofollow">
                        <i class="fas fa-fingerprint"></i>
                        Registrate
                    </a>
                </li>

                
            </ul>


        @else

            <ul class="menu">

                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" rel="nofollow">
                        <i class="fas fa-sign-out-alt"></i>
                        Cerrar sesión
                    </a>
                </li>
            </ul>
        @endguest
        
    </div>
</nav>

<div class="cerrar-sidebar d-md-none"></div>