@extends('admin.layouts.master')
@section('TitlePage','Admin Kategori Düzenle ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <h4 class="card-title">Kategori Düzenle</h4>
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card text-center">
                    <div class="card-body">
                        {{$Kategori->name}}
                    </div>
                </div>
                <div class="card text-center ">
                    <strong class="small text-black-50 text-uppercase"><i class="fa fa-circle @if($Kategori->status=='aktif') text-success @elseif($Kategori->status=='pasif') text-danger @endif "></i> {{$Kategori->status}}</strong>
                </div>

                <div class="card text-center p-1">
                        <p class="small">Ürün sayısı</p>
                        <strong style="font-size:3.8rem">{{$Product}}</strong>

                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <form method="post" action="{{route('kategoriislemler.update',$Kategori->id)}}">
                    @method('put')
                    @csrf
                <div class="card-group">
                    <div class="card">
                        <select class="form-control form-control-sm small border-0 text-black-50" name="KategoriDurum" required>
                            <option value="">Durum Değiştir</option>
                            @if($Kategori->status=="pasif")
                                <option value="aktif">Aktif et</option>
                            @elseif($Kategori->status=="aktif")
                            <option value="pasif">Pasif et</option>
                                @endif
                        </select>
                    </div>
                    <div class="card">
                        <button type="submit" value="DurumGuncelle" name="guncelle" class="btn btn-sm  btn-default form-control"><strong>Güncelle</strong></button>
                    </div>
                </div>
                </form>

                <!--Kategori bilgiler -->
                <div class="card">
                    <form method="post" action="{{route('kategoriislemler.update',$Kategori->id)}}">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <table class="table table-sm small">
                            <tr><td>Kategori Adı</td>
                                <td><input type="text" value="{{$Kategori->name}}" class="form-control form-control-sm" name="KategoriAdi"></td>
                                <td><button type="submit" value="IsimGuncelle" name="guncelle" class="btn btn-sm btn-add-todo form-control"><strong>Güncelle</strong></button></td>
                            </tr>
                            <tr><td>Oluşturulma Tarihi</td><td colspan="2">{{$Kategori->created_at}}</td></tr>
                            <tr><td>Güncellenme Tarihi</td><td colspan="2">{{$Kategori->updated_at}}</td></tr>
                        </table>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        </div>
    </div>

@endsection
