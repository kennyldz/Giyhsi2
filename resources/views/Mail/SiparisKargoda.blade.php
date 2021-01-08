@component('mail::message')
# Siparişin Kargolandı

Merhaba <strong>{{$data['SiparisKargoda']->name}}</strong>,
@component('mail::table')
<table>
<tr >
<td colspan="4" style="text-align: center;height:80px;text-transform: uppercase"><strong style="font-size:1.4rem">Ürünün Kargoda</strong></td>
</tr>
<tr>
 <tr>
 <td colspan="4"><img class="header-cart-item-img rounded"  height="250" src="http://localhost:8000/{{$data['SiparisKargoda']->image}}" >
 </td>
</tr>
<tr>
<td colspan="4">
<table>
<tr><td ><strong>{{$data['SiparisKargoda']->title}}</strong></td></tr>
<tr><td>Sipariş No</td><td><strong>#1{{$data['SiparisKargoda']->id}}</strong></td></tr>
<tr><td>Kargo Şirketi</td><td><strong>{{$data['KargoAdi']}}</strong></td></tr>
<tr><td>Kar. Takip No</td><td><strong>{{$data['KargoTakip']}}</strong></td></tr>
<tr><td>Adres</td><td>
        <p style="word-break: break-word">{{$data['SiparisKargoda']->address}}</p>
        <p>{{$data['SiparisKargoda']->province}} / {{$data['SiparisKargoda']->district}}</p>
        <p>{{$data['SiparisKargoda']->telephone}}</p>
    </td>
</tr>
</table>
</td>
</tr>
</table>
@endcomponent

Siparişinizi teslim aldıktan sonra <b>Siparişlerim</b> sayfasından "<strong>Ürünü Teslim Aldım</strong>" butonuna tıklayınız.!

@component('mail::button', ['url' => 'localhost:8000/kullanici/hesabim/siparislerim'])
Siparişe Bak
@endcomponent

Keyifli Alışerişler,<br>
{{ config('app.name') }}
@endcomponent
