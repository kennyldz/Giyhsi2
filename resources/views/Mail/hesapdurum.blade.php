@component('mail::message')
# Hesabın ile ilgili değişiklik var!

Merhaba <strong>{{$data['name']}}</strong>

@if($data['durum']!=NULL)
@component('mail::table')
<table>
<tr><td>Hesap Durumunuz</td><td>{{$data['durum']}}</td></tr>
</table>
@endcomponent
@endif

@if($data['lokum']!=NULL)
Hesabınıza
@component('mail::table')
<table>
<tr><td>+<strong>{{$data['lokum']}}</strong> lokum tanımlanmıştır.</td></tr>
</table>
@endcomponent
@endif
Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
