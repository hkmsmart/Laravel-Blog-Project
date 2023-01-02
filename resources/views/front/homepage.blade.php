@extends('front.layouts.master')
@section('title','Anasayfa')

@if(str_contains(url()->current(),'category'))
    @section('contentSubTitle',$posts[0]->getCategory->name)
    @section('contentSubTitleId',route('categoryId',$posts[0]->getCategory->id))
@else
    @section('contentSubTitle','Laravel CMS')
    @section('contentTitle','Anasayfa')
@endif
@section('content')
    <div class="col-md-10 col-lg-8 col-xl-7">
        <!-- Post preview-->
        @include('front.widgets.postsList')
        <!-- Pager-->
    </div>
    @include('front.widgets.categoryWidget')
    {{$posts->links('pagination::bootstrap-4')}}
@endsection

