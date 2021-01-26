@component('mail::message')
# Sipariş İptal Edildi

Merhaba <strong>{{$data['Siparisiptal']->name}}</strong>

<div class="row ">
    <strong class="text-center">Bilgilendirme</strong>
    <div class="col-lg-12 text-center "><strong>#1{{$data['Siparisiptal']->id}}</strong> numaralı sipariş alıcı tarafından iptal edilmiştir.</div>
</div>
<div class="row bg-light m-3 p-2 border">
    <div class="col-sm-5">
        <div class="d-flex">
            <div style="font-size:.70rem!important;" >
                <img class="header-cart-item-img rounded" width="60" height="60" src="http://giyshi.com/{{$data['Siparisiptal']->image}}" alt="siparis" >
            </div>
            <div >
                <strong >&nbsp;&nbsp;{{$data['Siparisiptal']->title}}</strong><br>
                <p>&nbsp;&nbsp;{{$data['Siparisiptal']->updated_at}}</p>
            </div>
        </div>
    </div>
</div>

<p>Ürününüz tekrar satışa çıkartılmıştır.</p>

Keyifli alışverişler,<br>
{{ config('app.name') }}
@endcomponent
