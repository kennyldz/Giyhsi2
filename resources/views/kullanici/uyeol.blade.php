@extends('front.layouts.master')
@section('title','Üye Ol')
@section('content')
    <section class="flex-col-c-m p-3" style="background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)">
        <h5 class="m-text2 t-center text-white">
            Hesabınızı görüntülemek ve Alışverişinizi tamamlamak için,
        </h5><br>
        <a href="{{'giris'}}" class="flex-c-m   text-white" style="width:100px;height:40px;background-color: #FF5722"><strong>Giriş Yap</strong></a>
    </section>
    <section class="bg-white p-t-66 p-b-60 ">
<div class="container">
    <div class="row">
        <div class="col-md-2 p-b-30 block2-img wrap-pic-w of-hidden pos-relative">

        </div>
        <!-- Uye Ol-->
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
                <h4 class="section-title  text-center mt-3 mb-2 text-black-50">Üye Ol</h4>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                *Adınız-Soyadınız
                <div class="bo4 of-hidden size15 m-b-20">
                    <!--<x-jet-label for="name" value="{{ __('') }}" />-->
                    <x-jet-input id="name" class="sizefull mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>

                *E-Mail Adresiniz
                <div class="bo4 of-hidden size15 m-b-20">
                   <!-- <x-jet-label for="email" value="{{ __('') }}" />-->
                    <x-jet-input id="email" class="sizefull mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                *Şifre
                <div class="bo4 of-hidden size15 m-b-20">
                  <!--  <x-jet-label for="password" value="{{ __('') }}" /> -->
                    <x-jet-input id="password" class="sizefull mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                *Şifreyi Onayla
                <div class="bo4 of-hidden size15 m-b-20">
                   <!-- <x-jet-label for="password_confirmation" value="{{ __('') }}" />-->
                    <x-jet-input id="password_confirmation" class="sizefull mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                <div class="flex text-right justify-end mt-4">

                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('kullanici.Userlogin') }}">
                                {{ __('Zaten  Üye misiniz ?') }}
                    </a>

                    <x-jet-button  style="background-color: #FF5722">
                        {{ __('Üye Ol') }}
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
