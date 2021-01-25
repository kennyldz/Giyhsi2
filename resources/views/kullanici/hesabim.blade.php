@extends('front.layouts.master')
@section('title','Hesabım')
@section('content')
    <section class="flex-col-c-m text-white bg-light p-4 " style="font-size:.75rem!important;background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)" >
         <strong>Merhaba {{Auth::User()->name}}</strong>
<div  data-ride="carousel" style="background-color: #e65540;border-radius: 5px"  >
    <div class="carousel-item active">
        <table class="text-white " style="font-size:.75rem!important;"  >
            <tr>
                <td style="padding: 20px 20px 20px 20px"><span class="fa fa-shopping-cart fa-3x"></span>&nbsp;</td><td><strong>Avantajlı</strong>&nbsp;</td>
            </tr>
        </table>
    </div>
    <div class="carousel-item">
        <table class="text-white " style="font-size:.75rem!important;"  >
            <tr>
                <td style="padding: 20px 20px 20px 20px "><span class="fa fa-credit-card-alt fa-3x"></span>&nbsp;</td><td><strong>Parasız</strong>&nbsp;</td>
            </tr>
        </table>
    </div>
    <div class="carousel-item">
        <table class="text-white " style="font-size:.75rem!important;"  >
            <tr>
                <td style="padding: 20px 20px 20px 20px "><span class="fa fa-get-pocket fa-3x"></span>&nbsp;</td><td><strong>Güvenli</strong>&nbsp;</td>
            </tr>
        </table>
    </div>

</div>
        Alışveriş deneyimine hoşgeldin.
    </section>

    <section class="bg-light p-t-55 p-b-65">
        <div class="container">
            <div class="row ">
                <!--Kullanıcı Menu -->
                <div class="col-sm-3 col-md-4 col-lg-3 p-2 mt-2 mb-2  bg-white shadow1 rounded" style="height: 150px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Hesabım</a>
                        <a class="nav-link" id="v-pills-profile-tab"  href="{{route('kullanici.Orders')}}"  aria-selected="false">Siparişlerim</a>
                        <a class="nav-link"  href="{{route('kullanici.ProductAdd')}}"  aria-selected="false">Ürün Yükle</a>
                    </div>
                </div>

                <!-- Kullanıcı Ana Sayfa-->
                <div class="col-sm-9 col-md-8 col-lg-9 p-b-50">
                    <!--Eğer gönderim gerçekleşmiş ise -->
                    @if(session('success'))
                        <div class="alert-success p-2">
                            <i class="fa fa-check-circle"> </i><strong> {{session('success')}}</strong>
                        </div>
                    @endif
                    <!--eğer hata var ise-->
                    @if(session('error'))
                        <div class="alert-danger p-2">
                           <i class="fa fa-warning"> </i><strong> {{session('error')}}</strong>
                        </div>
                    @endif
                <!-- Girilen alanların kontrolü eğer validate eerror var ise -->
                    @if($errors->any())
                        <div class="alert-danger p-2">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="tab-content" id="v-pills-tabContent" style="margin-top:2%">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                            <div class="row">
                                <!--Hesabım Ana sayfa kazanılan lokum -->
                                <div class="col-lg-3 ">

                                        <!--Eğer Hediye lokumunu kullanmamış ise -->
                                        @if($User->check==0)
                                        <div class="card mb-5 mb-lg-0  " style="border-top-color: #B35047;border-top-width: 3px;background-color: #009ad7;">
                                            <div class="card-body text-center " >
                                                <h6 ><strong class="card-title text-uppercase text-center text-white">Hediye Lokum</strong></h6>
                                                <img src="{{asset('/front')}}/images/icons/hediye_1.png" >
                                                <p class="card-price text-center text-white" style="font-size:13px"><span class="period"> İlk kullanıma özel</span></p>
                                                <hr>
                                                <a href="{{route('kullanici.Create.Delight')}}" class="btn btn-outline-dark btn-sm text-white">Hemen Kullan</a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="card mb-5 mb-lg-0  " style="border-top-color: #B35047;border-top-width: 5px;">
                                            <div class="card-body text-center">
                                                <h6 class="card-title text-muted text-uppercase text-center">Kazandıklarım</h6>
                                                <img src="{{asset('/front')}}/images/icons/hediye_1.png" style="position:relative;">
                                                <span class="badge badge-dark" style="position: absolute">{{$WinDelight}}</span>
                                                <i class="fa fa-cube text-danger" ></i>
                                                <p class="card-price text-center" style="font-size:14px"><span class="period">Kazandığım lokumlar</span></p>
                                                <hr>
                                                <a href="" class="text-center text-white"> lokum</a>
                                            </div>
                                        </div>
                                        @endif

                                </div>

                                <!--Hesabım ana sayfa Lokum özet-->
                                <div class="col-lg-3 ">
                                    <div class="card mb-5 mb-lg-0 bg-white " style="border-top-color: #04739f;border-top-width: 5px">
                                        <div class="card-body text-center">
                                            <h6 class="card-title text-muted text-uppercase text-center">Lokum</h6>
                                            <img src="{{asset('/front')}}/images/icons/lokum.png" style="position:relative;">
                                            <span class="badge badge-dark" style="position: absolute">{{$User->amount}} </span>
                                            <i class="fa fa-cube text-danger" ></i>
                                            <p class="card-price text-center"><span class="period">Güncel</span></p>
                                            <hr>
                                            <a href="{{route('kullanici.Delights.List')}}" class="text-center "> İşlem Geçmişi</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hesabım ana sayfa sipaiş özet -->
                                <div class="col-lg-3">
                                    <div class="card mb-5 mb-lg-0 bg-white" style="border-top-color: #ffac09;border-top-width: 5px">
                                        <div class="card-body text-center">
                                            <h6 class="card-title text-muted text-uppercase text-center">Siparişlerim</h6>
                                            <img src="{{asset('/front')}}/images/icons/siparisler.png" style="position:relative;" >
                                            <span class="badge badge-dark" style="position: absolute">{{count($WaitOrder)}}</span>
                                            <p class="card-price text-center"><span class="period">Bekleme-Kargo</span></p>
                                            <hr>
                                            <a href="{{route('kullanici.Orders')}}" class="text-center "> Tümünü Gör</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Hesabım ana sayfa ürünlerim özet -->
                                <div class="col-lg-3">
                                    <div class="card mb-5 mb-lg-0 bg-white" style="border-top-color: #242121;border-top-width: 5px">
                                        <div class="card-body text-center" >
                                            <h6 class="card-title text-muted text-uppercase text-center">ürünlerim</h6>
                                                <img src="{{asset('/front')}}/images/icons/urunlerim.png" style="position:relative;" >
                                                <span class="badge badge-dark" style="position: absolute">{{$UserProductCount}}</span>
                                            <p class="card-price text-center"><span class="period">Eklediklerim</span></p>
                                            <hr>
                                            <a href="{{route('kullanici.Products')}}" class="text-center "> Tümünü Gör</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row" style="margin-top:2%">
                                <!--Hesabım Ana sayfa profil güncelle -->
                                <div class="col-lg-3" >
                                    <div class="card mb-5 mb-lg-0 bg-white" style="border-top-color: #066b02;border-top-width: 5px">
                                        <div class="card-body text-center">
                                            <h6 class="card-title text-muted text-uppercase text-center">Profilim</h6>
                                            <img src="{{asset('/front')}}/images/icons/profilim.png"  >
                                            <p class="card-price text-center"><span class="period">Üyelik Bilgisi</span></p>
                                            <hr>
                                            <a href="{{route('kullanici.Profile')}}" class="text-center "> Güncelle</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Hesabım ana sayfa Gelen Mesajlar -->
                                <div class="col-lg-3" >
                                    <div class="card mb-5 mb-lg-0 bg-white" style="border-top-color: #00bacb;border-top-width: 5px">
                                        <div class="card-body text-center">
                                            <h6 class="card-title text-muted text-uppercase text-center">İstekler</h6>
                                            <img src="{{asset('/front')}}/images/icons/mesajlar.png" style="position:relative;" >
                                            <span class="badge badge-danger" style="position: absolute">{{$RequestProductCount}}</span>
                                            <p class="card-price text-center"><span class="period">Ürüne Gelen Talep</span></p>
                                            <hr>
                                            <a href="{{route('kullanici.Request.Product')}}" class="text-center "> Tümünü Gör</a>
                                        </div>
                                    </div>
                                </div>
                                <!--Adreslerim-->
                                <div class="col-lg-3">
                                    <div class="card mb-5 mb-lg-0 bg-white" style="border-top-color: #87c890;border-top-width: 5px">
                                        <div class="card-body text-center">
                                            <h6 class="card-title text-muted text-uppercase text-center">Adreslerim</h6>
                                            <img src="{{asset('/front')}}/images/icons/adreslerim.png" style="position:relative;" >
                                            <span class="badge badge-danger" style="position: absolute"></span>
                                            <p class="card-price text-center"><span class="period">Teslim Adreslerim</span></p>
                                            <hr>
                                            <a href="{{route('kullanici.adreslerim.index')}}" class="text-center "> Tümünü Gör</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mb-5 mb-lg-0">
                                        <div class="card-body bg-white rounded shadow1 text-center">
                                  <h1 style="color: #8c8c8c;font-size:5rem" class="pt-2 m-text5 pb-2">{{$RequestProductCount}}</h1>
                                  <hr><p style="color: #8f8f8f" class="text-uppercase s-text3">Ürününe gelen istek var</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
            </div>
        </div>
        </div>
    </section>




@endsection

