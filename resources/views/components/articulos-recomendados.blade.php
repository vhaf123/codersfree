@props(['post'])

<div class="media mb-3">
    <a class="media-img mr-2" href="{{route('posts.show', $post)}}">
        <img class="d-flex rounded" src="{{Storage::url($post->picture)}}" alt="Generic placeholder image" width="50%">
    </a>
    <div class="media-body">
        <h1 class="mt-0 h5 mb-1"><a class="text-decoration-none text-secondary" href="{{route('posts.show', $post)}}">{{Str::limit($post->name, 50)}}</a></h1>
    </div>
</div>