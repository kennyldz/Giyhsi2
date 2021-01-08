
<!-- Footer -->
<!-- Footer -->
<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Bize Ulaşın
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    E-Mail : info@giyshi.com
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

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Kategoriler
            </h4>

            <ul>
                @foreach($categories as $category)
                    <li class="p-b-9">
                        <a href="{{route('Kategori',$category->slug)}}" class="s-text7">
                            {{$category->name}}
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon5">
            <h4 class="s-text12 p-b-30">
                Linkler
            </h4>

            <ul>


                <li class="p-b-9">
                    <a href="/iletisim" class="s-text7">
                        İletişim
                    </a>
                </li>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Nasıl Alışveriş Yapabilirim ?
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Sık Sorulan Sorular
                    </a>
                </li>

            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Hesap
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="{{asset('kullanici/hesabim')}}" class="s-text7">
                        Hesabım
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="{{asset('kullanici/hesabim')}}" class="s-text7">
                        Sepetim
                    </a>
                </li>

            </ul>
        </div>


        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Parasız Alışveriş için hemen kullanmaya başla!
            </h4>
        </div>

    </div>

    <div class="t-center p-l-15 p-r-15">
        <img src="{{asset('front/')}}/images/icons/logo.png" alt="IMG-LOGO" width="90">

        <div class="t-center s-text8 p-t-20">
            2021 Copyright © | All rights reserved. | {{config('app.name')}} - {{date('Y')}}
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>


<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/bootstrap/js/popper.js"></script>
<script type="text/javascript" src="{{asset('front/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/select2/select2.min.js"></script>
<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });
</script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/slick/slick.min.js"></script>
<script type="text/javascript" src="{{asset('front/')}}/js/slick-custom.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/sweetalert/sweetalert.min.js"></script>


<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('front/')}}/vendor/parallax100/parallax100.js"></script>
<script type="text/javascript">
    $('.parallax100').parallax100();
</script>
<!--===============================================================================================-->
<script src="{{asset('front/')}}/js/main.js"></script>
<!-- Maps için-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKFWBqlKAGCeS1rMVoaNlwyayu0e0YRes"></script>
</body>
</html>

