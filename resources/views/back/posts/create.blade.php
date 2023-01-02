@extends('back.layouts.master')
@section('title','Yeni Yayın Oluştur')
@section('headerCss')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
@endsection
@section('footerJS')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'İçerik Giriniz',
                tabsize: 2,
                height: 300
            });
        });
    </script>
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
                <form method="POST" action="{{route('yayinlar.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Yayin Başlığı:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori:</label>
                        <select name="category" class="form-control" required>
                            <option value="">Seçin</option>
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Yayin Fotoğrafı:</label>
                        <input type="file" name="image" class="form-control"
                               accept="image/png, image/gif, image/jpeg" required>
                    </div>
                    <div class="form-group">
                        <label for="">Yayin Yazı:</label>
                        <textarea id="summernote" name="contentText"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Yayin Durum:</label>
                        <select name="status" class="form-control" required>
                            <option value="aktif">Aktif</option>
                            <option value="pasif">Pasif</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

