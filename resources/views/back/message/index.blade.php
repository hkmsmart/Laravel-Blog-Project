@extends('back.layouts.master')
@section('title','Tüm Mesajlar')
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Ad Soyad</th>
                        <th>E-Posta Adres</th>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Oluşturma Tarihi</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Ad Soyad</th>
                        <th>E-Posta Adres</th>
                        <th>Konu</th>
                        <th>Açıklama</th>
                        <th>Oluşturma Tarihi</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php $count = 1; @endphp
                    @foreach($messages as $msg)
                        <tr id="{{$msg->id}}">
                            <td>{{$count++}}</td>
                            <td>{{$msg->name}}</td>
                            <td>{{$msg->email}}</td>
                            <td>{{$msg->topic}}</td>
                            <td>{{$msg->message}}</td>
                            <td>{{$msg->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

