<?php
namespace App\Http\Controllers\kullanici;

use App\Http\Controllers\Controller;
//Modeller
use App\Mail\SiparisHazirlaniyor;
use App\Mail\Siparisİptal;
use App\Mail\SiparisKargoda;
use App\Mail\TeslimEdildi;
use App\Models\Category;
use App\Models\Product;
use App\Models\Delight;
use App\Models\Order;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use function GuzzleHttp\Psr7\str;
use App\File;


class kullanici extends Controller
{
    public function __construct(){

        view()->share('categories',Category::where('status','aktif')->get());

    }

    //Kullanıcı Girişi
    public function Userlogin(){
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();
       return view('kullanici/giris',$data);
    }
    //Yeni Üye için
    public function Userregister(){
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();
        return view('kullanici/uyeol',$data);
    }
    //hesabım ana sayfa
    public function account()
    {

        //Kullanıcının Ürün sayısını al
        $data['UserProductCount'] = Product::where('userID', Auth::id())->count();
        //kullanıcının güncel lokum tutarını al
        $data['User'] = Delight::where('userID', Auth::id())->orderBy('id', 'DESC')->first();
        //Ürüne Gelen talep sayısı
        $Query1=['Beklemede','Ürün Hazırlanıyor'];
        $RequestProductCount=Order::where('senderUserID',Auth::id())->whereIn('status',$Query1)->count();
        //Satışlardan kazandıklarım
        $WinDelight=DB::table('products')
            ->select('products.price')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.senderUserID', Auth::id())
            ->where('orders.status','Teslim Edildi')
            ->sum('products.price');

        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();
        //Delight kontrol Eğer hiç kayıt yok ise yeni bir kayıt ekle
        if($data['User']==NULL) {
            $Delight=new Delight;
            $Delight->userID=Auth::id();
            $Delight->amount=0;
            $Delight->check=0;
            $Delight->detail="Hesap Açılış";

            $Delight->save();
            $data['User'] = Delight::where('userID', Auth::id())->orderBy('id', 'DESC')->first();
        }

            return view('kullanici/hesabim',$data,compact('RequestProductCount','WinDelight'));


    }

    //ürünlrim Sayfası
    public function Products(){
        $data['User'] = Delight::where('userID', Auth::id())->orderBy('id', 'DESC')->first();
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();

        //ürünlerim
        $data['TotalProducts'] = Product::where('userID',Auth::id())->orderByDesc('id')->paginate(5);

        return view('kullanici/urunlerim',$data);
    }

    //Ürün Yükle Sayfa
    public function ProductAdd(){

        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();

        return view('kullanici/urunyukle',$data);
    }

    //Yeni Ürün ekleme
    public function CreateProduct(Request $request){



        $Product=new Product();
        $Product->categoryID=$request->UrunKategori;
        $Product->title=$request->UrunAdi;
        $Product->content=$request->UrunAciklama;
        $Product->price=$request->UrunLokum;

        if($request->hasFile('image')){

            $imageName=str::slug($request->UrunAdi).'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $Product->image='uploads/'.$imageName;


        }

        $Product->slug=str::slug($request->UrunAdi);
        $Product->info=$request->UrunEkBilgi;
        $Product->size=$request->UrunBeden;
        $Product->gender=$request->UrunCinsiyet;
        $Product->shoe_size=$request->UrunNumara;
        $Product->color=$request->UrunRenk;
        $Product->cargopayment=$request->KargoOdeme;
        $Product->cargo=$request->KargoNereden;
        $Product->sendarea=$request->UrunGonderimAlani;
        $Product->cargocompany="-";
        $Product->status="Onay  Bekliyor";
        $Product->userID=Auth::id();
        $Product->save();


        return redirect('kullanici/hesabim')->with('success','Ürününüz sisteme eklenmiştir.Onaylandıktan sonra ilgili kategoriye eklenecektir.');


    }
    //Ürün İptal Et
    public function CancelProduct(Request $request){
        $ProductID=$request->ProductID;

              Product::where('id',$ProductID)->update([
                  "check" => 3,
                  "status"=>"Askıdan Alındı"
              ]);

        return redirect('kullanici/hesabim/urunlerim')->with('success','Ürün satıştan kaldırılmıştır');
    }
    //Hediye lokum tanımlamasını yap
    public function CreateDelight(){

      $DelightControl=Delight::where('userID',Auth::id())->orderBy('id','DESC')->first();

      if($DelightControl==NULL) {
          $DelightAmount=3;
      }else{
          $DelightAmount=$DelightControl->amount+3;
      }
          $Delight=new Delight;
          $Delight->userID=Auth::id();
          $Delight->amount=$DelightAmount;
          $Delight->check=1;
          $Delight->detail="Hediye Lokum tanımlaması yapılmıştır.";

          $Delight->save();
          return redirect('kullanici/hesabim')->with('success','Hediye lokum tanımlamanız yapılmıştır.');


    }

    //Siparişler sayfası
function Orders(){
    $data['User'] = Delight::where('userID', Auth::id())->orderBy('id', 'DESC')->first();
    //Sepetteki ürün sayısı ve ürün listesi
    $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
    $data['WaitOrder'] = DB::table('products')
        ->select('products.title','products.image','orders.status')
        ->join('orders', 'products.id','=','orders.productID')
        ->where('orders.receiverUserID', Auth::id())
        ->whereIn('orders.status',$Query)
        ->get();

    //Siparişler
    $data['TotalOrders'] = DB::table('products')
        ->select('products.title','products.image','products.cargocompany','products.price','orders.id','orders.productID','orders.cargoNumber','orders.senderUserID','orders.status','orders.created_at','orders.updated_at')
        ->join('orders', 'products.id','=','orders.productID')
        ->where('orders.receiverUserID', Auth::id())
        ->orderByDesc('orders.id')
        ->paginate(5);
        return view('kullanici/siparislerim',$data);
}
    //Sipariş iptal
      public function CancelOrder(Request $request){

        //Eğer sipariş teslim edilmiş ise
          if($request->OrderComplete){

              $OrderID=$request->OrderID;
              $SenderUserID=$request->SenderUserID;
              $Price=$request->Price;

              //Sipariş durumunu güncelle
              Order::where('id',$OrderID)->update([
                  "status"=>'Teslim Edildi'
              ]);

              $DelightControl=Delight::where('userID',$SenderUserID)->orderBy('id','DESC')->first();
              $DelightUpdate=new Delight();
              $DelightUpdate->userID=$SenderUserID;
              $DelightUpdate->amount=$DelightControl->amount+$Price;
              $DelightUpdate->check=$DelightControl->check;
              $DelightUpdate->detail="1$OrderID numaralı sipariş sonrası +$Price lokum kazandınız";
              $DelightUpdate->save();

              //Mail Bilgilendirme
              $MailName=User::where('id',$SenderUserID)->first();

              $data=[];
              $data['Username']=$MailName->name;
              $data['OrderID']=$OrderID;
              $data['Price']=$Price;

              Mail::to($MailName->email)->send(new TeslimEdildi($data));

              return redirect('kullanici/hesabim/siparislerim')->with('success','Durum güncellemesi yapılmıştır. İyi günlerde kullanınız');
              return redirect('kullanici/hesabim/siparislerim')->with('error','Bir hata ile karşılaştık, lütfen iletişim sayfasından durumu bildiriniz.');




          }

              if(isset($request->OrderCancel))
              {
                  $ProductID=$request->ProductID;
                  $CancelOrderID=$request->OrderCancel;
                  $Price=$request->OrderDelight;
                  $Amount=$request->UserAmount;

                  //Sipariş durumunu güncelle
                  Order::where('id',$CancelOrderID)->update([
                      "status"=>'İptal Edildi'
                  ]);

                  //Ürün tablosunda check durumunu değiştir - ürün tekrar askıya atıldı
                  Product::where('id',$ProductID)->update([
                      "check" => 1,
                      "status"=>"Satışta"
                  ]);

                  //Kullanıcı lokum iadesi yap
                  $DelightControl=Delight::where('userID',Auth::id())->orderBy('id','DESC')->first();
                  $DelightUpdate=new Delight();
                  $DelightUpdate->userID=Auth::id();
                  $DelightUpdate->amount=$Amount+$Price;
                  $DelightUpdate->check=$DelightControl->check;
                  $DelightUpdate->detail="1$CancelOrderID numaralı sipariş iptali +$Price lokum iade sonrası kalan bakiye";
                  $DelightUpdate->save();

                  //Mail Bilgilendirme
                  #ürün sahibine bilgilendirme maili gönder
                  $data['Siparisiptal']=DB::table('orders')
                      ->select('orders.id','orders.updated_at','products.title','products.image','users.name','users.email')
                      ->join('products','orders.productID','=','products.id')
                      ->join('users','orders.senderUserID','=','users.id')
                      ->where('orders.id',$CancelOrderID)
                      ->first();

                  //Mail Gönder
                  Mail::to($data['Siparisiptal']->email)->send(new Siparisİptal($data));

                  return redirect('kullanici/hesabim/siparislerim')->with('success','Siparişiniz iptal edilmiştir.');

              }





    }


    //Gelen İstekler
    public function RequestProduct(){
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();
        //Gelen istekler

        $data['RequestProduct']=DB::table('products')
            ->select('products.title','products.content','products.image','products.price','products.cargocompany','orders.id','orders.province','orders.district','orders.address','orders.name','orders.telephone','orders.status','orders.cargoNumber','orders.created_at','orders.updated_at')
            ->join('orders','products.id','=','orders.productID')
            ->where('orders.senderUserID',Auth::id())
            ->orderByDesc('orders.id')
            ->paginate(5);
     return view('kullanici.istekler',$data);

    }

    //Gelen isteği güncelle
    public function RequestUptade(Request $request){

        //Eğer ürün hazırlanyor tıklanmış ise
        if($request->WaitOrderID){
            $OrderID=$request->WaitOrderID;

            //Mail için kullan
            $data['SiparisHazirlaniyor']=DB::table('orders')
                ->select('orders.id','orders.status','orders.created_at','orders.updated_at','products.title','products.image','users.name','users.email')
                ->join('products','orders.productID','=','products.id')
                ->join('users','orders.receiverUserID','=','users.id')
                ->where('orders.id',$OrderID)
                ->first();

            Mail::to($data['SiparisHazirlaniyor']->email)->send(new SiparisHazirlaniyor($data));

            //Sipariş durumunu güncelle
            Order::where('id',$OrderID)->update([
                "status"=>'Ürün Hazırlanıyor'
            ]);

            return redirect('kullanici/hesabim/istekler')->with('success','Durum güncellenmiştir.Kargoya verdikten sonra güncelleme yapınız');

        }

        //Eğer kargoya verilmiş ise
        if($request->CargoOrderID){
            $OrderID=$request->CargoOrderID;
            $CargoNumber=$request->CargoNumber;
            $CargoCompany=$request->KargoFirma;

            //Mail için kullan
            $data['SiparisKargoda']=DB::table('orders')
                ->select('orders.id','orders.status','orders.productID','orders.created_at','orders.updated_at','products.title','products.image','users.name','users.email','orders.province','orders.district','orders.address','orders.telephone')
                ->join('products','orders.productID','=','products.id')
                ->join('users','orders.receiverUserID','=','users.id')
                ->where('orders.id',$OrderID)
                ->first();



            Order::where('id',$OrderID)->update([
                "cargoNumber"=>$CargoNumber,
                "status"=>'Kargoda'
            ]);

            Product::where('id',$data['SiparisKargoda']->productID)->update([
               "cargocompany"=> $CargoCompany
            ]);

         $data['KargoAdi']=$CargoCompany;
            $data['KargoTakip']=$CargoNumber;

            //Mail Gönder
            Mail::to($data['SiparisKargoda']->email)->send(new SiparisKargoda($data));


            return redirect('kullanici/hesabim/istekler')->with('success','Durum güncellenmiştir.');


        }


 }

 //Lokum işlem geçmişi
    public function DelightsList(){

        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();


        $data['Delights']=Delight::where('userID',Auth::id())->orderByDesc('id')->paginate(10);

        return view ('kullanici/lokum',$data);

    }

    //Profilim
    public function Profile(){
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();

        $data['Profilim']=User::where('id',Auth::id())->first();

        return view('kullanici/profilim',$data);

    }


    //Profil Güncelle
    public function ProfileUpdate(Request $request){

        if($request->hasFile('ProfilePhoto')){

            $imageName=Str::slug($request->ProfilePhoto).'.'.$request->ProfilePhoto->getClientOriginalExtension();
            $request->ProfilePhoto->move(public_path('front/images/icons'),$imageName);

            User::where('id',$request->UserUpdate)->update([
               "profile_photo_path"=>$imageName
            ]);

            return redirect('kullanici/hesabim/profilim');

        }

        User::where('id',$request->UserUpdate)->update([
           "name"=>$request->Name
        ]);


        return redirect('kullanici/hesabim/profilim');

    }


    public function bildirim(){

        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();
        if(Auth::user()->status=='aktif'){

            return redirect()->route('kullanici.account');

        }

        return view('front/bildirim',$data);



    }

}



