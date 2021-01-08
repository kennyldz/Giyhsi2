@extends('admin.layouts.master')
@section('TitlePage','Admin Sipariş Bilgiler ')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Sipariş bilgiler -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1 text-black-50">Sipariş Detay</h3>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12">

                    <!--ürün Resim -->
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset('/')}}{{$Orders->image}}"  class="rounded" width="170"
                                 height="130" >
                        </div>
                    </div>
                    <!--Sipariş no -->

                    <div class="card text-center">
                        <strong class="small">Sipariş No</strong>
                        <div class="card-body bg-banner text-center p-1">
                            <strong style="font-size:3.8rem">1{{$Orders->id}}</strong>
                        </div>
                    </div>

                    <!--sipariş Durumu -->
                    <div class="card">
                        <div class="card-body text-center">
                            @switch($Orders->status)
                                @case('Beklemede')
                                <i class="fa fa-pause fa-2x"></i><br>
                            Beklemede
                                @break
                                @case('Ürün Hazırlanıyor')
                                <i class="fa fa-cogs fa-2x"></i><br>
                            Ürün Hazırlanıyor
                                @break
                                @case('Kargoda')
                                <i class="fa fa-truck fa-2x"></i><br>
                            Kargoda
                                @break
                                @case('Teslim Edildi')
                                <i class="fa fa-check fa-2x"></i><br>
                            Teslim Edildi
                                @break
                                @case('İptal Edildi')
                                <i class="fa fa-trash fa-2x"></i><br>
                            İptal Edildi
                                @break
                            @endswitch
                        </div>
                    </div>
                </div>
                <!--sipariş bilgiler detay -->
                <div class="col-lg-9 col-md-12">
                    <div class="card ">
                        <div class="card-body  p-2">
                            <p><i class="fa fa-bell text-warning"></i> <strong>{{$Orders->title}}</strong></p>
                        </div>
                    </div>
                  <!--
                    <form method="post" action="">
                      @method('put')
                      @csrf
                    <div class="card-group">
                        <div class="card small text-center text-black-50">

                            <div class="card-body p-1">
                                <select name="SiparisDurum" class="form-control form-control-sm small text-black-50 border-0" required>
                                    <option value="">Durum Değiştir</option>
                                    <option value="Ürün Hazırlanıyor">Ürün Hazırlanıyor</option>
                                    <option value="Kargoda">Kargoda</option>
                                    <option value="Teslim Edildi">Teslim Edildi</option>
                                    <option value="İptal Edildi">İptal Edildi</option>
                                </select>
                            </div>

                        </div>
                        <div class="card">
                            <input type="text" name="productID" value="{{$Orders->productID}}" hidden>
                            <input type="text" name="price" value="{{$Orders->price}}" hidden>
                            <input type="text" name="senderID" value="{{$Orders->senderUserID}}" hidden>
                            <input type="text" name="requestID" value="{{$Orders->receiverUserID}}" hidden>
                            <input name="status" value="{{$Orders->status}}"  hidden>
                            <button type="submit" class="btn btn-default btn-sm form-control"><strong>Güncelle</strong></button>
                        </div>
                    </div>
                  </form>
                    -->
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-sm small">
                                <tr><td>Sipariş Tutarı</td><td>{{$Orders->price}} <i class="fa fa-cube text-danger"></i></td></tr>
                                <tr><td>Sipariş Tarihi</td><td>{{$Orders->created_at}}</td></tr>
                                <tr><td>Güncellenme Tarihi</td><td>{{$Orders->updated_at}}</td></tr>
                                <tr><td>Alıcı</td><td>{{$Orders->name}}</td></tr>
                                <tr><td>Telefon</td><td>{{$Orders->telephone}}</td></tr>
                                <tr><td>Adres</td><td style="word-break: break-word">{{$Orders->address}}</td></tr>
                                <tr><td>İl | İlçe</td><td>{{$Orders->province}}  | {{$Orders->district}} </td></tr>
                                <tr><td>Nereden Kargolanıyor </td><td>{{$Orders->cargo}}</td></tr>
                                <tr><td>Kargo Ücreti</td><td>{{$Orders->cargopayment}}</td></tr>
                                <tr><td>Kargo Şirketi</td><td>{{$Orders->cargocompany}}</td></tr>
                                <tr><td>Kargo Takip No</td><td>{{$Orders->cargoNumber}}</td></tr>
                                <tr><td>Ürün Sahibi</td><td>{{$SenderUser->name}} | {{$SenderUser->email}}</td></tr>
                                <tr><td>Sipariş Veren</td><td>{{$ReceiveUser->name}} | {{$ReceiveUser->email}}</td></tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
