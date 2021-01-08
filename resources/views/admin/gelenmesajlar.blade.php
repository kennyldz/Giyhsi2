@extends('admin.layouts.master')
@section('TitlePage','Admin Gelen Mesajlar ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <h4 class="card-title">Gelen Mesajlar</h4>
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{count($Messages)}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Toplam</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="inbox"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right ">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                        class="set-doller"></sup>{{$Reply}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Cevaplandı
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="bell"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$Noreply}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Cevaplanmadı</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="minus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Gelen mesajlar -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Gelen Mesajlar</h4>
                            <div class=" table table-responsive-lg">
                                <table id="mesajlar" class="table table-striped table-bordered small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Adı</th>
                                        <th>Konu</th>
                                        <th>Oluşturma Tarihi</th>
                                        <th>Durum</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Messages as $message)
                                        <tr>
                                            <td>{{$message->id}}</td>
                                            <td>{{$message->name}}</td>
                                            <td>{{$message->topic}}</td>
                                            <td>{{$message->created_at}}</td>
                                            <td >{{$message->status}}</td>
                                            <td><a href="{{route('gelenmesajlar.edit',$message->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit text-secondary"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <p class="small">Toplam: {{count($Messages)}}</p>
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
            $('#mesajlar').DataTable();
        } );

    </script>

    <style>
        #mesajlar_length label{font-size: 0}
        #mesajlar_length label:before{content: "Göster ";font-size: 14px}

        #mesajlar_filter label{font-size: 0}
        #mesajlar_filter label:before{content: "Ara ";font-size: 14px}

        #mesajlar_previous{font-size:0}
        #mesajlar_previous a:before{content: "Önceki"; font-size:17px}

        #mesajlar_next{font-size:0}
        #mesajlar_next a:before{content: "Sonraki"; font-size:16px}

        #mesajlar_info {font-size:0}
        .dataTables_empty{font-size:0}
        .dataTables_empty:before{content:"Kayıt Bulunmamaktadır";font-size:14px}
    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
