
@extends('front.layouts.master')
@section('title','Anasayfa - Laravel CMS')
@section('contentTitle','İletişim')
@section('contentSubTitle','')
@section('contentSubTitleId','')
@section('contentImg',asset('front/img/contact-bg.jpg'))

@section('content')
    <div class="col-md-10 col-lg-8 col-xl-7">
        <p>İletişime geçmek ister misiniz? Bana mesaj göndermek için aşağıdaki formu doldurun, size en kısa sürede geri döneceğim!</p>
        <div class="my-5">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>@php print_r($error); @endphp</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" method="post" action="{{route('contact')}}">
                @csrf()
                <div class="form-floating">
                    <input class="form-control" value="{{old('name')}}" name="name" id="name" type="text" placeholder="Ad Soyad..." data-sb-validations="required" />
                    <label for="name">Ad Soyad</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Zorunlu alan.</div>
                </div>
                <div class="form-floating">
                    <input class="form-control" value="{{old('email')}}" name="email" id="email" type="email" placeholder="E-Posta..." data-sb-validations="required,email" />
                    <label for="email">E-Posta Adresi</label>
                    <div class="invalid-feedback" data-sb-feedback="email:required">Zorunlu alan.</div>
                    <div class="invalid-feedback" data-sb-feedback="email:email">E-Posta doğru değil.</div>
                </div>
                <div class="form-floating">
                    <input class="form-control" value="{{old('topic')}}" name="topic" id="phone" type="tel" placeholder="Konu..." data-sb-validations="required" />
                    <label for="phone">Konu</label>
                    <div class="invalid-feedback" data-sb-feedback="phone:required">Zorunlu alan.</div>
                </div>
                <div class="form-floating">
                    <textarea class="form-control"  name="message" id="message" placeholder="Mesaj..." style="height: 12rem" data-sb-validations="required">{{old('message')}}</textarea>
                    <label for="message">Mesaj</label>
                    <div class="invalid-feedback" data-sb-feedback="message:required">Zorunlu alan.</div>
                </div>
                <br />
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                        <div class="fw-bolder">Form gönderimi başarılı!</div>
                    </div>
                </div>
                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Mesaj gönderirken hata!</div></div>
                <!-- Submit Button-->
                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
            </form>
        </div>
    </div>
    @include('front.widgets.categoryWidget')
@endsection
