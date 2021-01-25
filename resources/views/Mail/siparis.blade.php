@component('mail::message')
# Yeni sipariş bilgilendirme

Merhaba {{$data['UserName']}};
<div class="row bg-light m-3 p-2 border">
    <div class="col-sm-5">
        <div class="d-flex">
            <div style="font-size:.70rem!important;" >
                <img class="header-cart-item-img rounded" src="http://giyshi.com/{{$data['ProductImage']}}" >
            </div>
            <div >
                <strong >{{$data['ProductName']}}</strong>
            </div>
        </div>
    </div>
</div>
  isimli ürününüz askıdan alınmıştır.Lütfen sisteme giriş yapıp siparişi hazırlayınız.

@component('mail::button', ['url' => 'http://giyshi.com/kullanici/hesabim/istekler'])
Gelen İstekler
@endcomponent

Teşekkürler,<br>

@endcomponent
