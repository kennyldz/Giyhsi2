@extends('front.layouts.master')
@section('title','Sık Sorulan Sorular')
@section('content')
    <section class=" p-t-10 p-b-10 flex-col-c-m" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h2 class="l-text2 t-center">
            Sık Sorulan Sorular
        </h2>
    </section>
    <section class="cart bg-light p-t-70 p-b-100">
        <div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card text-center border-0 bg-light">
                        <div class="card-body">
                            <i class="fa fa-question-circle fa-4x text-danger"></i>
                        </div>
                    </div>
                </div>
              <div class="col-lg-8 col-md-12">
                  <div class="card">
                      <div class="card-body">
                          <ul class="p-2">
                              <li class="p-2" ><h4><strong>Üyelik ücretli mi?</strong></h4>
                                  <p>giyshi.com’a üye olmak ücretsizdir.</p> </li>
                              <li class="p-2">
                                  <h4><strong>Nasıl üye olabilirim?</strong></h4>
                                  <p>giyshi.com'a üye olmak için  ‘Giriş Yap’ seçeneğine  tıklayarak kayıt olduktan sonra, açılan sayfadaki ilgili alanları doldurmanız yeterlidir.</p>
                              </li>
                              <li class="p-2">
                                  <h4><strong>Nasıl alışveriş yapabilirim?</strong></h4>
                              <p>Yeterli lokumunuz olması durumunda ilgili kategorilerden ürün bilgisinin altında bulunan 'Satın Al' , ya da ürün detay sayfasından 'Satın Al' butonuna tıklayıp  alışverişinizi tamamlayabilirsiniz.</p>
                              </li>
                              <li class="p-2">
                                  <h4><strong>Nasıl ürün yüklerim?</strong></h4>
                              <p>Giriş yaptıktan sonra kullanıcı sayfanızdan 'Ürün Yükle' menüsüne girip yüklemek istediğiniz ürüne ait ilgili bilgileri
                              girebilirsiniz. Ürününüz onaylandıktan sonra seçmiş olduğunuz kategoride satışa çıkartılacaktır.</p>
                              </li>
                              <li class="p-2">
                                  <h4><strong>Nasıl lokum kazanabilirim?</strong></h4>
                              <p>İlk üyeliğinize özel hediye lokumlarınızı kullanabilir, yaptığınız satışlardan lokum kazanabilirsiniz.</p>
                              </li>
                              <li class="p-2">
                               <h4><strong>Kargo'yu kim öder?</strong></h4>
                                  <p>Ürünü yükleyen kişi kargo ücreti seçeneği kendisi olarak veya alıcı olarak seçebilir.
                                  <b>Satıcının kargoyu evinden aldırması durumunda kargo ücretine ek olarak bir fiyat çıkabilir. </b>
                                  Tüm bu süreçlerden ve ortaya çıkacak olan fiyat farklarından  giyshi.com sorumlu değildir.
                                  </p>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>

            </div>
        </div>
    </div>
        </div>

    </section>
@endsection
