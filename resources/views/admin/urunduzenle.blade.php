@extends('admin.layouts.master')
@section('TitlePage','Admin Ürün Bilgiler ')
@section('content')
    <!-- Admin ürün düzenle -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-7 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1 text-black-50">Ürün Bilgileri</h3>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">

            <form method="post" action="{{route('urunislemler.update',$Product->id)}}">
                @csrf
                @method('PUT')
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        <div class="card-body">

                         <img src="{{asset('/')}}{{$Product->image}}"  class="rounded" width="170"
                              height="130" >
                        </div>
                    <p class="text-center"><i class="fa fa-cube text-danger"></i> {{$Product->price}}</p>
                        <p class=" badge badge-secondary shadow-sm">{{$Product->status}}</p>
                    </div>
                    @switch($Product->check)


                        @case(0)
                        <!-- Onaylanmadı ise -->
                        <div class="rounded bg-white shadow-sm">
                            <button type="submit" class="btn btn-default btn-sm form-control form-control-sm" value="Onayla" name="Islem"><strong>Onayla</strong> </button>
                        </div>
                        <div class="mt-2 rounded bg-white small shadow-sm p-4 mb-1">
                            <p><i class="fa fa-info-circle text-warning "></i> Ürünü onaylamak için <strong>Onayla</strong> butonuna tıklayınız.</p><br>
                            <p> <i class="fa fa-info-circle text-warning "></i> Ürüne ait <strong>Kategori</strong> ve <strong>Lokum</strong> bilgisini değiştirebilirsiniz.</p>
                        </div>
                        @break
                    <!--Satışta ise -->
                        @case(1)
                        <div class="rounded bg-white shadow-sm">
                            <button type="submit" class="btn btn-default btn-sm form-control form-control-sm" value="Kaydet" name="Islem"><strong>Kaydet</strong> </button>
                        </div>
                    <div class="rounded bg-white shadow-sm mt-2 ">

                        <select class="form-control form-control-sm small text-black-50 " name="Durum">
                            <option value="{{$Product->check}}">Durum Değiştir</option>
                            <option value="3">Askıdan Al</option>
                        </select>
                    </div>
                    <div class=" rounded bg-white  mt-1 mb-1">
                        <div class="mt-2 rounded bg-white small shadow-sm p-4">
                            <p><i class="fa fa-info-circle text-warning "></i> Ürünü askıdan almak için <strong>Durumu Değiştir</strong> alanından askıdan al'ı seçip <strong>Kaydet</strong> butonuna tıklayınız.</p><br>
                            <p> <i class="fa fa-info-circle text-warning "></i> Ürüne ait <strong>Kategori</strong> ve <strong>Lokum</strong> bilgisini değiştirebilirsiniz.</p>
                        </div>
                    </div>
                        @break
                        <!--Askıdan alınmış ise -->
                        @case(3)
                            <div class="rounded bg-white shadow-sm">
                                <button type="submit" class="btn btn-default btn-sm form-control form-control-sm" value="Kaydet" name="Islem"><strong>Kaydet</strong> </button>
                            </div>
                            <div class="rounded bg-white shadow-sm mt-2 ">

                                <select class="form-control form-control-sm small text-black-50 " name="Durum">
                                    <option value="{{$Product->check}}">Durum Değiştir</option>
                                    <option value="1">Satışa Al</option>
                                </select>
                            </div>
                            <div class=" rounded bg-white  mt-1 mb-1">
                                <div class="mt-2 rounded bg-white small shadow-sm p-4">
                                    <p><i class="fa fa-info-circle text-warning "></i> Ürünü Satışa almak için <strong>Durumu Değiştir</strong> alanından Satışa Al'ı seçip <strong>Kaydet</strong> butonuna tıklayınız.</p><br>
                                    <p> <i class="fa fa-info-circle text-warning "></i> Ürüne ait <strong>Kategori</strong> ve <strong>Lokum</strong> bilgisini değiştirebilirsiniz.</p>
                                </div>
                            </div>

                        @break
                    @endswitch


                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card ">
                                <div class="card-body">
                                    {{$Product->title}}
                                    <table class="table table-sm small">
                                    <tr><td>Kategori</td><td>
                                            <select name="UrunKategori" class="form-control form-control-sm sizefull mt-1 w-full" >

                                                @foreach( $Categorys  as $category)
                                                    @if($category->id!=$Product->categoryID)
                                                        <option class="text-black-50" value="{{$category->id}}" >{{$category->name}} </option>
                                                    @else
                                                    <option  value="{{$category->id}}" selected>{{$category->name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </td></tr>
                                    <tr><td>Kaç Lokum</td><td>
                                            <select name="UrunLokum" class="form-control form-control-sm" >
                                                <option value="{{$Product->price}}">{{$Product->price}}</option>
                                                @for($i = 1;$i <= 10; $i++)
                                                    <option class="text-black-50" value="{{$i}}">{{$i}}</option>
                                                @endfor

                                            </select>
                                        </td></tr>
                                    <tr><td>Açıklama</td><td style="word-break: break-word">{{$Product->content}}</td></tr>
                                    <tr><td>Ek Bilgi</td><td style="word-break: break-word">{{$Product->info}}</td></tr>
                                    <tr><td>Beden</td><td>{{$Product->size}}</td></tr>
                                    <tr><td>Renk</td><td>{{$Product->color}}</td></tr>
                                    <tr><td>Kar. Ödeme</td><td>{{$Product->cargopayment}}</td></tr>
                                    <tr><td>Kar. Nereden</td><td>{{$Product->cargo}}</td></tr>
                                    <tr><td>Kar. Nereye</td><td>{{$Product->sendarea}}</td></tr>
                                    <tr><td>Görüntülenme</td><td>{{$Product->hit}}</td></tr>
                                    <tr><td>Yükleme Tarihi</td><td>{{$Product->created_at}}</td></tr>
                                    <tr><td>Güncellenme Tarihi</td><td>{{$Product->updated_at}}</td></tr>
                                    <tr><td>Yükleyen</td><td>{{$Product->email}} </td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--Eğer sipariş geçmişi var ise -->
                    <div class="row">
                    <div class="col-lg-12 col-md-12">
                        @foreach($Orders as $order)
                            <div class="card-group small ">
                                <div class="card bg-banner text-center">
                                   <div class="card-body ">
                                       Sipariş No<br>
                                      <strong style="font-size:3.8rem">1{{$order->id}}</strong>
                                   </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        {{$order->name}}<br>
                                        <p>{{$order->address}}</p>
                                        <p>{{$order->district}} | {{$order->province}}</p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p>{{$order->status}}</p>
                                        <p>{{$order->updated_at}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                   </div>
                    <!-- Sipariş geçmiş end-->
                </div>
            </div>
<!--Form End -->
            </form>
        </div>

    </div>
@endsection
