@extends('front.layouts.master')
<!-- Page Title and Footer Title -->
@section('title','Parasız Alışveriş')
<!-- Page Content -->
@section('content')

            <!-- Slide1 -->
            <section class="slide1">
                <div class="wrap-slick1">
                    <div class="slick1">
                        @foreach($sliders as $slider)
                            <div class="item-slick1 item1-slick1" style="background-image: url('/{{$slider->image}}');">
                                <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170" style="text-decoration: none">
                                    <h2 class="caption1-slide1 xl-text2 t-center bo14 p-b-6 animated visible-false m-b-22" data-appear="fadeInUp" >
                                        {{$slider->bigslogan}}
                                    </h2>

                                    <span class="caption2-slide1 m-text1 t-center animated visible-false m-b-33" data-appear="fadeInDown">
							{{$slider->smallslogan}}
						</span>

                                    <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                                        <!-- Button -->
                                        @if(!empty($slider->sliderlink))
                                            <a href="{{$slider->sliderlink}}" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                                İncele
                                            </a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>




    <!-- Banner -->
    <div class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{asset('front/')}}/images/bebekcatalog.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Bebek 0-6
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{asset('front/')}}/images/cocukkatalog.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Çocuk
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{asset('front/')}}/images/yetiskincatalog.jpg" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="#" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Yetişkin
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our product -->
    <section class="bgwhite p-t-45 p-b-58">
        <div class="container">
            <div class="sec-title p-b-22">
                <h4 class="section-title  text-center mt-1  text-black-50">Ürünler</h4>
            </div>

            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active m-text8 hov4" data-toggle="tab" href="#yeni" role="tab">Yeni Eklenenler</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link m-text8" data-toggle="tab" href="#azlokum" role="tab">Az Lokum</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-35">
                    <!-- Yeni Ürünler -->
                    <div class="tab-pane fade show active" id="yeni" role="tabpanel">
                        <div class="row">
                            @foreach($products as $product)
                            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3">

                                <div class="card ">
                                    <a href="{{route('UrunDetay',$product->slug)}}" >
                                    <img class="card-img" src="{{$product->image}}" alt="Vans" height="250">
                                    </a>

                                    <div class=" d-flex justify-content-end mt-2 ml-2 " style="position: absolute;">
                                        <a href="#" class="card-link text-white rounded bg-warning text-center shadow1" style="height: 25px;width:90px;">
                                            <i class="fa fa-bell "> </i> Yeni
                                        </a>
                                    </div>

                                    <div class="card-body " style="height: 240px">

                                            <a href="{{route('UrunDetay',$product->slug)}}"  >
                                                <h5 class="card-title text-uppercase " style="font-size:0.9rem">{{Illuminate\Support\Str::limit($product->title,30)}}</h5></a>
                                        <p class="card-text s-text8">{{Illuminate\Support\Str::limit($product->content,40)}}</p>
                                        <hr class="text-black-50">
                                        <div class="buy d-flex justify-content-between align-items-center">
                                            <div class="price text-center"><h1 class="mt-4 font-weight-bold" style="font-size: 4.6rem"><strong class="">{{$product->price}}</strong> </h1> <i class="fa fa-cube text-danger" title="Lokum"></i></div>
                                            <a href="{{route('kullanici.satin.al',$product->slug)}}" class="btn btn-default bg-purple  mt-3 hov1 text-white"  style="background-color: #FF5722" ><i class="fa fa-shopping-cart"></i> Satın Al</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- AZ Lokum ürünler -->
                    <div class="tab-pane fade" id="azlokum" role="tabpanel">
                        <div class="row">
                                @foreach($lowproducts as $product)
                                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3">

                                        <div class="card ">
                                            <a href="{{route('UrunDetay',$product->slug)}}" >
                                                <img class="card-img" src="{{$product->image}}" alt="Vans" height="250">
                                            </a>
                                            <div class=" d-flex justify-content-end mt-2 ml-2 " style="position: absolute;">
                                                <a href="#" class="card-link text-white rounded bg-warning text-center shadow1" style="height: 25px;width:90px;">
                                                    <i class="fa fa-angle-double-down "> </i> Az
                                                </a>
                                            </div>
                                            <div class="card-body" style="height: 240px">
                                                <a href="{{route('UrunDetay',$product->slug)}}" >

                                                    <h5 class="card-title text-uppercase " style="font-size:0.9rem">{{Illuminate\Support\Str::limit($product->title,30)}}</h5>

                                                </a>

                                                <p class="card-text s-text8">{{Illuminate\Support\Str::limit($product->content,40)}}</p>
                                                <hr class="text-black-50">
                                                <div class="buy d-flex justify-content-between align-items-center">
                                                    <div class="price text-center "><h5 class="mt-4" style="font-size: 4.6rem"><b>{{$product->price}}</b> </h5><i class="fa fa-cube text-danger" title="Lokum"></i></div>
                                                    <a href="{{route('kullanici.satin.al',$product->slug)}}" class="btn btn-default bg-purple text-white  mt-3 hov1" style="background-color: #FF5722" ><i class="fa fa-shopping-cart"></i> Satın Al</a>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
            <!--Haftanın ürünü -->
            @if(!empty($HitProducts))
                <section class=" mb-2 " style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%);">
                    <h4 class="section-title text-white  text-center mt-3 mb-2 p-3"><strong>Haftanın Ürünü</strong></h4>
                    <div class="container ">

                        <div class="row">
                            <!--Bilgiler -->
                            <div class="col-xs-12 col-sm-6 col-md-7 ">

                                <div class="image-flip p-4" >

                                    <div class="mainflip border-0">

                                        <div class="card border-0 " style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
                                            <div class="card-body border-0 text-white " >
                                                <a href="{{route('UrunDetay',$HitProducts[0]->slug)}}" >
                                                    <h5 class=" text-uppercase text-white" style="font-size:1.2rem"><strong>{{Illuminate\Support\Str::limit($HitProducts[0]->title,50)}}</strong></h5>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="card border-0 " style="background-color: transparent">
                                            <div class="card-body border-0 " style="word-wrap: break-word">
                                                <p class="text-white">
                                                    {{$HitProducts[0]->content}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--ürün resim -->
                            <div class="col-xs-12 col-sm-6 col-md-4 pt-3">
                                <div class="image-flip " >
                                    <div class="mainflip ">
                                        <div class="frontside">
                                            <div class="card rounded   border-0" style="background-image: url({{$HitProducts[0]->image}});background-size: cover;background-repeat: no-repeat;height: 200px;padding: 4px 4px 4px 4px" >
                                                <div class="card-body rounded " >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="backside">
                                            <div class="card bg-white" style="width: 360px">
                                                <div class="card-body text-center mt-4">
                                                    <strong class="mt-4" style="font-size: 7rem">{{$HitProducts[0]->price}}</strong>
                                                    <i class="fa fa-cube text-danger" title="Lokum"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>






                        </div>
                    </div>
                </section>
            @endif

    <!--En çok bakılanlar -->
            @if(!empty($HitProducts))
            <section class="relateproduct bgwhite p-t-45 p-b-138">
                <div class="container">
                    <div class="sec-title p-b-60">
                        <h4 class="section-title  text-center mt-1  text-black-50">En Çok Görüntülenenler</h4>
                    </div>
                    <!-- Slide2 -->
                    <div class="wrap-slick2">
                        <div class="slick2">
                            @foreach($HitProducts as $related)
                              <div class="item-slick2 p-l-15 p-r-15">
                                        <!-- Block2 -->
                                        <div class="block2">
                                            <div class=" d-flex justify-content-end mt-2 ml-2 " style="position: absolute;z-index: 1">
                                                <a href="#" class="card-link text-white rounded    text-center shadow1" style="height: 25px;width:90px;background-color: #FF5722">
                                                    <i class="fa fa-line-chart "> </i>
                                                </a>
                                            </div>
                                            <div class="block2-img wrap-pic-w of-hidden pos-relative ">

                                                <img src="/{{$related->image}}" style="height:220px">

                                                <div class="block2-overlay trans-0-4">
                                                    <!-- Favorilere ekle                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                                                                            </a>
                                                    -->

                                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                                        <!-- Button -->
                                                        <a href="{{route('kullanici.satin.al',$related->slug)}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" id="block2-btn-addcart"  >
                                                            Satın Al
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="block2-txt p-t-20">
                                                <a href="{{route('UrunDetay',$related->slug)}}" class="block2-name dis-block s-text2 text-uppercase p-b-5">
                                                    {{Illuminate\Support\Str::limit($related->title,25)}}
                                                </a>

                                                <span class="block2-price m-text6 p-r-5">
									<b>{{$related->price}}</b> <i class="fa fa-cube text-danger" title="Lokum"></i>
								</span>
                                            </div>
                                        </div>
                                    </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
            @endif



            <section id="team" class="pb-5 mt-3">
                <div class="container">
                    <h4 class="section-title  text-center mt-3 mb-2 text-black-50">Nasıl Kullanacaksınız ?</h4>
                    <div class="row">
                        <!-- Ürün Yükle -->
                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <div class="image-flip " ontouchstart="this.classList.toggle('hover');">
                                <div class="mainflip ">
                                    <div class="frontside">
                                        <div class="card " style="background-image: linear-gradient(68deg, #FF5722, #ee9887 99%)">
                                            <div class="card-body text-center">
                                                <p class="mt-5"><i class="fa fa-download fa-3x text-white"></i></p>
                                                <h4 class="card-title text-white mt-2"><strong>Ürün Yükle</strong></h4>
                                                <p class="card-text text-white">Kullanmadığın kıyafetlerini askıya  bırak.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="backside">
                                        <div class="card">
                                            <div class="card-body text-center mt-4">
                                                <h4 class="card-title"><strong>Ürün Yükle</strong></h4>
                                                <p class="card-text">Hesabınızdan ürün yükle sayfasına girip ilgili alanları doldurup ürününüzü askıya bırakabilirsiniz</p>
                                                <ul class="list-inline">

                                                    <li class="list-inline-item">
                                                        <a href="{{route('kullanici.ProductAdd')}}" class="btn btn-default bg-purple text-white  mt-3 hov1" style="background-color: #FF5722" > Ürün Yükle</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->
                        <!-- Lokum Kazan  -->
                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <div class="image-flip " ontouchstart="this.classList.toggle('hover');">
                                <div class="mainflip ">
                                    <div class="frontside">
                                        <div class="card " style="background-image: linear-gradient(68deg, #FF5722, #ee9887 99%)">
                                            <div class="card-body text-center">
                                                <p class="mt-5"><i class="fa fa-cubes fa-3x text-white"></i></p>
                                                <h4 class="card-title text-white mt-2"><strong>Lokum Kazan</strong></h4>
                                                <p class="card-text text-white">Ürünlerini satarak lokum kazan.</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="backside">
                                        <div class="card">
                                            <div class="card-body text-center mt-4">
                                                <h4 class="card-title"><strong>Ürün Sat</strong></h4>
                                                <p class="card-text">Ürünlerinizi satarak lokum kazanın, daha çok ürün yükleyip satın daha fazla lokum kazanın.</p>
                                                <ul class="list-inline">

                                                    <li class="list-inline-item">
                                                        <a href="{{route('kullanici.account')}}" class="btn btn-default bg-purple text-white  mt-3 hov1" style="background-color: #FF5722" > Hesabım</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./Team member -->
                        <!-- Alışveriş Yap -->
                        <div class="col-xs-12 col-sm-6 col-md-4 ">
                            <div class="image-flip " ontouchstart="this.classList.toggle('hover');">
                                <div class="mainflip ">
                                    <div class="frontside">
                                        <div class="card " style="background-image: linear-gradient(68deg, #FF5722, #ee9887 99%)">
                                            <div class="card-body text-center">
                                                <p class="mt-5"><i class="fa fa-shopping-bag fa-3x text-white"></i></p>
                                                <h4 class="card-title text-white mt-2"><strong>Alışveriş Yap</strong></h4>
                                                <p class="card-text text-white">Kazandığın lokumlar ile hemen alışverişe başla</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="backside">
                                        <div class="card">
                                            <div class="card-body text-center mt-4">
                                                <h4 class="card-title"><strong>Alışveriş Yap</strong></h4>
                                                <p class="card-text">Kazandığınız lokumlar ile hemen alışverişe başlayın</p>
                                                <ul class="list-inline">

                                                    <li class="list-inline-item">
                                                        <a href="{{route('HomePage')}}" class="btn btn-default bg-purple text-white  mt-3 hov1" style="background-color: #FF5722" > Satın Al</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--
            <section class="shipping">
                <div class="container">

                    <div class="Nasil-in">

                        <div class="Head aos-init aos-animate" data-aos="fade-right">
                            <h1 class="large_text">Giyshi</h1>
                            <h3 class="Head-title">Nasıl Çalışır?</h3>
                            <p class="Head-desc"></p>
                        </div>
                        <div class="Nasil-list">
                            <div class="Nasil-list-item aos-init aos-animate" data-aos="fade-right" style="height: 200px">
                                <span>1</span>
                                <div class="Nasil-list-item-img">
                                    <i class="fa fa-download fa-3x text-white"></i>
                                </div>
                                <div class="Nasil-list-item-text">
                                    <span><strong>Ürün Yükle</strong></span>
                                    <p class="text-white">Askıya bir ürün yükle.</p>
                                </div>
                            </div>
                            <div class="Nasil-list-item aos-init aos-animate" data-aos="fade-up">
                                <span>2</span>
                                <div class="Nasil-list-item-img">
                                    <img src="assets/images/icon-tl.png" alt="">
                                </div>
                                <div class="Nasil-list-item-text">
                                    <span>Ödemeni Tamamla</span>
                                    <p>Belirtilen yöntemlerle ödemeni gerçekleştir.</p>
                                </div>

                            </div>
                            <div class="Nasil-list-item aos-init aos-animate" data-aos="fade-left">
                                <span>3</span>
                                <div class="Nasil-list-item-img">
                                    <img src="assets/images/icon-webcam.png" alt="">
                                </div>
                                <div class="Nasil-list-item-text">
                                    <span>Psikoloğa Bağlan</span>
                                    <p>Sizin için en uygun psikologu seçin.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            -->
    <!-- Shipping -->


@endsection



