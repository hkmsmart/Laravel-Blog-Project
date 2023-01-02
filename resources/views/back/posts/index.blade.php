@extends('back.layouts.master')
@section('title','Tüm Yayınlar')
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
                        <th>Fotoğraf</th>
                        <th>Yayin Başlık</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Durum</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Değiştirme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>

                    <tr>
                        <th>Fotoğraf</th>
                        <th>Yayin Başlık</th>
                        <th>Kategori</th>
                        <th>Hit</th>
                        <th>Durum</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Değiştirme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>

                    </tfoot>
                    <tbody>
                    @foreach($posts as $p)
                    <tr id="{{$p->id}}">
                        <td><img src="{{asset($p->image)}}" alt="{{$p->title}}" style=" width: 50px; height: 50px; "></td>
                        <td>{{$p->title}}</td>
                        <td>{{$p->getCategory->name}}</td>
                        <td>{{$p->hit}}</td>
                        <td>
                            @if($p->deleted_at == '') <span style="color:green">Aktif @else <span style="color:red">Pasif @endif </span>
                        </td>
                        <td>{{$p->created_at}}</td>
                        <td>{{$p->updated_at}}</td>
                        <td>
                            <a href="{{route('single',$p->id)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><span class="fa fa-eye"></span></a>
                            <a href="{{route('yayinlar.edit',$p->id)}}" title="Düzenle" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                            <form method="post" action="{{route('yayinlar.destroy',$p->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

