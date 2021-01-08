@extends('admin.layouts.master')
@section('TitlePage','Admin Ürünler ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$WaitProduct}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Onaylanmamış</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="bell"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right ">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                        class="set-doller"></sup>{{$ActiveProduct}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Satışta
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="shopping-bag"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$CompleteProduct}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Satıldı</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="check"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{$CancelProduct}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Askıdan alındı</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<div class="row mt-2 mb-2">
    <div class="col-lg-12">

            <div class="card ">
                <div class="card-body">
                    <a href="{{route('urunislemler.create')}}" class="btn btn-sm btn-default small bg-banner"><i class="fa fa-cart-plus"></i> <strong>Ürün Ekle</strong></a>
                </div>
            </div>


    </div>
</div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ürünler</h4>
                            <div class=" table table-responsive-lg">
                                <table id="urunler" class="table table-striped table-bordered small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Ürün</th>
                                        <th>Kategori</th>
                                        <th>Oluş. Tarih</th>
                                        <th>Gün. Tarih</th>
                                        <th>Durum</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Products as $Product)
                                    <tr>
                                        <td>{{$Product->id}}</td>
                                        <td><img src="/{{$Product->image}}" class="rounded" width="35" height="35"></td>
                                        <td>{{$Product->title}}</td>
                                        <td>{{$Product->name}}</td>
                                        <td>{{$Product->created_at}}</td>
                                        <td>{{$Product->updated_at}}</td>
                                        <td >{{$Product->status}}</td>
                                        <td><a href="{{route('urunislemler.edit',$Product->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit text-warning"></i></a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <p class="small">Toplam: {{count($Products)}}</p>
                            </div>
                        </div>
                    </div>




                </div>
            </div>

        </div>
    </div>
@endsection
@section('Dashboard')
    <script >
        $(document).ready(function() {
            $('#urunler').DataTable();
        } );



    </script>
    <style>
        #urunler_length label{font-size: 0}
        #urunler_length label:before{content: "Göster ";font-size: 14px}

        #urunler_filter label{font-size: 0}
        #urunler_filter label:before{content: "Ara ";font-size: 14px}

        #urunler_previous{font-size:0}
        #urunler_previous a:before{content: "Önceki"; font-size:17px}

        #urunler_next{font-size:0}
        #urunler_next a:before{content: "Sonraki"; font-size:16px}

        #urunler_info {font-size:0}

    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
