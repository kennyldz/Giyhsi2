@component('mail::message')
# İletişim Cevap

Merhaba <strong>{{$data['name']}}</strong>

<strong>{{$data['topic']}}</strong> başlıklı mesajınız cevaplandı.

@component('mail::table')
<table>
<tr><td>Oluşturma Tarihi</td><td>{{$data['created_at']}}</td></tr>
<tr><td>Mesajınız</td><td>{{$data['message']}}</td></tr>
<tr><td>Cevap</td><td>{{$data['reply']}}</td></tr>
</table>
@endcomponent

Teşekürler,<br>
{{ config('app.name') }}
@endcomponent
