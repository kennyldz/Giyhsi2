@extends('admin.layouts.master')
@section('TitlePage','Admin Üye Bilgiler ')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Üye bilgiler -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1 text-black-50">Üye Detay</h3>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        <div class="card-body text-center">
                            @if($User->profile_photo_path==NULL) <i class="fa fa-user fa-2x"></i>  @endif
                            @if($User->profile_photo_path!=NULL)  <img
                                src="{{asset('front')}}/images/icons/{{$User->profile_photo_path}}"
                                alt="user" class="rounded" width="80"
                                height="60" />
                            @endif
                        </div>
                    </div>
                    <div class="card text-center ">
                        <strong class="small text-black-50 text-uppercase"><i class="fa fa-circle @if($User->status=='aktif') text-success @elseif($User->status=='pasif') text-danger @endif "></i> {{$User->status}}</strong>
                    </div>
                    <div class="card text-center ">
                        <p class="small">Lokum</p>
                        <strong style="font-size:3.8rem">{{$Delights->amount}}</strong>
                    </div>
                    <div class="card text-center ">
                            <p class="small">Ürün Sayısı</p>
                            <strong style="font-size:3.8rem">{{count($ProductCount)}}</strong>
                    </div>
                    <div class="card text-center ">
                        <p class="small">Sipariş Sayısı</p>
                        <strong style="font-size:3.8rem">{{count($OrderCount)}}</strong>
                    </div>
                </div>
                <!--Üye bilgiler -->
                <div class="col-lg-9 col-md-12">
                    <form method="post" action="{{route('uyeislemler.update',$User->id)}}">
                        @method('put')
                        @csrf
                        <div class="card-group">
                            <div class="card small text-center text-black-50">

                                <div class="card-body p-1">
                                    <select name="UyeDurum" class="form-control form-control-sm small text-black-50 border-0" >
                                        <option value="{{$User->status}}">Durum Değiştir</option>
                                        @if($User->status=="aktif")
                                        <option value="pasif">Pasif Et</option>
                                        @elseif($User->status=="pasif")
                                        <option value="aktif">Aktif Et</option>
                                        @endif
                                    </select>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-body p-1">
                                    <select name="LokumTanimla" class="form-control form-control-sm small text-black-50 border-0">
                                        <option value="">Lokum Tanımla</option>
                                        @for($i=1;$i<=15;$i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="card">
                                <input type="text" name="email" value="{{$User->email}}" hidden>
                                <input type="text" name="name" value="{{$User->name}}" hidden>
                                <input  name="lokum" value="{{$Delights->amount}}" hidden>
                                <input name="lokumkontrol" value="{{$Delights->check}}" hidden>
                                <input name="durum" value="{{$User->status}}" hidden>
                                <button type="submit" class="btn btn-default btn-sm form-control" value="bilgi" name="Kaydet"><strong>Kaydet</strong></button>
                            </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm small">
                                <tr><td>Üye No</td><td>{{$User->id}}</td></tr>
                                <tr><td>Adı</td><td>{{$User->name}}</td></tr>
                                <tr><td>E-Mail</td><td>{{$User->email}}</td></tr>
                                <tr><td>Şifre</td><td>*****</td></tr>
                                <form method="post" action="{{route('uyeislemler.update',$User->id)}}">
                                    @method('put')
                                    @csrf
                                    <tr><td>Şifre Değiştir</td>
                                        <td>
                                       <input type="text" name="Sifre" class="form-control form-control-sm" required>
                                       <input type="text" name="email" value="{{$User->email}}" hidden>
                                       <input type="text" name="name" value="{{$User->name}}" hidden>
                                       <button type="submit" name="Kaydet" value="sifre" class="btn btn-default btn-sm form-control">Güncelle</button></td>
                                    </tr>
                                </form>
                                <tr><td>Üyelik Tarihi</td><td>{{$User->created_at}}</td></tr>
                                <tr><td>Güncellenme Tarihi</td><td>{{$User->updated_at}}</td></tr>
                            </table>
                        </div>
                    </div>

                    <!--Ürünler -->
                    <div class="card">
                        <div class="card-body">
                            <div class=" table table-responsive-lg">
                                <p class="small text-uppercase"><strong>Ürünler</strong></p>
                                <table id="urunler" class="table  table-bordered  small">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>Ürün</th>
                                        <th>Oluş. Tarih</th>
                                        <th>Gün. Tarih</th>
                                        <th>Durum</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ProductCount as $Product)
                                        <tr>
                                            <td>{{$Product->id}}</td>
                                            <td><img src="/{{$Product->image}}" class="rounded" width="35" height="35"></td>
                                            <td>{{$Product->title}}</td>

                                            <td>{{$Product->created_at}}</td>
                                            <td>{{$Product->updated_at}}</td>
                                            <td >{{$Product->status}}</td>
                                            <td><a href="{{route('urunislemler.edit',$Product->id)}}" class="btn btn-default btn-sm"><i class="fa fa-edit text-warning"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                                <p class="small">Toplam: {{count($ProductCount)}}</p>
                            </div>
                        </div>
                    </div>

                    <!--siparişler -->
                    <div class="card">
                        <div class="card-body">
                            <div class=" table table-responsive-lg">
                                <p class="small text-uppercase"><strong>Siparİşler</strong></p>
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
                                    @foreach($OrderCount as $Order)
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
                                <p class="small">Toplam: {{count($OrderCount)}}</p>
                            </div>
                        </div>
                    </div>

                    <!--Lokumlar -->
                    <div class="card">
                        <div class="card-body">
                            <div class=" table table-responsive-lg">
                                <p class="small text-uppercase"><strong>Lokumlar</strong></p>
                                <table id="lokumlar" class="table table-striped table-bordered  small">
                                    <thead>
                                    <tr>
                                        <th>İşlem no</th>
                                        <th>Lokum</th>
                                        <th>Açıklama</th>
                                        <th>Promosyon</th>
                                        <th>İşlem Tarihi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($Delightslist as $delights)
                                        <tr>
                                            <td>{{$delights->id}}</td>
                                            <td>{{$delights->amount}}</td>
                                            <td>{{$delights->detail}}</td>
                                            <td>@if($delights->check==0)Kullanılmadı@elseif($delights->check==1)Kullanıldı@endif</td>
                                            <td>{{$delights->created_at}}</td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                                <p class="small">Toplam: {{count($Delightslist)}}</p>
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

        $(document).ready(function() {
            $('#siparisler').DataTable();
        } );

        $(document).ready(function() {
            $('#lokumlar').DataTable();
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

        #siparisler_length label{font-size: 0}
        #siparisler_length label:before{content: "Göster ";font-size: 14px}

        #siparisler_filter label{font-size: 0}
        #siparisler_filter label:before{content: "Ara ";font-size: 14px}

        #siparisler_previous{font-size:0}
        #siparisler_previous a:before{content: "Önceki"; font-size:17px}

        #siparisler_next{font-size:0}
        #siparisler_next a:before{content: "Sonraki"; font-size:16px}

        #siparisler_info {font-size:0}

        #lokumlar_length label{font-size: 0}
        #lokumlar_length label:before{content: "Göster ";font-size: 14px}

        #lokumlar_filter label{font-size: 0}
        #lokumlar_filter label:before{content: "Ara ";font-size: 14px}

        #lokumlar_previous{font-size:0}
        #lokumlar_previous a:before{content: "Önceki"; font-size:17px}

        #lokumlar_next{font-size:0}
        #lokumlar_next a:before{content: "Sonraki"; font-size:16px}

        #lokumlar_info {font-size:0}

        .dataTables_empty{font-size:0}
        .dataTables_empty:before{content:"Kayıt Bulunmamaktadır";font-size:14px}

    </style>

    <script src="{{asset('admin/')}}/src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('admin/')}}/src/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
