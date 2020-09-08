{{-- <a href="{{route('posts.show', $post)}}" class="btn-block h-100 text-decoration-none"> --}}
<div class="card shadow h-100">

    <div class="card-img">
        <img src="{{Storage::url($post->picture)}}" alt="">
        <div class="card-text d-flex flex-column justify-content-between  px-2 pt-2 pb-1">
            
            <div class="tags">
                @foreach ($post->tags as $tag)

                    <p class="lead d-inline mr-2">
                        <span class="badge {{$tag->background}}">
                            {{$tag->name}}
                        </span>
                        {{-- <a href="{{route('tags.show', $tag)}}" class="text-decoration-none">
                            
                        </a> --}}
                    </p>

                    
                @endforeach
            </div>

            <div class="publicacion-conteo px-3 text-white d-flex justify-content-between">
                
                <p class="mb-0">
                    <i class="far fa-calendar-alt mr-2"></i>{{$post->created_at->toFormattedDateString()}}
                </p>

                <p class="mb-0">
                    <i class="fas fa-eye mr-2"></i>{{$post->contador}} Visitas
                </p>

            </div>
            
        </div>
    </div>

    <div class="card-body">
        <h1 class="h4 text-dark">
            <a href="{{route('posts.show', $post)}}" class="text-secondary text-decoration-none">{{$post->name}}</a>
        </h1>
        
        
    </div>
</div>

