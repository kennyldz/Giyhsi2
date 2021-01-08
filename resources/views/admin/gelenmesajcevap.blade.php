@extends('admin.layouts.master')
@section('TitlePage','Admin Gelen Mesaj Detay ')
@section('content')
    <div class="page-wrapper">
        <div class="container-fluid">
            <h4 class="card-title">Gelen Mesaj Detay</h4>
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="card bg-banner">
                        <div class="card-body text-uppercase text-center text-black-50">
                            <strong>{{$message->status}}</strong>
                        </div>
                    </div>
                    @if($message->status=="cevaplanmadı")
                        <div class="card text-center ">
                            <p class="small"><i class="fa fa-info-circle text-warning"></i>
                            Cevabınızı verdikten sonra <strong>Cevapla</strong> butonuna tıklayınız.Mail olarak ilgili kişiye bildirilecektir.</p>
                        </div>
                        @endif
                </div>
                <!--Mesaj detay -->
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm small">
                                <tr><td>Adı</td><td>{{$message->name}}</td></tr>
                                <tr><td>E-Mail</td><td>{{$message->email}}</td></tr>
                                <tr><td>Telefon</td><td>{{$message->telephone}}</td></tr>
                                <tr><td>Oluşturma Tarihi</td><td>{{$message->created_at}}</td></tr>
                                <tr><td>Güncellenme Tarihi</td><td>{{$message->updated_at}}</td></tr>
                                <tr><td>Konu</td><td>{{$message->topic}}</td></tr>
                                <tr><td>Mesaj</td><td>{{$message->message}}</td></tr>
                            </table>
                        </div>
                    </div>

                    <!--  Mesaj Durumu-->
                    @if($message->status=="cevaplanmadı")
                       <form method="post" action="{{route('gelenmesajlar.update',$message->id)}}">
                           @method('put')
                           @csrf
                        <div class="card">
                            <div class="card-body">
                                <p class="small">Cevabınız</p>
                                <textarea class="form-control" name="cevap" required></textarea>
                            </div>
                            <input name="email" value="{{$message->email}}" hidden>
                            <input name="name" value="{{$message->name}}" hidden>
                            <input name="topic" value="{{$message->topic}}" hidden>
                            <input name="message" value="{{$message->message}}" hidden>
                            <input name="created_at" value="{{$message->created_at}}" hidden>
                            <button type="submit" class="btn btn-default btn-sm form-control"><strong>Cevapla</strong></button>
                        </div>
                       </form>
                    @elseif($message->status=="cevaplandı")
                    <div class="card">
                        <div class="card-body">
                            <textarea class="form-control" readonly>{{$message->reply}}</textarea>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
