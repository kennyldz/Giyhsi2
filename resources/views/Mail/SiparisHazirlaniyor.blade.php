@component('mail::message')
# Sipariş Bilgilendirme

Merhaba <strong>{{$data['SiparisHazirlaniyor']->name}}</strong>,

@component('mail::table')
<table>
<tr>
<td colspan="2" style="text-align: center;height: 80px;text-transform: uppercase">
<strong style="font-size:1.4rem">Ürününüz Hazırlanıyor</strong>
</td>
</tr>
<tr>
<td ><img class="header-cart-item-img rounded" width="100" height="100" src="http://giyshi.com/{{$data['SiparisHazirlaniyor']->image}}" ></td>
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
@endcomponent
