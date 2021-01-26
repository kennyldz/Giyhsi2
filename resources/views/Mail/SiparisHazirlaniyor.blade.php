@component('mail::message')
# Sipariş Bilgilendirme

Merhaba <strong>{{$data['SiparisHazirlaniyor']->name}}</strong>,

<strong>Önemli Bilgilendirme</strong><br>
<p>Satıcının ürünü kargo şirketine evinden kurye ile teslim etmesi durumunda kargo bedeline ek bir fiyat farkı çıkmaktadır.</p>
<p><strong>Tüm bu süreçlerden ve ortaya çıkacak olan kargo bedelinden giyshi.com sorumlu değildir.</strong></p>

@component('mail::table')
<table>
<tr>
<td colspan="2" style="text-align: center;height: 80px;text-transform: uppercase">
<strong style="font-size:1.4rem">Ürününüz Hazırlanıyor</strong>
</td>
</tr>
<tr>
<td ><img alt="siparis" class="header-cart-item-img rounded" width="100" height="100" src="http://giyshi.com/{{$data['SiparisHazirlaniyor']->image}}" ></td>
<td>
 <table>
<tr>
<td>Sipariş No</td><td><strong>#1{{$data['SiparisHazirlaniyor']->id}}</strong></td>
</tr>
<tr>
<td>Sipariş Tarihi</td><td>{{$data['SiparisHazirlaniyor']->created_at}}</td>
</tr>
<tr>
<td>İşlem Tarihi</td><td>{{$data['SiparisHazirlaniyor']->updated_at}}</td>
</tr>
</table>
</td></tr>
</table>
@endcomponent
<p>Siparişiniz kargoya verildikten sonra tarafınıza bilgilendirme yapılacaktır.
İyi günler dileriz.</p>
{{ config('app.name') }}
@endcomponent
