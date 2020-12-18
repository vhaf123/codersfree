<article class="card h-100 shadow">

    <div class="card-img">
        <img class="" src="{{Storage::url($curso->picture)}}" alt="Card image cap">

        <div class="card-text">
            <div class="container">

                <p class="pt-2 lead pointer">
                    <span class="badge {{$curso->categoria->badge}}">{{$curso->categoria->name}}</span>
                </p>

            </div>
        </div>

    </div>

    <div class="card-body">
        <h1 class="card-title h6">
            <a href="{{route('cursos.show', $curso)}}" class="text-decoration-none text-secondary">
                <strong>{{Str::limit($curso->name, 40)}}</strong>
            </a>
        </h1>

        <p class="mb-1 text-secondary">Estado: {{$curso->status == 2 ? 'En elaboración' : 'Culminado'}}</p>
        <p class="card-subtitle mb-1 text-muted">Prof. {{$curso->profesor->user->name}}</p>

        <div class="d-flex justify-content-between">
            <ul class="list-inline estrellas">

                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 1 ? 'warning' : 'secondary'}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 2 ? 'warning' : 'secondary'}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 3 ? 'warning' : 'secondary'}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 4 ? 'warning' : 'secondary'}}"></i>
                </li>
    
                <li class="list-inline-item">
                    <i class="fas fa-star text-{{$curso->rating >= 5 ? 'warning' : 'secondary'}}"></i>
                </li>
    
            </ul>

            <p class="text-secondary"><span class="fas fa-users mr-1"></span>({{$curso->users_count + 100}})</p>
        </div>

        

        <a href="{{route('cursos.show', $curso)}}" class="btn btn-block btn-primary">Más información</a>
    </div>
</article>