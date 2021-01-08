@extends('admin.layouts.master')
@section('TitlePage','Admin Sosyal Medya İşlemleri ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <h4 class="card-title">Sosyal Medya ve İletişim</h4>
            <div class="row">

                <div class="col-lg-12 col-md-12">
                    @foreach($Socials as $social)
                        <form method="post" action="{{route('sosyalmedya.update',$social->id)}}">
                            @method('put')
                            @csrf
                        <div class="card-group small">
                            <div class="card pt-2 pl-2">
                             <strong>{{$social->platform}}</strong>
                            </div>
                            <div class="card">
                                <input type="text" class="form-control form-control-sm" value="{{$social->link}}" name="link">
                            </div>
                            <div class="card">
                                <button class="btn btn-sm btn-default">Güncelle</button>
                            </div>
                        </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
