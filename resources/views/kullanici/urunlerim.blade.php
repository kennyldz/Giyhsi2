@extends('front.layouts.master')
@section('title','Ürünlerim')
@section('content')
    <section class="flex-col-c-m text-white  " style="font-size:.75rem!important;background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)" >
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
                <div class="col-sm-3 col-md-4 p-2 col-lg-3 p-b-50 rounded bg-white shadow1" style="height: 150px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab"  href="{{route('kullanici.account')}}"  aria-selected="false">Hesabım</a>
                        <a class="nav-link "  href="{{route('kullanici.Orders')}}" aria-selected="true">Siparişler</a>
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
                <!-- ÜRÜNLERİM-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <strong class="card-title text-uppercase">ürünlerim </strong>
                                <!--ürünleri getir -->
                                <!--eğer ürün geçmişi var ise -->
                                @if(count($TotalProducts)>0)

                                    @foreach($TotalProducts as $product)
                                        <div class="row bg-white m-3 p-2 border rounded shadow1 ">
                                            <div class="col-sm-8">

                                                    @csrf
                                                    <div class="d-flex">
                                                        <div style="font-size:.75rem!important;" ><img class="header-cart-item-img rounded" src="/{{$product->image}}" ><br>
                                                            {{$product->price}} <i class="fa fa-cube text-danger"></i>
                                                        </div>
                                                        <div class="p-2 ">
                                                            <strong class="hidden-xs">{{$product->title}}</strong>
                                                            <p class="p-1" style="font-size: .65rem !important;" >{{Illuminate\Support\Str::limit($product->content,45)}}</p>
                                                            <p class="p-1" style="font-size: .65rem !important;">{{$product->created_at}}</p>
                                                        </div>
                                                    </div>

                                            </div>
                                            <div class="col-sm-4">
                                                @switch($product->check)

                                                    @case(0)
                                                    <form method="post" action="{{route('kullanici.Product.Cancel')}}">
                                                        @csrf
                                                    <p class="text-warning small"><i class="fa fa-clock-o"></i> {{$product->status}}</p>
                                                    <button type="submit" class="p-t-2 p-b-2 " style="font-size:.75rem!important;" name="ProductID" value="{{$product->id}}"><strong>İptal Et</strong></button>
                                                    @break

                                                    @case(1)

                                                    <p class="text-info small"><i class="fa fa-desktop"></i> {{$product->status}}</p>
                                                    <p style="font-size:.65rem!important;">{{$product->hit}} kez görüntülendi</p>
                                                    <p style="font-size:.65rem!important;">En son ziyaret : {{$product->updated_at}}</p>
                                                    <button type="submit" class="p-t-2 p-b-2 " style="font-size:.75rem!important;" name="ProductID" value="{{$product->id}}"><strong>Askıdan Al</strong></button>
                                                    |  <a href="{{route('UrunDetay',$product->slug)}}" target="_blank" class="p-t-2 p-b-2 " style="font-size:.75rem!important;"><strong>Ürünü Gör</strong></a>
                                                    </form>
                                                    @break

                                                    @case(2)
                                                    <p class="text-success small"><i class="fa fa-check"></i> {{$product->status}}</p>
                                                    <p style="font-size:.65rem!important;">İşlem Tarihi : {{$product->updated_at}}</p>


                                                    @break

                                                    @case(3)
                                                    <p class="text-danger small"><i class="fa fa-times"></i> {{$product->status}}</p>
                                                    <p style="font-size:.65rem!important;">İşlem Tarihi : {{$product->updated_at}}</p>
                                                    @break
                                                @endswitch

                                            </div>
                                        </div>
                                    @endforeach
                                <!-- Pagination -->
                                    <!-- Pagination -->
                                        <div class="card p-3 text-center border-0">
                                    <div class="pagination ">
                                        {{$TotalProducts->links("pagination::bootstrap-4")}}
                                    </div>
                                        </div>
                                    <!--eğer herhangi bir ürün yok ise -->
                                @else
                                    <div class="s-text8 p-t-5 p-b-5  bg-light m-3 p-2 border  text-center">
                                        <img src="{{asset('/front')}}/images/icons/urunyok.png">
                                        <br>
                                        <strong>Eklemiş olduğunuz ürün bulunmamaktadır.</strong>
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
