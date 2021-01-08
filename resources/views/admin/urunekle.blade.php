@extends('admin.layouts.master')
@section('TitlePage','Admin Ürün Ekle ')
@section('content')
    <!-- Admin Ürün Ekle -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1 text-black-50">Ürün Ekle</h3>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <form method="post" action="{{route('urunislemler.store')}}" enctype="multipart/form-data">
            @csrf
                <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="cart-body p-3 text-center ">
                            <p class="card-text  small">Ürün Görseli </p>
                            <input type="file" name="image" class="font-10  form-control-file form-control-sm small" >

                        </div>
                    </div>

                    <div class="card p-3">
                        <p class=" small"> <i class="fa fa-info-circle text-warning "></i> Ürüne ait bilgileri girdikten ve görseli seçtikten sonra <strong>Kaydet</strong> butonuna tıklayınız. </p>
                    </div>

                    <div class="card">
                        <button type="submit" class="btn btn-default btn-sm small form-control">Kaydet</button>
                    </div>
                </div>
                <!--ürün bilgileri -->
                <div class="col-lg-9 col-md-12 ">
                    <div class="card small">
                        <div class="card-body">
                            <table class="table table-sm small">
                                <tr class="">
                                    <td>Ürün Adı</td>
                                    <td><input type="text" name="UrunAdi" class="form-control form-control-sm sizefull mt-1 w-full border" required></td>
                                </tr>
                                <tr class="">
                                   <td>Açıklama</td>
                                    <td>
                                        <textarea type="text" name="UrunAciklama" class="form-control form-control-sm border"  required></textarea>
                                    </td>

                                </tr>
                                <tr class="">
                                    <td>Ek Bilgi</td>
                                    <td><textarea name="UrunEkBilgi" class="form-control form-control-sm border" ></textarea></td>
                                </tr>
                                <tr class="">
                                    <td>Kategori</td>
                                    <td><select name="UrunKategori" class="form-control form-control-sm text-black-50 sizefull mt-1 w-full" required>
                                            <option value="" >Kategori Seçiniz</option>
                                            @foreach( $categories  as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                    </td>

                                </tr>
                                <tr class="">
                                    <td>Beden</td>
                                    <td>
                                        <select name="UrunBeden" class="form-control form-control-sm sizefull text-black-50 mt-1 w-full">
                                            <option value="">Beden Seçiniz</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                            <optgroup label="Yaş">
                                                <option value="1Yas">1 Yaş</option>
                                                <option value="2Yas">2 Yaş</option>
                                                <option value="3Yas">3 Yaş</option>
                                                <option value="4Yas">4 Yaş</option>
                                                <option value="5Yas">5 Yaş</option>
                                                <option value="5+Yas">5+ Yaş</option>
                                                <option value="10+Yas">10+ Yaş</option>
                                            </optgroup>

                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>Renk</td>
                                    <td><input type="text" name="UrunRenk"  class="form-control form-control-sm sizefull mt-1 w-full border"></td>
                                </tr>
                                <tr class="">
                                    <td>Kaç Lokum ?</td>
                                    <td><select name="UrunLokum" class="form-control form-control-sm text-black-50" required>
                                            <option value="">Seçim Yapınız </option>

                                            @for($i = 1;$i <= 10; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor

                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Kargo Ödeme</td>
                                    <td>     <select name="KargoOdeme" class="form-control text-black-50 small form-control-sm">
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Satıcı">Satıcı</option>
                                            <option value="Alıcı">Alıcı</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Nereden Kargolanacak ?</td>
                                    <td>
                                        <select name="KargoNereden" class="form-control text-black-50 form-control-sm">
                                            <option value="">Seçim Yapınız</option>
                                            <option value="istanbul'dan">İstanbul</option>
                                            <option value="istanbul dışından">İstanbul Dışı</Option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Gönderim Alanı</td>
                                    <td>
                                        <select name="UrunGonderimAlani" class="form-control text-black-50 form-control-sm">
                                            <option value="">Seçim Yapınız</option>
                                            <option value="Şehir içine">Şehir İçi</option>
                                            <option value="Tüm Türkiye'ye">Tüm Türkiye</option>
                                        </select>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!-- Form End -->
        </div>
    </div>
@endsection
