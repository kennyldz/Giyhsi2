@extends('front.layouts.master')
@section('title','Ürün Yükle')
@section('content')
    <section class="flex-col-c-m text-white " style="font-size:.75rem!important;background-image: linear-gradient(68deg, #1e8eba, #ee9887 99%)" >
        <strong>Merhaba {{Auth::User()->name}}</strong>
        <div  data-ride="carousel" style="background-color: #e65540;border-radius: 5px"  >
            <div class="carousel-item active">
                <table class="text-white " >
                    <tr>
                        <td style="padding: 20px 20px 20px 20px"><span class="fa fa-shopping-cart fa-3x"></span>&nbsp;</td><td><strong>Avantajlı</strong>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="carousel-item">
                <table class="text-white " >
                    <tr>
                        <td style="padding: 20px 20px 20px 20px "><span class="fa fa-credit-card-alt fa-3x"></span>&nbsp;</td><td><strong>Parasız</strong>&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="carousel-item">
                <table class="text-white " >
                    <tr>
                        <td style="padding: 20px 20px 20px 20px "><span class="fa fa-get-pocket fa-3x"></span>&nbsp;</td><td><strong>Güvenli</strong>&nbsp;</td>
                    </tr>
                </table>
            </div>

        </div>
        Alışveriş deneyimine hoşgeldin.
    </section>

    <section class="bg-light p-t-55 p-b-65">
        <div class="container">
            <div class="row">
                <!--Kullanıcı Menu -->
                <div class="col-sm-3 col-md-4 col-lg-3 mb-2 p-2 p-b-50 rounded shadow1 bg-white " style="height: 150px">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link " id="v-pills-home-tab"  href="{{route('kullanici.account')}}"  aria-selected="false">Hesabım</a>
                        <a class="nav-link "   href="{{route('kullanici.Orders')}}"  aria-selected="true">Siparişlerim</a>
                        <a class="nav-link active"   href="{{route('kullanici.ProductAdd')}}"  aria-selected="false">Ürün Yükle</a>

                    </div>
                </div>

                <!-- Kullanıcı Ana Sayfa-->
                <div class="col-sm-9 col-md-8 col-lg-9 p-b-50">
                    <!--Eğer gönderim gerçekleşmiş ise -->
                    @if(session('success'))
                        <div class="alert-success p-2">
                            <i class="fa fa-check-circle"> </i><strong> {{session('success')}}</strong>
                        </div>
                    @endif
                <!--eğer hata var ise-->
                    @if(session('error'))
                        <div class="alert-danger p-2">
                            <i class="fa fa-warning"> </i><strong> {{session('error')}}</strong>
                        </div>
                    @endif
                <!-- Girilen alanların kontrolü eğer validate eerror var ise -->
                    @if($errors->any())
                        <div class="alert-danger p-2">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item">{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif
<!--Ürün Yükle -->
<div class="container">
        <form method="post" action="{{route('kullanici.Create.Product')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-8  shadow1 rounded bg-white mb-2">
                    <table class="table table-sm p-3 pt-2   ">
                        <tr class="small">
                            <th title="Doldurulması Zorunlu Alan" >
                               Ürün Adı *
                                <input type="text" name="UrunAdi" class="form-control form-control-sm sizefull mt-1 w-full border" required>
                            </th>
                        </tr>
                        <tr class="small">
                            <th title="Doldurulması Zorunlu Alan" >
                               Ürün Açıklaması *
                                <textarea type="text" name="UrunAciklama" class="form-control form-control-sm border"  required></textarea>
                            </th>
                        </tr>
                        <tr class="small">
                            <th>
                                Ürün Ek Bilgi
                                <textarea name="UrunEkBilgi" class="form-control form-control-sm border" ></textarea>
                            </th>
                        </tr>
                        <tr class="small">
                            <th title="Doldurulması Zorunlu Alan">
                               Kategori *
                                <select name="UrunKategori" class="form-control form-control-sm sizefull mt-1 w-full" required>
                                    <option value="" >Kategori Seçiniz</option>
                                    @foreach( $categories  as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </th>
                        </tr>

                        <tr class="small">
                            <th>Beden  | <a data-toggle="modal" data-target="#myModal" class="small text-black "> <i class="fa fa-angle-double-right"></i> Beden Tablosu İçin Tıklayınız</a>
                                <select name="UrunBeden" class="form-control form-control-sm sizefull mt-1 w-full">
                                    <option value="">Beden  Seçiniz</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                    <optgroup label="Yaş">
                                        <option value="6 Ay">6 Ay</option>
                                        <option value="9 Ay">9 Ay</option>
                                        <option value="12-18 Ay">12-18 Ay</option>
                                        <option value="18-24 Ay">18-24 Ay</option>
                                        <option value="24-36 Ay">24-36 Ay</option>
                                        <option value="4 Yaş">4 Yaş</option>
                                        <option value="5 Yaş">5 Yaş</option>
                                        <option value="5+ Yaş">5+ Yaş</option>
                                        <option value="10+ Yaş">10+ Yaş</option>
                                        <option value="14+ Yaş">14+ Yaş</option>
                                        <option value="16+ Yaş">16+ Yaş</option>
                                    </optgroup>
                                    <optgroup label="Beden">
                                        @for($i = 24;$i <= 46; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </optgroup>
                                </select>
                            </th>
                        </tr>
                        <tr class="small">
                            <th>Numara
                            <select name="UrunNumara" class="form-control form-control-sm sizefull mt-1 w-full">
                                <option value="">Numara Seçiniz</option>
                                @for($i = 16;$i <= 47; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                            </th>

                        </tr>
                        <tr class="small">
                            <th>Cinsiyet
                        <select name="UrunCinsiyet" class="form-control form-control-sm sizefull mt-1 w-full">
                            <option value="">Cinsiyet Seçiniz</option>
                            <option value="Kadın">Kadın</option>
                            <option value="Erkek">Erkek</option>
                        </select>
                          </th>
                        </tr>
                        <tr class="small">
                            <th>Renk
                                <input type="text" name="UrunRenk" class="form-control form-control-sm sizefull mt-1 w-full border">
                            </th>
                        </tr>
                        <tr class="small">
                            <th title="Doldurulması Zorunlu Alan">Kaç Lokum ? *
                                <select name="UrunLokum" class="form-control form-control-sm" required>
                                    <option value="">Seçim Yapınız </option>

                                    @for($i = 1;$i <= 10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor

                                </select>
                                <p class="small mt-2">* Değerlendirme yapıldıktan sonra satışta olacaktır.</p>
                            </th>

                        </tr>

                    </table>
                </div>
                <!-- Ürün Görsel Yükle-->
                <div class="col-lg-4 p-b-50 text-center  rounded ">
                    <div class="card bg-basic shadow1">
                        <div class="card-body text-center ">
                            <p class="card-text text-danger small">Ürün Görseli Yükleyiniz *</p>

                        </div>
                        <input type="file" name="image" class="p-1 form-control form-control-file s-text3 form-control-sm small" required>
                    </div>
                    <br>
                    <div class="card bg-basic">
                        <div class="card-body text-center shadow1">
                            <p class="card-text text-danger small">Kargo Ücretini Kim Ödeyecek ?</p>
                            <hr>
                            <table class="table small">
                                <tr class="small">
                                    <th title="Doldurulması Zorunlu Alan">
                                        Ödeme *
                                        <select name="KargoOdeme" class="form-control small form-control-sm" required>
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Satıcı">Satıcı</option>
                                            <option value="Alıcı">Alıcı</option>
                                        </select>
                                    </th>
                                </tr>
                                <tr class="small">
                                    <th title="Doldurulması Zorunlu Alan" >Nereden Kargolayacaksın? *
                                        <select name="KargoNereden" class="form-control form-control-sm" required>
                                            <option value="">Seçim Yapınız</option>
                                            <option value="istanbul'dan">İstanbul</option>
                                            <option value="istanbul dışından">İstanbul Dışı</Option>
                                        </select>
                                    </th>
                                </tr>
                                <tr class="small">
                                    <th title="Doldurulması Zorunlu Alan">Gönderim Alanı *
                                        <select name="UrunGonderimAlani" class="form-control form-control-sm" required>
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Şehir içine">Şehir İçi</option>
                                            <option value="Tüm Türkiye'ye">Tüm Türkiye</option>
                                        </select>
                                    </th>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <button type="submit" name="UrunKaydet" class="btn  form-control mt-2 text-white" style="background-color: #FF5722">Ekle</button>
                </div>

            </div>
        </form>
    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Beden Tablosu</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="kadin-group">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#K" aria-expanded="false" aria-controls="K" class="collapsed">
                                                Kadın
                                                <span style="float:right" class="fa fa-plus-circle"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="K" class="panel-collapse collapse" role="tabpanel" aria-labelledby="kadin-group" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ÜST GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>XS</th>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                        <th>XL</th>
                                                        <th>XXL</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>78-82</td>
                                                        <td>83-87</td>
                                                        <td>88-92</td>
                                                        <td>93-98</td>
                                                        <td>99-105</td>
                                                        <td>106-112</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>59-63</td>
                                                        <td>64-68</td>
                                                        <td>69-73</td>
                                                        <td>74-79</td>
                                                        <td>80-86</td>
                                                        <td>87-93</td>

                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ELBİSE - TUNİK - TULUM</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>XS</th>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                        <th>XL</th>
                                                        <th>XXL</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>78-82</td>
                                                        <td>83-87</td>
                                                        <td>88-92</td>
                                                        <td>93-98</td>
                                                        <td>99-105</td>
                                                        <td>106-112</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>59-63</td>
                                                        <td>64-68</td>
                                                        <td>69-73</td>
                                                        <td>74-79</td>
                                                        <td>80-86</td>
                                                        <td>87-93</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>87-91</td>
                                                        <td>92-96</td>
                                                        <td>97-101</td>
                                                        <td>102-107</td>
                                                        <td>108-114</td>
                                                        <td>115-121</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ALT GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>XS</th>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                        <th>XL</th>
                                                        <th>XXL</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>59-63</td>
                                                        <td>64-68</td>
                                                        <td>69-73</td>
                                                        <td>74-79</td>
                                                        <td>80-86</td>
                                                        <td>87-93</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>87-91</td>
                                                        <td>92-96</td>
                                                        <td>97-101</td>
                                                        <td>102-107</td>
                                                        <td>108-114</td>
                                                        <td>115-121</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>

                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">JEAN </div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody>
                                                    <tr>
                                                        <th></th>
                                                        <th>24</th>
                                                        <th>25</th>
                                                        <th>26</th>
                                                        <th>27</th>
                                                        <th>28</th>
                                                        <th>29</th>
                                                        <th>30</th>
                                                        <th>31</th>
                                                        <th>32</th>
                                                        <th>33</th>
                                                        <th>34</th>
                                                    </tr>
                                                    <tr></tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>59</td>
                                                        <td>61</td>
                                                        <td>64</td>
                                                        <td>66</td>
                                                        <td>69</td>
                                                        <td>71</td>
                                                        <td>74</td>
                                                        <td>76</td>
                                                        <td>79</td>
                                                        <td>81</td>
                                                        <td>84</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>88</td>
                                                        <td>90</td>
                                                        <td>93</td>
                                                        <td>95</td>
                                                        <td>98</td>
                                                        <td>100</td>
                                                        <td>103</td>
                                                        <td>105</td>
                                                        <td>108</td>
                                                        <td>110</td>
                                                        <td>113</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 30</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 32</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 34</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>

                                                    </tr>

                                                    <tr>
                                                        <td>İç Bacak Boyu 36</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">JEAN </div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>34</th>
                                                        <th>36</th>
                                                        <th>38</th>
                                                        <th>40</th>
                                                        <th>42</th>
                                                        <th>44</th>
                                                        <th>46</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>59-63</td>
                                                        <td>64-68</td>
                                                        <td>69-73</td>
                                                        <td>74-79</td>
                                                        <td>80-86</td>
                                                        <td>87-93</td>
                                                        <td>94-100</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>87-91</td>
                                                        <td>92-96</td>
                                                        <td>97-101</td>
                                                        <td>102-107</td>
                                                        <td>108-114</td>
                                                        <td>115-121</td>
                                                        <td>122-128</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 30</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 32</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 34</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>

                                                    </tr>

                                                    <tr>
                                                        <td>İç Bacak Boyu 36</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>

                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="erkek-group">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#E" aria-expanded="false" aria-controls="E">
                                                Erkek  <span style="float:right" class="fa fa-plus-circle"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="E" class="panel-collapse collapse" role="tabpanel" aria-labelledby="erkek-group" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ÜST GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>XS</th>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                        <th>XL</th>
                                                        <th>XXL</th>
                                                        <th>XXXL</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>87-91</td>
                                                        <td>92-96</td>
                                                        <td>97-101</td>
                                                        <td>102-106</td>
                                                        <td>107-111</td>
                                                        <td>112-118</td>
                                                        <td>119-126</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>69-73</td>
                                                        <td>74-78</td>
                                                        <td>79-83</td>
                                                        <td>84-88</td>
                                                        <td>89-93</td>
                                                        <td>94-100</td>
                                                        <td>101-108</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ALT GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>XS</th>
                                                        <th>S</th>
                                                        <th>M</th>
                                                        <th>L</th>
                                                        <th>XL</th>
                                                        <th>XXL</th>
                                                        <th>XXXL</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>69-73</td>
                                                        <td>74-78</td>
                                                        <td>79-83</td>
                                                        <td>84-88</td>
                                                        <td>89-93</td>
                                                        <td>94-100</td>
                                                        <td>101-108</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>87-91</td>
                                                        <td>92-96</td>
                                                        <td>97-101</td>
                                                        <td>102-106</td>
                                                        <td>107-111</td>
                                                        <td>112-118</td>
                                                        <td>119-126</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">JEANS</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tr>
                                                        <th></th>
                                                        <th>28</th>
                                                        <th>29</th>
                                                        <th>30</th>
                                                        <th>31</th>
                                                        <th>32</th>
                                                        <th>33</th>
                                                        <th>34</th>
                                                        <th>36</th>
                                                        <th>38</th>
                                                        <th>40</th>
                                                        <th>42</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>76</td>
                                                        <td>79</td>
                                                        <td>81</td>
                                                        <td>84</td>
                                                        <td>86</td>
                                                        <td>89</td>
                                                        <td>91</td>
                                                        <td>96</td>
                                                        <td>101</td>
                                                        <td>106</td>
                                                        <td>111</td>


                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>94</td>
                                                        <td>97</td>
                                                        <td>99</td>
                                                        <td>102</td>
                                                        <td>104</td>
                                                        <td>107</td>
                                                        <td>109</td>
                                                        <td>114</td>
                                                        <td>119</td>
                                                        <td>124</td>
                                                        <td>129</td>


                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 30</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>
                                                        <td>76</td>


                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 31</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>
                                                        <td>79</td>


                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 32</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>
                                                        <td>81</td>


                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 33</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>
                                                        <td>84</td>


                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak Boyu 34</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>
                                                        <td>86</td>

                                                    </tr>

                                                    <tr>
                                                        <td>İç Bacak Boyu 36</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>
                                                        <td>91,5</td>

                                                    </tr>
                                                   </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="kiz-cocuk-group">
                                        <h4 class="panel-title">
                                            <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#KC" aria-expanded="true" aria-controls="KC">
                                                Kız Çocuk  <span style="float:right" class="fa fa-plus-circle"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="KC" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="kiz-cocuk-group" aria-expanded="true" style="">
                                        <div class="panel-body">
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ÜST GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>4-5</th>
                                                        <th>5-6</th>
                                                        <th>7-8</th>
                                                        <th>8-9</th>
                                                        <th>9-10</th>
                                                        <th>11-12</th>
                                                        <th>13-14</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Boy</td>
                                                        <td>105-110</td>
                                                        <td>111-116</td>
                                                        <td>120-128</td>
                                                        <td>129-134</td>
                                                        <td>135-140</td>
                                                        <td>147-152</td>
                                                        <td>153-164</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>58-60</td>
                                                        <td>61-63</td>
                                                        <td>64-67</td>
                                                        <td>67-70</td>
                                                        <td>70-72</td>
                                                        <td>74-77</td>
                                                        <td>78-82</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>55-56</td>
                                                        <td>57-58</td>
                                                        <td>59-60</td>
                                                        <td>60-62</td>
                                                        <td>62-63</td>
                                                        <td>65-66</td>
                                                        <td>67-69</td>
                                                    </tr>

                                                    </tbody></table>
                                            </div>

                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ELBİSE - TUNİK - TULUM</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>4-5</th>
                                                        <th>5-6</th>
                                                        <th>7-8</th>
                                                        <th>8-9</th>
                                                        <th>9-10</th>
                                                        <th>11-12</th>
                                                        <th>13-14</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Boy</td>
                                                        <td>105-110</td>
                                                        <td>111-116</td>
                                                        <td>120-128</td>
                                                        <td>129-134</td>
                                                        <td>135-140</td>
                                                        <td>147-152</td>
                                                        <td>153-164</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>58-60</td>
                                                        <td>61-63</td>
                                                        <td>64-67</td>
                                                        <td>67-70</td>
                                                        <td>70-72</td>
                                                        <td>74-77</td>
                                                        <td>78-82</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>55-56</td>
                                                        <td>57-58</td>
                                                        <td>59-60</td>
                                                        <td>60-62</td>
                                                        <td>62-63</td>
                                                        <td>65-66</td>
                                                        <td>67-69</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>61-63</td>
                                                        <td>64-67</td>
                                                        <td>68-71</td>
                                                        <td>71-74</td>
                                                        <td>74-77</td>
                                                        <td>80-83</td>
                                                        <td>84-89</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ALT GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>4-5</th>
                                                        <th>5-6</th>
                                                        <th>7-8</th>
                                                        <th>8-9</th>
                                                        <th>9-10</th>
                                                        <th>11-12</th>
                                                        <th>13-14</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Boy</td>
                                                        <td>105-110</td>
                                                        <td>111-116</td>
                                                        <td>120-128</td>
                                                        <td>129-134</td>
                                                        <td>135-140</td>
                                                        <td>147-152</td>
                                                        <td>153-164</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>55-56</td>
                                                        <td>57-58</td>
                                                        <td>59-60</td>
                                                        <td>60-62</td>
                                                        <td>62-63</td>
                                                        <td>65-66</td>
                                                        <td>67-69</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>61-63</td>
                                                        <td>64-67</td>
                                                        <td>68-71</td>
                                                        <td>71-74</td>
                                                        <td>74-77</td>
                                                        <td>80-83</td>
                                                        <td>84-89</td>
                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak</td>
                                                        <td>40-44</td>
                                                        <td>45-50</td>
                                                        <td>51-56</td>
                                                        <td>57-60</td>
                                                        <td>61-64</td>
                                                        <td>69-73</td>
                                                        <td>74-77</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="erkek-cocuk-group">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#EC" aria-expanded="false" aria-controls="EC">
                                                Erkek Çocuk  <span style="float:right" class="fa fa-plus-circle"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="EC" class="panel-collapse collapse" role="tabpanel" aria-labelledby="erkek-cocuk-group" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ÜST GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>4-5</th>
                                                        <th>5-6</th>
                                                        <th>7-8</th>
                                                        <th>8-9</th>
                                                        <th>9-10</th>
                                                        <th>11-12</th>
                                                        <th>13-14</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Boy</td>
                                                        <td>105-110</td>
                                                        <td>111-116</td>
                                                        <td>120-128</td>
                                                        <td>129-134</td>
                                                        <td>135-140</td>
                                                        <td>147-152</td>
                                                        <td>153-164</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>58-60</td>
                                                        <td>61-63</td>
                                                        <td>64-67</td>
                                                        <td>67-70</td>
                                                        <td>70-72</td>
                                                        <td>74-77</td>
                                                        <td>78-82</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>55-56</td>
                                                        <td>57-58</td>
                                                        <td>59-60</td>
                                                        <td>60-62</td>
                                                        <td>62-63</td>
                                                        <td>65-66</td>
                                                        <td>67-69</td>
                                                    </tr>

                                                    </tbody></table>
                                            </div>
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">ALT GRUP</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                    </tr><tr>
                                                        <th></th>
                                                        <th>4-5</th>
                                                        <th>5-6</th>
                                                        <th>7-8</th>
                                                        <th>8-9</th>
                                                        <th>9-10</th>
                                                        <th>11-12</th>
                                                        <th>13-14</th>

                                                    </tr>
                                                    <tr>
                                                        <td>Boy</td>
                                                        <td>105-110</td>
                                                        <td>111-116</td>
                                                        <td>120-128</td>
                                                        <td>129-134</td>
                                                        <td>135-140</td>
                                                        <td>147-152</td>
                                                        <td>153-164</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>55-56</td>
                                                        <td>57-58</td>
                                                        <td>59-60</td>
                                                        <td>60-62</td>
                                                        <td>62-63</td>
                                                        <td>65-66</td>
                                                        <td>67-69</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>61-63</td>
                                                        <td>64-67</td>
                                                        <td>68-71</td>
                                                        <td>71-74</td>
                                                        <td>74-77</td>
                                                        <td>80-83</td>
                                                        <td>84-89</td>
                                                    </tr>
                                                    <tr>
                                                        <td>İç Bacak</td>
                                                        <td>40-44</td>
                                                        <td>45-50</td>
                                                        <td>51-56</td>
                                                        <td>57-60</td>
                                                        <td>61-64</td>
                                                        <td>69-73</td>
                                                        <td>74-77</td>
                                                    </tr>
                                                    </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="bebek-group">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#bebek" aria-expanded="false" aria-controls="bebek">
                                                Bebek  <span style="float:right" class="fa fa-plus-circle"></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="bebek" class="panel-collapse collapse" role="tabpanel" aria-labelledby="bebek-group" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body">
                                            <div class="panel panel-default category table-responsive">
                                                <div class="panel-heading category">Beden</div>
                                                <table class="table table-bordered table-responsive-lg category-content">
                                                    <tbody><tr>
                                                        <th></th>
                                                        <th>12-18</th>
                                                        <th>18-24</th>
                                                        <th>24-36</th>


                                                    </tr>
                                                    <tr>
                                                        <td>Boy</td>
                                                        <td>80-86</td>
                                                        <td>86-92</td>
                                                        <td>92-98</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Göğüs</td>
                                                        <td>49-51</td>
                                                        <td>51-53</td>
                                                        <td>53-55</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Bel</td>
                                                        <td>48,5-50,5</td>
                                                        <td>50,5-52,5</td>
                                                        <td>52,5-54,5</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Basen</td>
                                                        <td>51-53</td>
                                                        <td>53-55</td>
                                                        <td>55-57</td>

                                                    </tr>
                                                    <tr>
                                                        <td>İç Boy</td>
                                                        <td>26-30</td>
                                                        <td>30-34</td>
                                                        <td>34-38</td>

                                                    </tr>

                                                    </tbody></table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                </div>

            </div>
        </div>
    </div>
@endsection

