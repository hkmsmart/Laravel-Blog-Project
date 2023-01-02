@extends('back.layouts.master')
@section('title','Tüm Kategoriler')
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
                        <th>Kategori Adı</th>
                        <th>Kategori Yayın Sayısı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Değiştirme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tfoot>

                    <tr>
                        <th>Kategori Adı</th>
                        <th>Kategori Yayın Sayısı</th>
                        <th>Oluşturma Tarihi</th>
                        <th>Değiştirme Tarihi</th>
                        <th>İşlemler</th>
                    </tr>

                    </tfoot>
                    <tbody>
                    @foreach($category as $cat)
                        <tr id="{{$cat->id}}">
                            <td>{{$cat->name}}</td>
                            <td>{{$cat->postCount()}}</td>
                            <td>{{$cat->created_at}}</td>
                            <td>{{$cat->updated_at}}</td>
                            <td>
                                <a href="{{route('categoryId',$cat->id)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success"><span class="fa fa-eye"></span></a>
                                <a href="{{route('adminGetCategoryEdit',$cat->id)}}" title="Düzenle" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                                <form method="post" action="{{route('adminCategoryDelete',$cat->id)}}">
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

