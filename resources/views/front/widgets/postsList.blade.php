@foreach($posts as $p)
    <div class="post-preview">
        <a href="{{route('single',$p->id)}}">
            <h2 class="post-title" title="{{$p->slug}}">{{$p->title}}</h2>
        </a>
        <img src="{{asset($p->image)}}" alt="{{$p->title}}" style=" width: 250px; height: 205px; ">
        <a href="{{route('single',$p->id)}}">
            <div><h6 class="post-subtitle" style="font-weight:600">{!!Str::limit($p->content,50,'...') !!}</h6></div>
        </a>
        <p class="post-meta">
            Kategori:
            <a href="{{route('categoryId',$p->getCategory->id)}}">{{$p->getCategory->name}}</a>
            Yayın Zamanı:{{$p->created_at->diffForHumans()}}
        </p>
    </div>
    <!-- Divider-->
    @if(!$loop->last)
        <hr class="my-4" />
    @endif
@endforeach
