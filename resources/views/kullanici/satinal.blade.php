@extends('front.layouts.master')
@section('title',' Satın Al')
@section('content')

    <!-- Title Page -->
    <section class=" p-t-10 p-b-10 flex-col-c-m" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h2 class="l-text2 t-center">
            Satın Al
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th class="column-1"></th>
                            <th class="column-2">Ürün Adı</th>
                            <th class="column-3">Beden</th>
                            <th class="column-3">Renk</th>
                            <th class="column-3">Kargo</th>
                            <th class="column-3">Lokum</th>
                        </tr>

                        <tr class="table-row">
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="/{{$ProductDetails->image}}" >
                                </div>
                            </td>
                            <td class="column-2">{{$ProductDetails->title}}</td>
                            <td class="column-3">{{$ProductDetails->size}}</td>
                            <td class="column-3">{{$ProductDetails->color}}</td>
                            <td class="column-3">{{$ProductDetails->cargopayment}}</td>
                            <td class="column-3">{{$ProductDetails->price}} <i class="fa fa-cube text-danger" title="Lokum"></i></td>
                        </tr>


                    </table>
                </div>
            </div>


            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <form method="post" action="{{route('kullanici.Create.Order')}}">
                    @csrf
                <h5 class="m-text20 p-b-24">
                    Alışverişi Tamamla
                </h5>

                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Teslim:
					</span>

                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23">
                            Kargonuzun teslimatı için adres bilgilerinizi giriniz.
                        </p>
                        <span class="s-text19">
							Adreslerimden Seç
						</span>
                        <div class="size13  m-b-12">
                            <select name="MyAddress" id="MyAddress" class="form-control form-control-sm" onclick="Hide()" >

                               @foreach($Address as $adres)
                                   <option value="{{$adres->id}}">{{$adres->address_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="size13  m-b-12">
                            <label class="s-text19"><input type="checkbox" onclick="Add()" name="New"  id="New"> Yeni Adres Gir</label>
                           
                        </div>

                        <div id="NewAddress" style="display: none" >

                            <span class="s-text19">
							Adres
						</span>
                        <div class="size13 bo4 m-b-12">
                          <input type="text" id="AdresIl" name="AdresIl" class="sizefull s-text7 p-l-15 p-r-15" placeholder="İl" >
                        </div>

                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="AdresIlce" name="AdresIlce" placeholder="İlçe" >
                        </div>

                        <div class="size13 bo4 m-b-22">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" id="Adres" name="Adres" placeholder="Adres " >
                        </div>

                        <span class="s-text19">
							İletişim
						</span>
                        <div class="size13 bo4 m-b-12">
                            <input type="text" id="AdresAdSoyad" name="AdresAdSoyad" class="sizefull s-text7 p-l-15 p-r-15" placeholder="Ad / Soyad" >
                        </div>
                        <div class="size13 bo4 m-b-12">
                            <input type="tel" name="AdresTelefon"  class="sizefull s-text7 p-l-15 p-r-15"  placeholder="5xx-xxx-xxxx" pattern="[1-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" >
                        </div>

                        </div>



                    </div>
                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Toplam
					</span>

                    <span class="m-text21 w-size20 w-full-sm">
						{{$ProductDetails->price}} <i class="fa fa-cube text-danger" title="Lokum"></i>
					</span>

                </div>

                <div class="size15 trans-0-4">

                    @if($UserInfo->amount >= $ProductDetails->price)
                        <button type="submit" value="{{$ProductDetails->id}}" name="ProductID" class="flex-c-m sizefull  rounded   s-text1 trans-0-4"  style="background-color: #FF5722">
                            Satın Al
                        </button>
                        <input type="text" name="KalanLokum" value="{{$UserInfo->amount-$ProductDetails->price}}" hidden>
                        <input type="text" name="ProductName" value="{{$ProductDetails->title}}" hidden>
                    @else
                    <div class="alert alert-secondary">Yeterli lokumunuz bulunmamaktadır.</div>
                    @endif

                </div>
                </form>
            </div>
        </div>
    </section>

@endsection

<script type="text/javascript">

    function Add() {

        var Show=document.getElementById("NewAddress").style.display="block";

        var AdresIl =document.getElementById("AdresIl").required=true;
        var AdresIlce =document.getElementById("AdresIlce").required=true;
        var Adres =document.getElementById("Adres").required=true;
        var AdresAdSoyad =document.getElementById("AdresAdSoyad").required=true;
        var AdresTelefon =document.getElementById("AdresTelefon").required=true;
       var MyAddress =document.getElementById("MyAddress").required=false;



    }

    function Hide(){
        var Hide=document.getElementById("NewAddress").style.display="none";
        var Select=document.getElementById("New").checked=false;
        var AdresIl =document.getElementById("AdresIl").required=false;
        var AdresIlce =document.getElementById("AdresIlce").required=false;
        var Adres =document.getElementById("Adres").required=false;
        var AdresAdSoyad =document.getElementById("AdresAdSoyad").required=false;
        var AdresTelefon =document.getElementById("AdresTelefon").required=false;
        //var Value=document.getElementById('New').value="0";

    }

</script>
