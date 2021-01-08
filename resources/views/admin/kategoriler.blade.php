@extends('admin.layouts.master')
@section('TitlePage','Admin Kategori İşlemleri ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <div class="d-inline-flex align-items-center">
                                    <h2 class="text-dark mb-1 font-weight-medium">{{count($Kategoriler)}}</h2>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Toplam</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="file-text"></i></span>
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
                                    <h2 class="text-dark mb-1 font-weight-medium">{{$Deactive}}</h2>
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
                <div class="col-lg-12 col-md-12   ">
                    <form method="post" action="{{route('kategoriislemler.store')}}">
                    @csrf
                    <div class="card-group ">
                        <div class="card">
                            <input type="text" name="KategoriAdi" placeholder="Kategori Adı" class="form-control form-control-sm border-0 ">
                        </div>
                    <div class="card">
                        <button type="submit" class="btn btn-default btn-sm"><strong>Ekle</strong></button>
                    </div>
                    </div>
                    </form>

                </div>

            </div>

            <!-- Kategoriler Liste -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Kategoriler</h4>
                            <div class="table table-responsive-lg">
                                <table id="kategoriler" class="table table-striped table-bordered no-wrap small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Kategori Adı</th>
                                        <th>Durum</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Güncellenme Tarihi</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Kategoriler as $kategori)
                                        <tr>
                                            <td>{{$kategori->id}}</td>
                                            <td>{{$kategori->name}}</td>
                                            <td>{{$kategori->status}}</td>
                                            <td>{{$kategori->created_at}}</td>
                                            <td>{{$kategori->updated_at}}</td>
                                            <td><a href="{{route('kategoriislemler.edit',$kategori->id)}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <p class="small">Toplam: {{count($Kategoriler)}}</p>
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
            $('#kategoriler').DataTable();
        } );

    </script>

    <style>
        #kategoriler_length label{font-size: 0}
        #kategoriler_length label:before{content: "Göster ";font-size: 14px}

        #kategoriler_filter label{font-size: 0}
        #kategoriler_filter label:before{content: "Ara ";font-size: 14px}

        #kategoriler_previous{font-size:0}
        #kategoriler_previous a:before{content: "Önceki"; font-size:17px}

        #kategoriler_next{font-size:0}
        #kategoriler_next a:before{content: "Sonraki"; font-size:16px}

        #kategoriler_info {font-size:0}
        .dataTables_empty{font-size:0}
        .dataTables_empty:before{content:"Kayıt Bulunmamaktadır";font-size:14px}
    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
