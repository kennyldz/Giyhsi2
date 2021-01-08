@extends('front.layouts.master')
@section('title','Bildirim')
@section('content')
    <!-- İletişim formu üst Görsel -->
    <section class=" p-3" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h1 class="l-text2 t-center ">
            UYARI
        </h1>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
             <div class="col-lg-12 col-md-12 text-center s-text4">
                 <i class="fa fa-warning text-warning fa-2x"></i>
                 <p>
                     Merhaba <strong>{{Auth::user()->name}}</strong> ; <br> üyeliğiniz kısıtlanmıştır.
                 </p>
                 <p class="mt-2">detaylı bilgi için <strong style="text-transform: none">info@giyshi.com</strong> adresi ile iletişime geçiniz.</p>
             </div>
            </div>
        </div>
    </section>



@endsection
