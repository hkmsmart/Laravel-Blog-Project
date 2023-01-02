@extends('back.layouts.master')
@section('title','Tüm Sayfalar')
@section('headerCss')
    <link href="{{asset('back/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('footerJS')
    <script src="{{asset('back/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/js/demo/datatables-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        $(function() {
            $("input[type='checkbox'] ").change( function(){
                var valChckbox = '';
                var id = $(this).data('id');

                if ($(this).is(':checked')) {
                    valChckbox = 1;
                }
                else {
                    valChckbox = 0;
                }

                $.get("{{route('adminPagesSwitch')}}",{id:id,statu:valChckbox}, function (data,status){});
            });

            new Sortable(orders, {
                handle: '.handle', // handle's class
                animation: 150,
                sort: true,
                onEnd: function (evt) {
                    console.log(evt.to.innerText);
                    $.get("{{route('adminPageOrders')}}",{htmlText:evt.to.innerText},function (data,status){
                        $('#orderSuccess').show().delay(1000).fadeOut();
                    });
                },
            });

            $.fn.dataTable.ext.errMode = 'none';
            $('#dataTable2').DataTable({
                order: [[3, 'asc']],
            });
        });
    </script>
@endsection
@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="alert alert-success" id="orderSuccess" style="display: none" >
                Sıralama başarıyla güncellendi.
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sırala</th>
                            <th>Fotoğraf</th>
                            <th>Sayfa Başlık</th>
                            <th>Menu Sırası</th>
                            <th>Durum</th>
                            <th>Oluşturma Tarihi</th>
                            <th>Değiştirme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Sırala</th>
                            <th>Fotoğraf</th>
                            <th>Sayfa Başlık</th>
                            <th>Menu Sırası</th>
                            <th>Durum</th>
                            <th>Oluşturma Tarihi</th>
                            <th>Değiştirme Tarihi</th>
                            <th>İşlemler</th>
                        </tr>
                    </tfoot>
                    <tbody id="orders">
                        @foreach($pages as $p)
                        <tr id="{{$p->id}}">
                            <td><span style="font-size: 0px;">_{{$p->id}}_</span><i class="fa fa-arrows-alt-v fa-3x handle" style="cursor: move"></i></td>
                            <td><img src="{{asset($p->image)}}" alt="{{$p->title}}" style=" width: 50px; height: 50px; "></td>
                            <td>{{$p->title}}</td>
                            <td>{{$p->order}}</td>
                            <td>
                                <input type="checkbox" data-id="{{$p->id}}" data-toggle="toggle" data-size="lg" @if($p->status == 1) checked @endif>
                            </td>
                            <td>{{$p->created_at}}</td>
                            <td>{{$p->updated_at}}</td>
                            <td>
                                <a href="{{route('pageSlug',$p->slug)}}" target="_blank" title="Görüntüle" class="btn btn-sm btn-success">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="{{route('adminGetPagesEdit',$p->id)}}" title="Düzenle" class="btn btn-sm btn-info"><i class="fa fa-pencil"></i></a>
                                <form method="post" action="{{route('adminPagesDelete',$p->id)}}">
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

