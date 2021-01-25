@extends('front.layouts.master')
@section('title','Lokum İşlem Geçmişi')
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
                <!--Lokum geçmişi -->
              <div class="row">
                  <div class="col-lg-12 small ">
                      @foreach($Delights as $delight)
                      <div class="card-group  shadow1 rounded p-1 mb-3 ">
                          <div class="card border-0 "><div class="card-body m-text15 "><p class="text-uppercase pb-3" style="font-size: 0.6rem"><strong >İşlem No.</strong></p><span style="font-size:2rem;font-weight: 200;line-height:2rem;color: #8c8c8c">{{$delight->id}}</span></div></div>
                          <div class="card border-0 text-center"><div class="card-body  m-text11 bg-light"><p class="text-uppercase" style="font-size: 0.6rem"><strong>Lokum</strong></p><span style="font-size:2.3rem;font-weight: 200;line-height:2.3rem;color: #8c8c8c">{{$delight->amount}}</span><br><i class="fa fa-cube text-danger"></i></div></div>
                          <div class="card border-0 "><div class="card-body"><p class="text-uppercase" style="font-size: 0.6rem"><strong>İşlem Detayı</strong></p>{{$delight->detail}}</div></div>
                          <div class="card border-0 "><div class="card-body"><p class="text-uppercase" style="font-size: 0.6rem"><strong>İşlem Tarihi</strong></p>{{$delight->created_at}}</div></div>
                      </div>
                      @endforeach
                      @if(count($Delights)==0)
                     <div class="card text-center border-0"><div class="card-body">İşlem Geçmişiniz Bulunmamaktadır.</div></div>
                     @else
                    <div class="card p-3 text-center">
                        <!-- Pagination -->
                        <div class="pagination">
                            {{$Delights->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                     @endif
                  </div>
              </div>
                </div>
            </div>
        </div>
    </section>
@endsection
