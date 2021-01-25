@component('mail::message')
# Ürünün Teslim Edildi!

Merhaba <strong>{{$data['Username']}}</strong>

<div class="row ">
<div class="col-lg-12 text-center"><img src="http://giyshi.com/{{asset('/front')}}/images/icons/lokum.png"></div>
<div class="col-lg-12 text-center "><strong>#1{{$data['OrderID']}}</strong> numaralı siparişi alıcınız teslim aldığını onaylamıştır.</div>
</div>
<hr>
<div class="row">
<div class="col-lg-12 text-center">
Hesabınıza +<strong style="font-size:1.2rem">{{$data['Price']}}</strong> Lokum tanımlaması yapılmıştır.
</div>
<hr>
<div class="col-lg-12 text-center" >Keyifli günlerde kullanmanız dileğimizle.</div>
<div class="col-lg-12 text-center">İyi günler dileriz,<br>
    {{ config('app.name') }}</div>
</div>
<br>



@endcomponent
