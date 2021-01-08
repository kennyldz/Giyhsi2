@component('mail::message')
# Şifren Yenilendi

Merhaba <strong>{{$data['name']}}</strong> ;

Şifreniz yenilenmiştir.Bilgileriniz aşağıdaki gibidir;

@component('mail::table')
<table>
    <tr><td>E-Mail</td><td>{{$data['email']}}</td></tr>
    <tr><td>Şifre</td><td>{{$data['password']}}</td></tr>
</table>
@endcomponent
Teşekkürler,<br>
{{ config('app.name') }}
@endcomponent
