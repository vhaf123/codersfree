<div class="d-flex">

    <p class="lead mb-0 mr-3">
        <span class="badge {{$tag->background}}">
            {{$tag->name}}
        </span>
    </p>

    {{-- @foreach ($post->tags as $tag)
        @switch($tag->id)
            @case(1)
                
                <p class="lead mb-0 mr-3">
                    <span class="badge badge-primary">
                        {{$tag->name}}
                    </span>
                </p>

                @break
            @case(2)

                <p class="lead mb-0 mr-3">
                    <span class="badge badge-success">
                        {{$tag->name}}
                    </span>
                </p>

                @break
            @case(3)

                <p class="lead mb-0 mr-3">
                    <span class="badge badge-danger">
                        {{$tag->name}}
                    </span>
                </p>

                @break

            @case(4)

                <p class="lead mb-0 mr-3">
                    <span class="badge badge-warning">
                        {{$tag->name}}
                    </span>
                </p>

                @break

            @case(5)

                <p class="lead mb-0 mr-3">
                    <span class="badge badge-info">
                        {{$tag->name}}
                    </span>
                </p>


                @break
            @default
                
        @endswitch
    @endforeach --}}
</div>