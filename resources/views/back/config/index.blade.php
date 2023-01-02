@extends('back.layouts.master')
@section('title','Tüm Ayarlar')
@section('headerCss')
    <link href="{{asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('footerJS')
    <script src="{{asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/js/demo/datatables-demo.js')}}"></script>
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="form-group">
                @if($errors->any())
                    @foreach($errors->all() as $err)
                        <div class="alert alert-danger" role="alert">
                            {{$err}}
                            @php
                                toastr()->error($err, 'Oops!')
                            @endphp
                        </div>
                    @endforeach
                @endif
            </div>
            <form method="POST" action="{{route('adminConfigUpdate')}}" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Site Başlığı</label>
                    <input type="text" name="title" required class="form-control" value="{{$config->title}}" />
                </div>
                <div class="form-group">
                    <label for="">Site Başlığı</label>
                    <select name="active" id="" class="form-control" required>
                        <option value="1" @if($config->active== 1) selected @endif>Açık</option>
                        <option value="0" @if($config->active== 0) selected @endif>Kapalı</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Logo</label>
                    @if($config->logo)
                        <br>
                        <img src="{{asset($config->logo)}}" width="200" height="100" class="img-thumbnail rounded">
                    @endif()
                    <input type="file" name="logo"  class="form-control" />
                </div>
                <div class="form-group">
                    <label for="">Site Favicon</label>
                    @if($config->favicon)
                        <br>
                        <img src="{{asset($config->favicon)}}" width="50" height="25" class="img-thumbnail rounded">
                    @endif()
                    <input type="file" name="favicon"  class="form-control"  />
                </div>
                <div class="form-group">
                    <label for="">Facebook</label>
                    <input type="text" name="facebook"  class="form-control"  value="{{$config->facebook}}"  />
                </div>
                <div class="form-group">
                    <label for="">Twitter</label>
                    <img src="" alt="">
                    <input type="text" name="twitter"  class="form-control"  value="{{$config->twitter}}"  />
                </div>
                <div class="form-group">
                    <label for="">Linkedin</label>
                    <img src="" alt="">
                    <input type="text" name="linkedin"  class="form-control"  value="{{$config->linkedin}}"  />
                </div>
                <div class="form-group">
                    <label for="">Instagram</label>
                    <img src="" alt="">
                    <input type="text" name="instagram"  class="form-control" value="{{$config->instagram}}"  />
                </div>
                <div class="form-group">
                    <label for="">Youtube</label>
                    <img src="" alt="">
                    <input type="text" name="youtube"  class="form-control" value="{{$config->youtube}}"  />
                </div>
                <div class="form-group">
                    <button class="form-control btn btn-success">Kaydet</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

