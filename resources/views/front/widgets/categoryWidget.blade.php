<div class="col-md-2 col-lg-4 col-xl-5">
    <div class="list-group" style="text-align: right">
        <a href="#" class="list-group-item disabled" style="color:black;font-weight: 700">Kategoriler</a>
        @foreach($categories as $cat)
            @if($cat->postCount()> 0)
            <a href="{{route('categoryId',$cat->id)}}"
               class="list-group-item @if(Request::segment(1)=='category' AND Request::segment(2)==$cat->id) disabled @endif"
               title="{{$cat->slug}}">{{$cat->name}}
                <span class="badge bg-secondary">{{$cat->postCount()}}</span>
            </a>
            @endif
        @endforeach
    </div>
</div>
