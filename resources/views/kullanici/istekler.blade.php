@extends('front.layouts.master')
@section('title','Gelen istekler')
@section('content')
    <section class="flex-col-c-m text-white " style="font-size:.75rem!important;background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)" >
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
            <div class="row">
                <!--Kullanıcı Menu -->
                <div class="col-sm-3 col-md-4 p-2 col-lg-3 p-b-50 rounded shadow1 bg-white " style="height: 150px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active " id="v-pills-home-tab"  href="{{route('kullanici.account')}}"  aria-selected="false">Hesabım</a>
                        <a class="nav-link "  href="{{route('kullanici.Orders')}}" aria-selected="true">Siparişlerim</a>
                        <a class="nav-link"   href="{{route('kullanici.ProductAdd')}}"  aria-selected="false">Ürün Yükle</a>
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
                <!-- ÜRÜNLERİME GELEN İSTEKLER-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <strong class="card-title text-uppercase">Gelen İstekler </strong>
                                <!--istekleri getir -->
                                <!--eğer gelen istek var ise -->
                                @if(count($RequestProduct)>0)

                                    @foreach($RequestProduct as $product)
                                        <div class="row bg-white m-3 p-2 border rounded shadow1">
                                            <div class="col-sm-5">
                                                <form method="post" action="{{route('kullanici.RequestUptade')}}" >
                                                    @csrf
                                                    <div class="d-flex">
                                                        <div style="font-size:.70rem!important;" >
                                                            <img class="header-cart-item-img rounded" src="/{{$product->image}}" ><br>
                                                            {{$product->price}} <i class="fa fa-cube text-danger"></i>

                                                        </div>
                                                        <div >
                                                            <strong >{{$product->title}}</strong>
                                                            <p style="font-size:.65rem!important;">Sipariş No : 1{{$product->id}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi : {{$product->created_at}}</p>
                                                            <p style="font-size:.65rem!important;">{{$product->cargocompany}} Kargo</p>
                                                        </div>
                                                    </div>

                                            </div>

                                                    <div class="col-sm-4" style="word-break: break-word">
                                                        <strong class="hidden-xs">Teslimat Bilgileri</strong>
                                                        <p style="font-size: .65rem !important;">{{$product->name}}</p>
                                                        <p style="font-size: .65rem !important;">{{$product->province}} | {{$product->district}}</p>
                                                        <p style="font-size: .65rem !important;">{{$product->address}}</p>
                                                        <p style="font-size: .65rem !important;">{{$product->telephone}}</p>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        @switch($product->status)
                                                            @case('Beklemede')
                                                            <p><strong class="hidden-xs small text-warning">{{$product->status}}</strong></p>
                                                            <button type="submit" class="p-t-2 p-b-2 " style="font-size:.75rem!important;" name="WaitOrderID" value="{{$product->id}}"><strong>Ürünü hazırlıyorum</strong></button>
                                                            @break
                                                            @case('Ürün Hazırlanıyor')
                                                            <p ><strong class="hidden-xs small text-warning">{{$product->status}}</strong></p>
                                                            <p style="font-size: .65rem !important;">Kargo Şirketi</p>
                                                            <select name="KargoFirma" style="font-size:0.75rem" class="form-control form-control-sm small" required>
                                                                <option value="">Seçim Yapınız</option>
                                                                <option value="Yurtiçi">Yurtiçi</option>
                                                                <option value="Aras">Aras</option>
                                                                <option value="MNG">MNG</option>
                                                                <option value="DHL">DHL</option>
                                                                <option value="Sürat">Sürat</option>
                                                                <option value="TNT">TNT</option>
                                                                <option value="PTT">PTT</option>
                                                                <option value="UPS">UPS</option>
                                                            </select>
                                                            <p style="font-size: .65rem !important;">Kar.Takip No</p>
                                                            <input type="text" name="CargoNumber" class="form-control form-control-sm border  border-secondary" style="color:#000000" required><br>

                                                            <button type="submit" class="p-t-1 p-b-2 " style="font-size:.75rem!important;" name="CargoOrderID" value="{{$product->id}}"><strong>Kargoya verildi</strong></button>
                                                            </form>
                                                            @break
                                                            @case('Kargoda')
                                                            <p ><strong class="hidden-xs small text-info">{{$product->status}}</strong></p>
                                                            <p style="font-size: .65rem !important;">Kar.Takip No: {{$product->cargoNumber}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi :</p>
                                                            <p style="font-size:.65rem!important;">{{$product->updated_at}}</p>
                                                            @break
                                                            @case('Teslim Edildi')
                                                            <p ><strong class="hidden-xs small text-success">{{$product->status}}</strong></p>
                                                            <p style="font-size: .65rem !important;">Kar.Takip No: {{$product->cargoNumber}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi :</p>
                                                            <p style="font-size:.65rem!important;">{{$product->updated_at}}</p>
                                                            @break
                                                            @case('İptal Edildi')
                                                            <p ><strong class="hidden-xs small text-danger">{{$product->status}}</strong></p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi :</p>
                                                            <p style="font-size:.65rem!important;">{{$product->updated_at}}</p>
                                                            @break
                                                        @endswitch
                                                    </div>


                                        </div>
                                    @endforeach
                                <!-- Pagination -->
                                    <!-- Pagination -->

                                        <div class="card p-3 text-center border-0 bg-light">
                                    <div class="pagination">
                                        {{$RequestProduct->links("pagination::bootstrap-4")}}
                                    </div>
                                        </div>
                                    <!--eğer herhangi bir sipariş yok ise -->
                                @else
                                    <div class="s-text8 p-t-5 p-b-5  bg-light m-3 p-2 border  text-center">
                                        <img src="{{asset('/front')}}/images/icons/urunyok.png">
                                        <br>
                                        <strong>Gelen istek bulunmamaktadır.</strong>
                                    </div>
                                @endif



                            </div>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
