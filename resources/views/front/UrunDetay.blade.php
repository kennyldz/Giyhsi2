@extends('front.layouts.master')
@section('title',$productsdetail->title)
@section('content')

    <!-- breadcrumb -->
    <div class="bread-crumb text-white flex-w mt-0  p-4" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <a href="/" class="s-text16 text-white">
            Ana Sayfa
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="{{route('Kategori',$productsdetail->getCategory->slug)}}" class="s-text16 text-white">
            {{$productsdetail->getCategory->name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <span class="s-text17 text-white">
			{{$productsdetail->title}}
		</span>
    </div>

<div class="container bgwhite p-t-35 p-b-80">
    <div class="flex-w flex-sb">
        <div class="w-size13 p-t-30 respon5">
            <div class="wrap-slick3 flex-sb flex-w">
                <div class="wrap-slick3-dots"></div>

                <div class="slick3">
                    <div class="item-slick3" data-thumb="/{{$productsdetail->image}}">
                        <div class="wrap-pic-w">
                            <img src="/{{$productsdetail->image}}" alt="{{$productsdetail->title}}" >
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <div class="w-size14 p-t-30 respon5">
            <h4 class="product-detail-name m-text16 p-b-13">
                {{$productsdetail->title}}
            </h4>

            <!--  -->
            <div class="p-t-33 p-b-60">
                <div class="flex-m flex-w">
                    <div class="rs2-select2 rs3-select2  of-hidden w-size16  p-1 text-secondary">
                        <table class="table table-sm small">
                            <tr><td>Beden</td><td>{{$productsdetail->size}}</td></tr>
                            <tr><td>Renk</td><td>{{$productsdetail->color}}</td></tr>
                            <tr><td>Numara</td><td>{{$productsdetail->shoe_size}}</td></tr>
                            <tr><td>Cinsiyet</td><td>{{$productsdetail->gender}}</td></tr>
                            <tr><td>Kargo</td><td>{{$productsdetail->cargopayment}} Öder</td></tr>
                            <tr><td>Nereden</td><td>{{$productsdetail->cargo}}  Kargolanacak</td></tr>
                            <tr><td>Nereye</td><td>{{$productsdetail->sendarea}}  Kargolanır</td></tr>
                        </table>
                    </div>
                </div>
                <div class="p-t-10 border-0">
                            <table class="table table-sm text-center border-0">
                                <tr class="text-center p-4 ">
                                    <td class="text-center p-4">
                                        <h1 style="font-size: 4.6rem"><strong class="">{{$productsdetail->price}}</strong> </h1> <i class="fa fa-cube text-danger" title="Lokum"></i>
                                    </td>
                                    <td class="p-4">
                                        <div class="btn-addcart-product-detail size9 text-center  trans-0-4 m-t-10 m-b-10">
                                            <!-- Button -->
                                            <a href="{{route('kullanici.satin.al',$productsdetail->slug)}}" class="flex-c-m sizefull bg1 rounded  hov1 s-text1 trans-0-4"  style="background-color: #FF5722" >
                                                Satın Al
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                </div>
            </div>


            <!--  -->
            <div class="wrap-dropdown-content bo6 p-t-4 p-b-14 active-dropdown-content">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Açıklama
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        {{$productsdetail->content}}
                    </p>
                </div>
            </div>

            <div class="wrap-dropdown-content active-dropdown-content bo7 p-t-15 p-b-14">
                <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                    Ek Bilgi
                    <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                    <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                </h5>

                <div class="dropdown-content dis-none p-t-15 p-b-23">
                    <p class="s-text8">
                        {{$productsdetail->info}}
                    </p>
                </div>
            </div>


        </div>
    </div>
</div>


<!-- Relate Product -->
<section class="relateproduct bgwhite p-t-45 p-b-138">
    <div class="container">
        <div class="p-b-40">
            <h4 class="text-center mt-3 mb-2 text-black-50">İlgili ürünler</h4>
        </div>
        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
        @foreach($relatedproducts as $related)
        @if($related->id!=$productsdetail->id)


                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative ">
                                    <img src="/{{$related->image}}" style="height:220px" alt="{{$related->slug}}">

                                    <div class="block2-overlay trans-0-4">

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



        @endif
        @endforeach
                    </div>
                </div>

    </div>
</section>

@endsection
