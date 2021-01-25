@extends('front.layouts.master')
@section('title','Siparişlerim')
@section('content')
    <section class="flex-col-c-m text-white" style="font-size:.75rem!important;background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)" >
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
                <div class="col-sm-3 col-md-4 col-lg-3 p-b-50 bg-white shadow1 rounded " style="height: 150px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " id="v-pills-home-tab"  href="{{route('kullanici.account')}}"  aria-selected="false">Hesabım</a>
                        <a class="nav-link active"  href="{{route('kullanici.Orders')}}" aria-selected="true">Siparişler</a>
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
                        <!-- SİPARİŞLER-->
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <strong class="card-title text-uppercase">siparişlerim </strong>
                                        <!--Siparişleri getir -->
                                        <!--eğer sipariş geçmişi var ise -->
                                        @if(count($TotalOrders)>0)

                                            @foreach($TotalOrders as $order)
                                                <div class="row bg-white m-3 p-2 border rounded shadow1">

                                                    <div class="col-lg-8">
                                                        <form method="post" action="{{route('kullanici.Order.Cancel')}}">
                                                            @csrf
                                                            <div class="d-flex ">
                                                                <div style="font-size:.70rem!important;" ><img class="header-cart-item-img rounded" src="/{{$order->image}}" ><br>
                                                                    {{$order->price}} <i class="fa fa-cube text-danger"></i>
                                                                    <input type="text" name="OrderDelight" value="{{$order->price}}" hidden>
                                                                </div>
                                                                <div class="p-2 ">
                                                                    <strong class="hidden-xs">1{{$order->id}}</strong>
                                                                    <input type="text" name="OrderID" value="{{$order->id}}" hidden>
                                                                    <input type="text" name="ProductID" value="{{$order->productID}}" hidden>
                                                                    <input type="text" name="UserAmount" value="{{$User->amount}}" hidden>
                                                                    <p ><strong>{{$order->title}}</strong></p>
                                                                    <p class="p-1" style="font-size: .65rem !important;">{{$order->created_at}}</p>
                                                                </div>
                                                            </div>

                                                    </div>
                                                    <div class="col-lg-4">
                                                        @switch($order->status)
                                                            @case('Beklemede')
                                                            <p class="text-warning small"><i class="fa fa-clock-o"></i> {{$order->status}}</p>
                                                            <button type="submit" name="OrderCancel" value="{{$order->id}}" class="p-t-2 p-b-2 " style="font-size:.75rem!important;">İptal Et</button>
                                                            <p style="background-color:white;padding-left:2px;font-size:.70rem!important;" ><i class="fa fa-bullhorn text-danger"></i> Siparişinizi sadece bu aşamada iptal edebilirsiniz.</p>

                                                            @break
                                                            @case('Ürün Hazırlanıyor')
                                                            <p class="text-warning small"><i class="fa fa-clock-o"></i> {{$order->status}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi : {{$order->updated_at}}</p>
                                                            @break
                                                            @case('Kargoda')

                                                            <p class="text-info small"><i class="fa fa-truck"></i> {{$order->status}}</p>
                                                            <p style="font-size:.65rem!important;">{{$order->cargocompany}} Kargo</p>
                                                            <p style="font-size:.65rem!important;">{{$order->cargoNumber}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi : {{$order->updated_at}}</p>
                                                            <input type="text" name="Price" value="{{$order->price}}" hidden>
                                                            <input type="text" name="SenderUserID" value="{{$order->senderUserID}}" hidden>
                                                            <button type="submit" name="OrderComplete" value="{{$order->id}}" class="p-t-2 p-b-2 text-success" style="font-size:.75rem!important;"><strong>Ürünü Teslim Aldım</strong> </button>
                                                            </form>
                                                     @break
                                                            @case('Teslim Edildi')
                                                            <p class="text-success small"><i class="fa fa-check"></i> {{$order->status}}</p>
                                                            <p style="font-size:.65rem!important;">{{$order->cargocompany}} Kargo</p>
                                                            <p style="font-size:.65rem!important;">{{$order->cargoNumber}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi : {{$order->updated_at}}</p>
                                                            @break
                                                            @case('İptal Edildi')
                                                            <p class="text-danger small"><i class="fa fa-times"></i> {{$order->status}}</p>
                                                            <p style="font-size:.65rem!important;">İşlem Tarihi : {{$order->updated_at}}</p>
                                                            @break
                                                        @endswitch

                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Pagination -->
                                                <!-- Pagination -->
                                                <div class="card p-3 text-center border-0">
                                                <div class="pagination ">
                                                    {{$TotalOrders->links("pagination::bootstrap-4")}}
                                                </div>
                                                </div>
                                        <!--eğer herhangi bir sipariş yok ise -->
                                        @else
                                            <div class="s-text8 p-t-5 p-b-5  bg-light m-3 p-2 border  text-center">
                                                <img src="{{asset('/front')}}/images/icons/urunyok.png">
                                                <br>
                                                <strong>Siparişiniz bulunmamaktadır.</strong>
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
