@extends('admin.layouts.master')
@section('TitlePage','Admin Ana Sayfa')
@section('content')
<!-- Admin Dashboard -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Merhaba  {{Auth::user()->name}}!</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="#">Genel Görünüm</a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- *************************************************************** -->
        <!-- Start First Cards -->
        <!-- *************************************************************** -->
        <div class="card-group">
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">{{$Orders}}</h2>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Siparişler</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="database"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-right">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                    class="set-doller"></sup>{{$Products}}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Ürünler
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
                                <h2 class="text-dark mb-1 font-weight-medium">{{count($UserList)}}</h2>
                                <span
                                    class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">Toplam</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Üye</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex d-lg-flex d-md-block align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">{{$Category}}</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kategori</h6>
                        </div>
                        <div class="ml-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="tag"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End First Cards -->
        <!-- *************************************************************** -->
        <!-- *************************************************************** -->
        <!-- Start Sales Charts Section -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-black-50">Siparişler</h4>

                        <div id="piechart" class="mt-2" style="height:283px; width:100%;"></div>
                        <ul class="list-style-none mb-0 small">
                            <li>
                                <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                <span class="text-muted">Beklemede</span>
                                <span class=" float-right font-weight-medium" >{{$WaitOrder}}</span>

                            </li>
                            <li class="mt-2">
                                <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                <span class="text-muted">İptal Edilen</span>
                                <span class=" float-right font-weight-medium">{{$CancelOrder}}</span>

                            </li>
                            <li class="mt-2">
                                <i class="fas fa-circle text-warning font-10 mr-2"></i>
                                <span class="text-muted">Kargoda</span>
                                <span class=" float-right font-weight-medium">{{$ShippingOrder}}</span>

                            </li>
                            <li class="mt-3">
                                <i class="fas fa-circle text-success font-10 mr-2"></i>
                                <span class="text-muted">Teslim Edildi</span>
                                <span class=" float-right font-weight-medium">{{$CompleteOrder}}</span>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12" >
                <div class="card" >
                    <div class="card-body">
                        <h4 class="card-title mb-4 text-black-50">Ürünler</h4>
                        @foreach($CategoryProduct as $Productcategory)


                            <div class="row mb-3 align-items-center mt-1 ">
                                <div class="col-4 text-right">
                                    <span class="text-muted font-14">{{$Productcategory->name}}</span>
                                </div>
                                <div class="col-5">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 1.{{$Productcategory->product_count}}%"
                                             aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="col-3 text-right">
                                    <span class="mb-0 font-14 font-weight-medium">{{$Productcategory->product_count}}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">

                @foreach($WaitCheck as $Check)
                    <div class="card">
                    <div class="card-body">

                                <div class="d-flex align-items-start border-left-line pb-1">
                                    <div>
                                        <a href="{{route('urunislemler.edit',$Check->id)}}" title="Tıkla" class="btn btn-cyan btn-circle mb-2 btn-item">
                                            <i data-feather="bell"></i>
                                        </a>
                                    </div>
                                    <div class="ml-3 ">
                                        <h5 class="font-12 text-dark font-weight-medium mb-2">Ürün Onay için Bekliyor!
                                        </h5>
                                        <p class="font-14 mb-2 text-muted">{{$Check->title}}</p>
                                        <span class="font-weight-light font-14 d-block text-muted">{{$Check->created_at->diffForHumans()}}</span>
                                        <a href="{{route('urunislemler.edit',$Check->id)}}" class="font-10 border-bottom pb-1 border-info ">Kontrol Et ve Onayla</a>
                                    </div>
                                </div>

                    </div>
                </div>
                @endforeach
                @if(count($WaitCheck)==NULL)
                        <div class="card">
                            <div class="card-body">
                    <div class="d-flex align-items-start border-left-line pb-3">
                        <div>
                            <a href="javascript:void(0)" class="btn btn-cyan btn-circle mb-2 btn-item">
                                <i data-feather="bell"></i>
                            </a>
                        </div>
                        <div class="ml-3 mt-2">
                            <h5 class="font-12 text-dark font-weight-medium mb-2">Onay için bekleyen ürün yok!
                            </h5>
                        </div>
                    </div>
                            </div>
                        </div>
                @endif

            </div>
        </div>

        <!-- Start Top Leader Table -->
        <!-- *************************************************************** -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <h4 class="card-title text-black-50">Üyeler</h4>

                            <div class="ml-auto">
                               <!--
                                <div class="dropdown sub-dropdown">
                                    <button class="btn btn-link text-muted dropdown-toggle" type="button"
                                            id="dd1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        <i data-feather="more-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                        <a class="dropdown-item" href="#">Insert</a>
                                        <a class="dropdown-item" href="#">Update</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>

                            <div class=" table table-responsive-lg">
                                <table id="uyeler" class="table table-striped table-bordered  small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Adı</th>
                                        <th>E-mail</th>
                                        <th>Üyelik Tarihi</th>
                                        <th>Durum</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($UserList as $User)
                                        <tr>
                                            <td>{{$User->id}}</td>
                                            <td>@if($User->profile_photo_path==NULL) <i class="fa fa-user fa-2x"></i>  @endif
                                                @if($User->profile_photo_path!=NULL)  <img
                                                       src="{{asset('front')}}/images/icons/{{$User->profile_photo_path}}"
                                                    alt="user" class="rounded" width="35"
                                                    height="35" />
                                                @endif
                                            </td>
                                            <td>{{$User->name}}</td>
                                            <td>{{$User->email}}</td>
                                            <td>{{$User->created_at}}</td>
                                            <td >{{$User->status}}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <p class="small">Toplam: {{count($UserList)}}</p>
                            </div>




                    </div>
                </div>

            </div>
        </div>
        <!-- *************************************************************** -->
        <!-- End Top Leader Table -->
        <!-- *************************************************************** -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>

@endsection
@section('Dashboard')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script >
        $(document).ready(function() {
            $('#uyeler').DataTable();
        } );

    </script>

    <style>
        #uyeler_length label{font-size: 0}
        #uyeler_length label:before{content: "Göster ";font-size: 14px}

        #uyeler_filter label{font-size: 0}
        #uyeler_filter label:before{content: "Ara ";font-size: 14px}

        #uyeler_previous{font-size:0}
        #uyeler_previous a:before{content: "Önceki"; font-size:17px}

        #uyeler_next{font-size:0}
        #uyeler_next a:before{content: "Sonraki"; font-size:16px}

        #uyeler_info {font-size:0}

    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {'packages':['corechart']}
        );
        google.charts.setOnLoadCallback(drawChart);



        // Draw the chart and set the chart values
        function drawChart() {
            var CompleteOrder = {{$CompleteOrder}};
            var CancelOrder = {{$CancelOrder}};
            var ShippingOrder= {{$ShippingOrder}};
            var Waitorder={{$WaitOrder}};
            var data = google.visualization.arrayToDataTable([
                ['Task', ''],
                ['Beklemede', Waitorder],
                ['İptal ', CancelOrder],
                ['Kargoda',ShippingOrder],
                ['Teslim Edilen',CompleteOrder]
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {'title':''};

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data);
        }


    </script>

@endsection
