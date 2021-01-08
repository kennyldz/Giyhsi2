@component('mail::message')
# Sipariş İptal Edildi

Merhaba <strong>{{$data['Siparisiptal']->name}}</strong>

<div class="row ">
    <div class="col-lg-12 text-center"><img src="{{asset('/front')}}/images/icons/lokum.png"></div>
    <div class="col-lg-12 text-center "><strong>#1{{$data['Siparisiptal']->id}}</strong> numaralı sipariş alıcı tarafından iptal edilmiştir.</div>
</div>
<div class="row">
   <div class="col-sm-8">
       <img class="header-cart-item-img rounded"  height="100" width="100" src="http://localhost:8000/{{$data['Siparisiptal']->image}}" >
       <table class="table">
           <tr><td>Ürün Adı</td></tr>
           <tr><td>{{$data['Siparisiptal']->title}}</td></tr>
           <tr><td>İşlem Tarihi</td></tr>
           <tr><td>{{$data['Siparisiptal']->updated_at}}</td></tr>
       </table>
   </div>

</div>

<p>Ürününüz tekrar satışa çıkartılmıştır.</p>

Keyifli alışverişler,<br>
{{ config('app.name') }}
@endcomponent
