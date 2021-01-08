@extends('admin.layouts.master')
@section('TitlePage','Admin Üye İşlemleri ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{count($Users)}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Toplam</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="user"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right ">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                        class="set-doller"></sup>{{$Active}}</h2>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Aktif
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$DeActive}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pasif</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="minus"></i></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Üyeler</h4>
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
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Users as $User)
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
                                         <td><a href="{{route('uyeislemler.edit',$User->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit text-secondary"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <p class="small">Toplam: {{count($Users)}}</p>
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
        .dataTables_empty{font-size:0}
        .dataTables_empty:before{content:"Kayıt Bulunmamaktadır";font-size:14px}
    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
