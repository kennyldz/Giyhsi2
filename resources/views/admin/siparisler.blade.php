@extends('admin.layouts.master')
@section('TitlePage','Admin Siparişler ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$CompleteOrder}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Teslim Edildi</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="check"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right ">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                        class="set-doller"></sup>{{$CancelOrder}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">İptal Edildi
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$ShippingOrder}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kargoda</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="archive"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 font-weight-medium">{{$WaitOrder}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Beklemede</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="pause"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Siparişler</h4>
                            <div class=" table table-responsive-lg">
                                <table id="siparisler" class="table table-striped table-bordered  small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Ürün Adı</th>
                                        <th>Sipariş Tarihi</th>
                                        <th>Güncellenme Tarihi</th>
                                        <th>Durum</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Orders as $Order)
                                        <tr>
                                            <td>1{{$Order->id}}</td>
                                            <td><img src="/{{$Order->image}}" class="rounded" width="35" height="35"></td>
                                            <td>{{$Order->title}}</td>
                                            <td>{{$Order->created_at}}</td>
                                            <td>{{$Order->updated_at}}</td>
                                            <td >{{$Order->status}}</td>
                                            <td><a href="{{route('siparisislemler.edit',$Order->id)}}" class="btn btn-default btn-sm"><i class="fa fa-eye text-dark"></i></a></td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                                <p class="small">Toplam: {{count($Orders)}}</p>
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
            $('#siparisler').DataTable();
        } );

    </script>
    <style>
        #siparisler_length label{font-size: 0}
        #siparisler_length label:before{content: "Göster ";font-size: 14px}

        #siparisler_filter label{font-size: 0}
        #siparisler_filter label:before{content: "Ara ";font-size: 14px}

       #siparisler_previous{font-size:0}
        #siparisler_previous a:before{content: "Önceki"; font-size:17px}

        #siparisler_next{font-size:0}
        #siparisler_next a:before{content: "Sonraki"; font-size:16px}

       #siparisler_info {font-size:0}

    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
