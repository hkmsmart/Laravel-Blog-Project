@extends('back.layouts.master')
@section('title','Yeni Kategori Oluştur')
@section('headerCss')
@endsection
@section('footerJS')

@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive" >
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
                <form method="POST" action="{{route('adminPostCategory')}}">
                    @csrf
                    <div class="form-group">
                        <label for="">Yayin Başlığı:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

