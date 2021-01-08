@extends('front.layouts.master')
@section('title','Giriş Yap')
@section('content')
    <section class=" flex-col-c-m p-3" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h5 class="m-text2 t-center text-white">
            Hesap oluştur ve parasız alışverişe başla!
        </h5><br>
        <a href="{{'uyeol'}}" class="flex-c-m  trans-0-4 text-white " style="width:100px;height:40px;background-color: #FF5722"><strong>Üye Ol</strong></a>
    </section>
    <section class="bgwhite p-t-40 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-2 p-b-30 block2-img wrap-pic-w of-hidden pos-relative">

                </div>
                <!-- Uye Girişi -->
                <div class="col-md-8 p-b-30">

                        @if($errors->any())
                        <div class="alert alert-danger rounded shadow1">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li >{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                            <h4 class="section-title  text-center mt-3 mb-2 text-black-50">Giriş Yap</h4>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                E-Mail Adresiniz
                <div class="bo4 of-hidden size15 m-b-20">

                    <x-jet-input id="email"  class="sizefull mt-1 w-full " type="email"  name="email" :value="old('email')"  required autofocus />
                </div>
                Şifre
                <div class="bo4 of-hidden size15 m-b-20">

                    <x-jet-input id="password"  class="sizefull mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Beni Hatırla') }}</span>
                    </label>
                </div>

                <div class="flex text-right justify-end mt-4">

                    <x-jet-button class="ml-10 " style="background-color: #FF5722">
                        {{ __('Giriş Yap') }}
                    </x-jet-button>
                </div>
            </form>
                </div>
                <div class="col-md-2 p-b-30 block2-img wrap-pic-w of-hidden pos-relative">

                </div>

            </div>
        </div>
    </section>
@endsection
