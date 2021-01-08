@extends('front.layouts.master')
@section('title','Profilim')
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
                <div class="col-sm-3 col-md-4 p-2 col-lg-3 p-b-50 rounded shadow1 bg-white " style="height: 250px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active " id="v-pills-home-tab"  href="{{route('kullanici.account')}}"  aria-selected="false">Hesabım</a>
                        <a class="nav-link "  href="{{route('kullanici.Orders')}}" aria-selected="true">Siparişler</a>
                        <a class="nav-link"   href="{{route('kullanici.ProductAdd')}}"  aria-selected="false">Ürün Yükle</a>
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
                <!-- Profilim-->
                    <div class="container">
                        <strong class="card-title text-uppercase p-2">Profilim </strong>
                        <form method="post" action="{{route('kullanici.Profile.Update')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">

                            <div class="col-lg-3 col-md-12 ">
                                <div class="card text-center p-2 shadow1 rounded border-0">
                                    <div class="card-body ">
                                        @if(!empty($Profilim->profile_photo_path))
                                            <img
                                                src="{{asset('front')}}/images/icons/{{$Profilim->profile_photo_path}}"
                                                alt="user" class="rounded" width="80"
                                                height="80" /><br>

                                        @else
                                            <img src="{{asset('front/')}}/images/icons/user.png" height="40" width="35" class="header-icon1 rounded" >
                                        @endif
                                        <input type="file" name="ProfilePhoto" class=" p-2 form-control-file mt-2 small form-control-sm" style="font-size:9px">
                                    </div>
                                </div>
                                <div class="card mt-2 mb-2">

                                    <button type="submit" class="btn btn-default btn-sm form-control" name="UserUpdate" value="{{$Profilim->id}}">Güncelle</button>

                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">

                                    <div class="card shadow1 rounded border-0">
                                        <div class="card-body">
                                            <table class="table table-sm small">
                                               <tr><td>Ad-Soyad</td><td><input type="text" name="Name" maxlength="19" class="form-control border form-control-sm" value="{{$Profilim->name}}"></td></tr>

                                                <tr><td>E-Mail</td><td>{{$Profilim->email}}</td></tr>
                                                <tr><td>Üyelik Tarihi</td><td>{{$Profilim->created_at}}</td></tr>
                                            </table>
                                        </div>
                                    </div>

                            </div>

                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection
