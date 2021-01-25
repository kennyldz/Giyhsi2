@extends('front.layouts.master')
@section('title','Adreslerim')
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

    <section class="bg-light p-t-40 p-b-65">
        <div class="container">
            <div class="row">
                <!--Kullanıcı Menu -->
                <div class="col-sm-3 col-md-4 col-lg-3 p-2 mt-2 mb-2  bg-white shadow1 rounded" style="height: 150px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-tab"  href="{{route('kullanici.account')}}" aria-selected="true">Hesabım</a>
                        <a class="nav-link" id="v-pills-profile-tab"  href="{{route('kullanici.Orders')}}"  aria-selected="false">Siparişlerim</a>
                        <a class="nav-link"  href="{{route('kullanici.ProductAdd')}}"  aria-selected="false">Ürün Yükle</a>
                    </div>
                </div>

                <!-- Kullanıcı Ana Sayfa-->
                <div class="col-sm-9 col-md-8 col-lg-9 p-b-50 ">
                    <!--Adres geçmişi -->
                    <div class="row">
                        <div class="col-lg-12 small ">

                            <!-- Yeni Adres -->
                            <form method="post" action="{{route('kullanici.adreslerim.store')}}">
                                @csrf
                                <div class="card-group small   rounded p-1 mb-3 ">
                                    <div class="card border-0 ">
                                        <div class="card-body ">
                                            <table class="table table-sm">
                                                <tr>
                                                    <td><input type="text" maxlength="30" name="address_title" placeholder="Adres Adı" class="form-control border form-control-sm" required></td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <button type="submit" style="background-color: #FF5722" class="btn btn-default text-white btn-sm form-control"> Kaydet</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <table class="table table-sm ">
                                                <tr>
                                                    <td><input type="text" maxlength="60" name="address_name" class="form-control form-control-sm" value="{{Auth::user()->name}}" placeholder="Adınız Soyadınız"></td>
                                                </tr>
                                                <tr>
                                                    <td> <input type="text" pattern="[1-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" name="address_telephone" class="form-control form-control-sm" placeholder="Telefon"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <table class="table table-sm ">
                                                <tr><td colspan="2"><textarea class="form-control form-control-sm" name="address" placeholder="Adres" required></textarea></td></tr>
                                                <tr>
                                                    <td><input type="text" name="address_province" class="form-control form-control-sm" placeholder="İl" required></td>
                                                    <td><input type="text" name="address_district" class="form-control form-control-sm" placeholder="İlçe" required></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </form>


                            @foreach($adress as $adres)

                            <form method="post" action="{{route('kullanici.adreslerim.update',$adres->id)}}">
                              @method('PUT')
                                @csrf
                                <div class="card-group shadow1  rounded p-1 mb-3 ">
                                    <div class="card border-0 ">
                                        <div class="card-body ">
                                            <table class="table table-sm">
                                                <tr >
                                                    <td  class="small">Adres Adı</td><td><input type="text" maxlength="30" name="address_title" class="form-control border form-control-sm" value="{{$adres->address_name}}"></td>
                                                </tr>
                                                <tr>
                                                    <td >
                                                        <button type="submit"  class="btn btn-default btn-sm form-control"><i class="fa fa-edit"></i> Güncelle</button>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="{{route('kullanici.adreslerim.destroy',$adres->id)}}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-default btn-sm form-control"><i class="fa fa-trash"></i> Sil</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <table class="table table-sm ">
                                                <tr>
                                                    <td><input type="text" maxlength="60" name="address_name" class="form-control form-control-sm" value="{{$adres->name}}"></td>
                                                </tr>
                                                <tr>
                                                    <td> <input type="text" pattern="[1-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" name="address_telephone" class="form-control form-control-sm" value="{{$adres->telephone}}"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="card-body">
                                            <table class="table table-sm ">
                                                <tr><td colspan="2"><textarea class="form-control form-control-sm" name="address">{{$adres->address}}</textarea></td></tr>
                                                <tr>
                                                    <td><input type="text" name="address_province" class="form-control form-control-sm" value="{{$adres->address_province}}"></td>
                                                    <td><input type="text" name="address_district" class="form-control form-control-sm" value="{{$adres->address_district}}"></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                <div class="card border-0 mb-3">
                                    <div class="card-body ">
                                        <p class="small"><i class="fa fa-warning text-warning"></i> Adresiniz ile ilgili değişiklik yapmak için değiştirmek istediğiniz alanların üzerine tıklayıp
                                            güncelledikten sonra yaptıktan sonra <b>Güncelle</b> butonuna tıklayınız.</p>
                                    </div>
                                </div>
                            </form>


                            @endforeach
                                <div class="card p-3 text-center bg-light border-0">
                                    <!-- Pagination -->
                                    <div class="pagination">
                                        {{$adress->links("pagination::bootstrap-4")}}
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
