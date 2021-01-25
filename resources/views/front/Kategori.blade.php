@extends('front.layouts.master')
@section('title',Request::segment(2))
@section('content')
    <section class="p-t-10 p-b-10 flex-col-c-m " style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h2 class="l-text2 t-center">
            {{Request::segment(2)}}
        </h2>
    </section>
    <!-- Content page -->
    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50 " >
                    <div class="leftbar p-r-20 p-r-0-sm text-center bg-light rounded shadow1">
                        <span style="font-size:9.1rem;font-weight: 200;line-height:10.1rem;color: #8c8c8c" class="pt-2 ">{{count($ProductsCategory)}}</span>
                   <br><span style="color: #8f8f8f" class="text-uppercase s-text1">Ürün Bulundu</span>
                    </div>
                    <div class="leftbar p-r-20 p-r-0-sm mt-4 ">

                        <h4 class="s-text12 ">
                            Kategoriler
                        </h4>

                        <ul class="mt-2" >
                            @foreach($categories as $category)
                                <li class="p-1 morris-hover border border-top border-right-0 border-left-0 border-bottom-0 " style="border-color: #4e555b" >
                                    <a href="{{route('Kategori',$category->slug)}}" class="@if(Request::segment(2)==$category->slug)  @endif  ">
                                        @if(Request::segment(2)==$category->slug)  <i class="fa fa-angle-double-right text-danger"></i> @endif  {{$category->name}}
                                    </a>
                                </li>
                            @endforeach

                        </ul>
<hr>
                        <div class="">
                            @if(!empty($Hitproduct))
                               <div class="row ">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                                    <div class="card shadow1">
                                        <a href="{{route('UrunDetay',$Hitproduct->slug)}}" >
                                            <img class="card-img" src="/{{$Hitproduct->image}}" alt="{{$Hitproduct->slug}}" height="250">
                                        </a>

                                        <div class=" d-flex justify-content-end mt-2 ml-2 " style="position: absolute;">
                                            <a href="#" class="card-link text-white rounded font-10  text-center shadow1" style="height: 25px;background-color: #FF5722">
                                                &nbsp;  <i class="fa fa-star "></i> Kategoride Haftanın Ürünü &nbsp;
                                            </a>
                                        </div>

                                        <div class="card-body " >

                                            <a href="{{route('UrunDetay',$Hitproduct->slug)}}" >
                                                <h5 class="m-text10 text-uppercase" style="font-size:0.9rem">{{Illuminate\Support\Str::limit($Hitproduct->title,22)}}</h5></a>

                                            <hr class="text-black-50">
                                            <div class="buy d-flex text-center justify-content-between align-items-center">
                                                <a href="{{route('UrunDetay',$Hitproduct->slug)}}" class="btn btn-default bg-purple form-control mt-3 hov1 text-white"  style="background-color: #FF5722" ><i class="fa fa-shopping-cart"></i> İncele</a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                               </div>
                            @endif
                        </div>
                    </div>

                </div>


                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50" >
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">

                        <span class="s-text8 p-t-5 p-b-5">
							1-{{count($ProductsCategory)}} Arası sonuç gösterilmektedir
						</span>
                    </div>
                    <!--  Ürünleri Göster-->
                    <!-- Product -->
                    @if(count($ProductsCategory)>0)
                    <div class="row">

                        @foreach($ProductsCategory as $product)
                            <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3">
                                <div class="card shadow1">
                                    <a href="{{route('UrunDetay',$product->slug)}}" >
                                        <img class="card-img" src="/{{$product->image}}" alt="{{$product->slug}}" height="250">
                                    </a>

                                    <div class=" d-flex justify-content-end mt-2 ml-2 " style="position: absolute;">
                                        <a href="#" class="card-link text-white rounded bg-warning text-center shadow1" style="height: 25px;">
                                            &nbsp;  <i class="fa fa-tag "> </i> {{$product->getCategory->name}} &nbsp;
                                        </a>
                                    </div>

                                    <div class="card-body " style="height: 240px">

                                        <a href="{{route('UrunDetay',$product->slug)}}" >
                                            <h5 class="m-text10 text-uppercase" style="font-size:0.9rem">{{Illuminate\Support\Str::limit($product->title,22)}}</h5></a>

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
                    @else
                        <div class="s-text8 p-t-5 p-b-5 text-center ">
                            <img src="{{asset('/front')}}/images/icons/urunyok.png">
                            <br>
                            <strong>Bu kategoriye ait ürün bulunmamaktadır.Belki siz bir ürün ekleyebilirsiniz.</strong>
                        </div>
                    @endif
                    <div class="justify-start sm:justify-center md:justify-end lg:justify-between xl:justify-around"> </div>
                    <!-- Pagination -->
                    <div class="pagination flex-m flex-w p-t-26">
                        {{$ProductsCategory->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
