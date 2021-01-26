@component('mail::message')
# Yeni sipariş bilgilendirme

Merhaba {{$data['UserName']}};
<br>
<p>Ürününüz askıdan alınmıştır.Lütfen sisteme giriş yapıp siparişi hazırlayınız.</p>
<div class="row bg-light m-3 p-2 border">
    <div class="col-sm-5">
        <div class="d-flex">
            <div style="font-size:.70rem!important;" >
                <img class="header-cart-item-img rounded" width="60" height="60" src="http://giyshi.com/{{$data['ProductImage']}}" alt="siparis" >
            </div>
            <div >
                <strong >&nbsp;&nbsp;{{$data['ProductName']}}</strong>
            </div>
        </div>
    </div>
</div>

<strong>Önemli Bilgilendirme</strong><br>
<p>Ürününüzü size en yakın kargo şubesinden gönderebilir veya evden teslim alan kargo şirketleri ile
evinizden teslim edebilirsiniz. Evinizden teslim etmeniz durumunda kargo bedeline ek bir fiyat farkı çıkmaktadır.Aşağıdaki kargo şirketlerinden evinize kurye talebinde bulunabilirsiniz. </p>
<ul>
<li>
<strong>Yurtiçi Kargo</strong>
<p>( 444 99 99 ) numaralı telefondan  gün içerisinde saat 11:00'a kadar kurye talebinde bulunmanız halinde o gün içerisinde en yakın şubeden kargonuz evinizden teslim alınacaktır . Saat 11:00'dan sonra yapılan talepler bir sonraki güne kalmaktadır. Evden teslim  alımlarında  paket fiyatına ilave olarak en az 9-10 TL artı fiyat  eklemesi yapılmaktadır.</p>
</li>
<li>
<strong>Aras Kargo</strong>
<p>( 444 25 52 ) numaralı telefondan  gün içerisinde saat 15:00'a kadar kurye talebinde bulunmanız halinde o gün içerisinde en yakın şubeden kargonuz evinizden teslim alınacaktır . Saat 15:00'dan sonra yapılan talepler bir sonraki güne kalmaktadır. Evden teslim  alımlarında  paket fiyatına ilave olarak en az 9-10 TL artı fiyat  eklemesi yapılmaktadır.</p>
</li>
<li>
<strong>Mng Kargo</strong>
<p>( 444  06 06 ) numaralı telefondan  gün içerisinde saat 15:00'a kadar kurye talebinde bulunmanız halinde o gün içerisinde en yakın şubeden kargonuz evinizden teslim alınacaktır . Saat 15:00'dan sonra yapılan talepler bir sonraki güne kalmaktadır. Evden teslim  alımlarında  paket fiyatına ilave olarak en az 9-10 TL artı fiyat  eklemesi yapılmaktadır.</p>
</li>
<li>
    <p>Diğer şirketler ile ilgili web sitelerinden bilgi alabilirsiniz.<strong>Tüm bu süreçlerden giyshi.com sorumlu değildir.</strong></p>
</li>
</ul>
@component('mail::button', ['url' => 'http://giyshi.com/kullanici/hesabim/istekler'])
Gelen İsteklerim
@endcomponent

Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
