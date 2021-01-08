@extends('front.layouts.master')
@section('title','Ürün Yükle')
@section('content')
    <section class="flex-col-c-m text-white " style="font-size:.75rem!important;background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)" >
        <strong>Merhaba {{Auth::User()->name}}</strong>
        <div  data-ride="carousel" style="background-color: #e65540;border-radius: 5px"  >
            <div class="carousel-item active">
                <table class="text-white " >
                    <tr>
                        <td style="padding: 20px 20px 20px 20px"><span class="fa fa-shopping-cart fa-3x"></span>&nbsp;</td><td><strong>Avantajlı</strong>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="carousel-item">
                <table class="text-white " >
                    <tr>
                        <td style="padding: 20px 20px 20px 20px "><span class="fa fa-credit-card-alt fa-3x"></span>&nbsp;</td><td><strong>Parasız</strong>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="carousel-item">
                <table class="text-white " >
                    <tr>
                        <td style="padding: 20px 20px 20px 20px "><span class="fa fa-get-pocket fa-3x"></span>&nbsp;</td><td><strong>Güvenli</strong>&nbsp;</td>
                    </tr>
                </table>
            </div>

        </div>
        Alışveriş deneyimine hoşgeldin.
    </section>

    <section class="bgwhite p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <!--Kullanıcı Menu -->
                <div class="col-sm-3 col-md-4 col-lg-3 p-b-50 ">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " id="v-pills-home-tab"  href="{{route('kullanici.account')}}"  aria-selected="false">Hesabım</a>
                        <a class="nav-link "   href="{{route('kullanici.Orders')}}"  aria-selected="true">Siparişler</a>
                        <a class="nav-link active"   href="{{route('kullanici.ProductAdd')}}"  aria-selected="false">Ürün Yükle</a>
                        <a class="nav-link"  data-toggle="pill" href="#"  aria-selected="false">Lokum Al</a>
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
<!--Ürün Yükle -->
<div class="container">
        <form method="post" action="{{route('kullanici.Create.Product')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">

                <div class="col-lg-8">
                    <table class="table table-sm ">
                        <tr class="small">
                            <th >
                                Ürün Adı
                                <input type="text" name="UrunAdi" class="form-control form-control-sm sizefull mt-1 w-full border" required>
                            </th>
                        </tr>
                        <tr class="small">
                            <th >
                                Ürün Açıklaması
                                <textarea type="text" name="UrunAciklama" class="form-control form-control-sm border"  required></textarea>
                            </th>
                        </tr>
                        <tr class="small">
                            <th>
                                Ürün Ek Bilgi
                                <textarea name="UrunEkBilgi" class="form-control form-control-sm border" ></textarea>
                            </th>
                        </tr>
                        <tr class="small">
                            <th>
                                Kategori
                                <select name="UrunKategori" class="form-control form-control-sm sizefull mt-1 w-full" required>
                                    <option value="" >Kategori Seçiniz</option>
                                    @foreach( $categories  as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>

                        <tr class="small">
                            <th>Beden
                                <select name="UrunBeden" class="form-control form-control-sm sizefull mt-1 w-full">
                                    <option value="">Beden Seçiniz</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <optgroup label="Yaş">
                                        <option value="1Yas">1 Yaş</option>
                                        <option value="2Yas">2 Yaş</option>
                                        <option value="3Yas">3 Yaş</option>
                                        <option value="4Yas">4 Yaş</option>
                                        <option value="5Yas">5 Yaş</option>
                                        <option value="5+Yas">5+ Yaş</option>
                                        <option value="10+Yas">10+ Yaş</option>
                                    </optgroup>

                                </select>
                            </th>
                        </tr>
                        <tr class="small">
                            <th>Renk
                                <input type="text" name="UrunRenk" class="form-control form-control-sm sizefull mt-1 w-full border">
                            </th>
                        </tr>
                        <tr class="small">
                            <th>Kaç Lokum ?
                                <select name="UrunLokum" class="form-control form-control-sm" required>
                                    <option value="">Seçim Yapınız </option>

                                    @for($i = 1;$i <= 10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor

                                </select>
                                <p class="small mt-2">* Değerlendirme yapıldıktan sonra satışta olacaktır.</p>
                            </th>

                        </tr>

                    </table>
                </div>
                <!-- Ürün Görsel Yükle-->
                <div class="col-lg-4 p-t-40 p-b-50 text-center border rounded border-gray">
                    <div class="card bg-basic">
                        <div class="card-body text-center ">
                            <p class="card-text text-danger small">Ürün Görseli Yükleyiniz</p>

                        </div>
                        <input type="file" name="image" class="p-1 form-control form-control-file form-control-sm small" >
                    </div>
                    <br>
                    <div class="card bg-basic">
                        <div class="card-body text-center">
                            <p class="card-text text-danger small">Kargo Ücretini Kim Ödeyecek ?</p>
                            <hr>
                            <table class="table small">
                                <tr class="small">
                                    <th>
                                        Ödeme
                                        <select name="KargoOdeme" class="form-control small form-control-sm">
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Satıcı">Satıcı</option>
                                            <option value="Alıcı">Alıcı</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr class="small">
                                    <th >Nereden Kargolayacaksın?
                                        <select name="KargoNereden" class="form-control form-control-sm">
                                            <option value="">Seçim Yapınız</option>
                                            <option value="istanbul'dan">İstanbul</option>
                                            <option value="istanbul dışından">İstanbul Dışı</Option>
                                        </select>
                                    </th>
                                </tr>
                                <tr class="small">
                                    <th>Gönderim Alanı
                                        <select name="UrunGonderimAlani" class="form-control form-control-sm">
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Şehir içine">Şehir İçi</option>
                                            <option value="Tüm Türkiye'ye">Tüm Türkiye</option>
                                        </select>
                                    </th>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <button type="submit" name="UrunKaydet" class="btn  form-control mt-2 text-white" style="background-color: #FF5722">Ekle</button>
                </div>

            </div>
        </form>
    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
