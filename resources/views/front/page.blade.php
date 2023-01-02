@extends('front.layouts.master')
@section('title',$page->title.' - Laravel CMS')
@section('contentTitle',$page->title)
@section('contentSubTitle','')
@section('contentImg',asset($page->image))

@section('content')
    <div class="col-md-10 col-lg-8 col-xl-7">
        {!!$page->content!!}
    </div>
    @include('front.widgets.categoryWidget')
@endsection
