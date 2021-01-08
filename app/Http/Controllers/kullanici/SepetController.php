<?php

namespace App\Http\Controllers\kullanici;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Delight;
use App\Models\User;
use App\Mail\OrderInfo;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;



class SepetController extends Controller
{
    public function __construct()
    {
        view()->share('categories',Category::all());
    }

    public function index($slug)
    {
        //Tıklanılan ürünün detaylarını getir
        $data['ProductDetails']=Product::whereSlug($slug)->where('check','1')->first() ?? abort(403,'Ürün Bulunamadı!');
        //kullanıcının güncel lokum tutarını al
        $data['UserInfo']=Delight::where('userID',Auth::id())->orderBy('id','DESC')->first();
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();
        return view('kullanici/satinal',$data);
    }

    //Sipariş tablosuna ekleme yap
    public function CreateOrder(Request $request){

        $ProductID=$request->ProductID;
        $Product=Product::where('id',$ProductID)->first();
        $DelightControl=Delight::where('userID',Auth::id())->orderBy('id','DESC')->first();
        //Ürün sahibinin mail adresini al
        $UserMail=User::where('id',$Product->userID)->first();


        //Sipariş için oluşturulmuştur
        $Order=new Order;
        $Order->productID=$request->ProductID;
        $Order->province=$request->AdresIl;
        $Order->district=$request->AdresIlce;
        $Order->address=$request->Adres;
        $Order->name=$request->AdresAdSoyad;
        $Order->telephone=$request->AdresTelefon;
        $Order->cargoNumber="";
        $Order->senderUserID=$Product->userID;
        $Order->receiverUserID=Auth::id();
        $Order->status="Beklemede";
        $Order->comment="";

        //Eğer ilgili ürün satın alınmış ise
        if($Product->check==2){
            return redirect('kullanici/hesabim')->with('error','Üzgünüz ürün başka bir kullanıcı tarafından satın alınmıştır.');
        }else{

            //Ürün tablosunda check durumunu değiştir - ürün alındı
            Product::where('id',$ProductID)->update([
                "check" => 2,
                "status"=>"Ürün Alındı"
            ]);

            //Siparişi kaydet
            $Order->save();
            //En son eklenen sipariş no
            $OrderID=Order::select('id')->where('productID',$ProductID)->first();
            //Lokum için oluşturulmuştur
            $Delight=new Delight;
            $Delight->userID=Auth::id();
            $Delight->amount=$request->KalanLokum;
            $Delight->check=$DelightControl->check;
            $Delight->detail="$OrderID->id numaralı sipariş sonrası kalan bakiye";
            $Delight->save();


            //Mail bilgilendirme için
            $data=[];
            $data['ProductName']=$request->ProductName;
            $data['UserName']=$UserMail->name;
            $data['ProductImage']=$Product->image;
            Mail::to($UserMail->email)->send(new OrderInfo($data));

            return redirect('kullanici/hesabim')->with('success','Siparişiniz alınmıştır.Siparişlerim bölümünden sipariş takibini yapabilirsiniz.');
        }



    }
}
