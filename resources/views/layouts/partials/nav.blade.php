<nav class="border-top d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col">

                {{-- Menu --}}
                <ul class="nav nav-principal">

                    {{-- Home --}}
                    <li class="nav-item {{setActive('home')}}">
                      <a class="nav-link" href="{{route('home')}}">
                        <i class="fas fa-laptop-house"></i>
                        Home
                      </a>
                    </li>

                    {{-- Cursos --}}
                    <li class="nav-item {{setActive('cursos.*')}}">
                        <a class="nav-link" href="{{route('cursos.index')}}">
                          <i class="fas fa-laptop"></i>
                          Cursos
                        </a>
                    </li>

                    {{-- Manuales --}}
                    <li class="nav-item {{setActive('laravel.*')}}">
                      <a class="nav-link" href="{{route('laravel.index')}}">
                        <i class="fas fa-chalkboard-teacher"></i>
                        Manual de Laravel
                      </a>
                    </li>

                     {{-- Blog --}}
                    <li class="nav-item {{setActive('posts.*')}}">
                      <a class="nav-link" href="{{route('posts.index')}}">
                        <i class="fas fa-blog"></i>
                        Blog
                      </a>
                    </li>

                    {{-- Contáctanos --}}
                    <li class="nav-item {{setActive('contactanos.index')}}">
                      <a class="nav-link" href="{{-- {{route('contactanos.index')}} --}}">
                        <i class="far fa-address-card"></i>
                        Contáctanos
                      </a>
                    </li>

                    

                </ul>
            </div>
        </div>
    </div>
</nav>