@extends('back.layouts.master')
@section('title','Yeni Sayfa Oluştur')
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
                <form method="POST" action="{{route('adminPostPagesCreate')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Sayfa Başlığı:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Sayfa Fotoğrafı:</label>
                        <input type="file" name="image" class="form-control"
                               accept="image/png, image/gif, image/jpeg" required>
                    </div>
                    <div class="form-group">
                        <label for="">Sayfa Yazı:</label>
                        <textarea id="summernote" name="contentText"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Sayfa Durum:</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Sayfa Sırası:</label>
                        <input type="text" name="order" class="form-control" >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

