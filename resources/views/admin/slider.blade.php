@extends('admin.layouts.master')
@section('TitlePage','Admin Slider İşlemleri ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <h4 class="card-title">Slider Ekle</h4>
            <form method="post" action="{{route('sliderislemler.store')}}" enctype="multipart/form-data">
                @csrf
               <div class="row">

                <div class="col-lg-3 col-md-12">
                    <div class="card small text-center ">
                        <div class="card-body ">
                            <input type="file" name="SliderGorsel" class="form-control-file  form-control-sm small font-12"  required>
                        </div>
                 </div>
                    <div class="card text-center p-2">
                            <p class="small"><i class="fa fa-info-circle text-warning"></i> Slider görsel zorunludur.</p>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="card-group">
                        <div class="card">
                            <div class="card-body">
                                <input type="text" name="BuyukSlogan" class="form-control form-control-sm  border-0" placeholder="Ana Slogan">
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <input type="text" name="kucukSlogan" class="form-control form-control-sm border-0" placeholder="Alt Slogan">
                            </div>
                      </div>
                        <div class="card">
                            <div class="card-body">
                                <input type="text" name="Link" class="form-control form-control-sm border-0" placeholder="Buton Link">
                            </div>
                     </div>
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-default btn-sm form-control">Kaydet</button>
                            </div>
                        </div>
                    </div>
                    <div class="card text-center">
                        <p class="small ml-2 mt-2"><i class="fa fa-info-circle text-warning"></i>
                            Ana Slogan, Alt Slogan ve Buton Link alanları zorunlu değildir.</p>
                    </div>
                </div>

            </div>
            </form>

            <!--Slider liste -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Slider</h4>
                            <div class="table table-responsive-lg">
                                <table id="sliders" class="table table-striped table-bordered  small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Ana Slogan</th>
                                        <th>Alt Slogan</th>
                                        <th>Buton Link</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Durum</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Sliders as $slider)
                                        <tr>
                                            <td>{{$slider->id}}</td>
                                            <td><img src="/{{$slider->image}}" alt="user" class="rounded" width="35" height="35" ></td>
                                            <td>{{$slider->bigslogan}}</td>
                                            <td>{{$slider->smallslogan}}</td>
                                            <td>{{$slider->sliderlink}}</td>
                                            <td>{{$slider->created_at}}</td>
                                            <td>{{$slider->durum}}</td>
                                            <td><a href="{{route('sliderislemler.edit',$slider->id)}}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <p class="small">Toplam: {{count($Sliders)}}</p>
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
            $('#sliders').DataTable();
        } );

    </script>

    <style>
        #sliders_length label{font-size: 0}
        #sliders_length label:before{content: "Göster ";font-size: 14px}

        #sliders_filter label{font-size: 0}
        #sliders_filter label:before{content: "Ara ";font-size: 14px}

        #sliders_previous{font-size:0}
        #sliders_previous a:before{content: "Önceki"; font-size:17px}

        #sliders_next{font-size:0}
        #sliders_next a:before{content: "Sonraki"; font-size:16px}

        #sliders_info {font-size:0}
        .dataTables_empty{font-size:0}
        .dataTables_empty:before{content:"Kayıt Bulunmamaktadır";font-size:14px}
    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
