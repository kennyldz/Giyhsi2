@extends('front.layouts.master')
@section('title','İletişim')
@section('content')

    <section class=" p-3" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h1 class="l-text2 t-center ">
            iletişim
        </h1>
    </section>

    <!-- content page -->
    <section class="bgwhite p-t-66 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-b-30">
                    <div class="p-r-20 p-r-0-lg">

                        <h4 class="m-text26 p-b-36 p-t-15">İletişim Bilgileri</h4>
                      <div>
                          <p class="s-text7 w-size27">
                              E-Mail : info@giyshi.com
                          </p>
                          <p class="s-text7 w-size27">
                              Telefon :
                          </p>
                          <p class="p-b-9">Sosyal medyadan bizi takip edebilirsiniz</p>
                          <div class="flex-m p-t-30">
                              <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                              <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                              <a href="#" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                              <a href="#" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                              <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                          </div>
                      </div>
                    </div>
                </div>

                <div class="col-md-6 p-b-30">
                    <!--Eğer gönderim gerçekleşmiş ise -->
                    @if(session('success'))
                    <div class="alert-success">
                        {{session('success')}}
                    </div>
                    @endif
                    <!-- Girilen alanların kontrolü eğer validate eerror var ise -->
                    @if($errors->any())
                            <div class="alert-danger">
                              <ul class="list-group">
                                  @foreach($errors->all() as $error)
                                      <li class="list-group-item">{{$error}}</li>
                                  @endforeach
                              </ul>
                            </div>
                     @endif
                    <form class="leave-comment" method="post" action="{{route('contact.post')}}">
                        @csrf
                        <h4 class="m-text26 p-b-36 p-t-15">
                            Bize Yazın!
                        </h4>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="{{old('name')}}" name="name" placeholder="Adınız & Soyadınız" required>
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="{{old('phone')}}"  name="phone" placeholder="Telefon No(isteğe bağlı)" maxlength="10">
                        </div>

                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text"  value="{{old('email')}}" name="email" placeholder="Email Adresiniz" required>
                        </div>
                        <div class="bo4 of-hidden size15 m-b-20">
                            <input class="sizefull s-text7 p-l-22 p-r-22" type="text"  value="{{old('topic')}}" name="topic" placeholder="Konu" required>
                        </div>
                        <textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20"  name="message" placeholder="Mesajınız" required>{{old('message')}}
                        </textarea>

                        <div class="w-size25">
                            <!-- Button -->
                            <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
                                Gönder
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection
