@extends('admin.layouts.master')
@section('TitlePage','Admin Slider İşlemleri ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
    <h4 class="card-title">Slider Düzenle</h4>
            <form method="post" action="{{route('sliderislemler.update',$Slider->id)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <img src="/{{$Slider->image}}" height="90" width="160">
                        </div>
                    </div>
                    <div class="card ">
                        <div class="card-body ">
                            <input type="file" name="SliderGorsel" class="form-control-file form-control-sm font-12" >
                        </div>

                    </div>
                    <div class="card text-center">
                        <p class="small"><i class="fa fa-info-circle text-warning"></i> Görseli değiştirmek için  Dosya Seçip ardından <strong>Güncelle</strong> butonuna tıklayınız.</p>
                    </div>
                </div>
                <div class="col-lg-9">

                        <div class="card-group">
                            <div class="card">
                                <select class="form-control form-control-sm small border-0 text-black-50" name="SliderDurum" >
                                    <option value="{{$Slider->durum}}">Durum Değiştir</option>
                                    @if($Slider->durum=="pasif")
                                        <option value="aktif">Aktif et</option>
                                    @elseif($Slider->durum=="aktif")
                                        <option value="pasif">Pasif et</option>
                                    @endif
                                </select>
                            </div>
                            <div class="card">
                                <button type="submit" value="DurumGuncelle" name="guncelle" class="btn btn-sm  btn-default form-control"><strong>Güncelle</strong></button>
                            </div>
                        </div>
                        <!--Slider bilgiler -->
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-sm small">
                                    <tr>
                                        <td>Ana Slogan</td>
                                        <td><input type="text" name="anaslogan"  class="form-control form-control-sm "  value="{{$Slider->bigslogan}}"></td>
                                    </tr>
                                    <tr>
                                        <td>Alt Slogan</td>
                                        <td><input type="text" name="altslogan" class="form-control form-control-sm  " value="{{$Slider->smallslogan}}"></td>
                                    </tr>
                                    <tr>
                                        <td>Buton Link</td>
                                        <td><input type="text" name="sliderlink" class="form-control form-control-sm  " value="{{$Slider->sliderlink}}"></td>
                                    </tr>
                                    <tr>
                                        <td>Oluşturulma Tarihi</td>
                                        <td>{{$Slider->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Güncellenme Tarihi</td>
                                        <td>{{$Slider->updated_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Durum</td>
                                        <td>{{$Slider->durum}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                </div>
            </div>
            <!--form end -->
            </form>
        </div>
    </div>
@endsection
