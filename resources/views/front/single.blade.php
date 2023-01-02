@extends('front.layouts.master')
@section('title','Anasayfa - Laravel CMS')
@section('contentTitle',$Posts->title)
@section('contentSubTitle',$PostsCategory->name)
@section('contentSubTitleId',route('categoryId',$PostsCategory->id))
@section('contentImg',asset($Posts->image))

@section('content')
    <div class="col-md-10 col-lg-8 col-xl-7">
        {!!$Posts->content!!}
        <div>Okunma Sayısı:{{$Posts->hit}}</div>
    </div>
    @include('front.widgets.categoryWidget')
@endsection
