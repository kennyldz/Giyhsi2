<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

//Modeller
use App\Models\Category;
use App\Models\ContactReply;
use App\Models\Product;
use App\Models\Contact;
use App\Models\Order;

use App\Models\Slider;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class HomePage extends Controller
{


    public function __construct(){

        view()->share('categories',Category::where('status','aktif')->get());
        view()->share('mesajlar',ContactReply::where('status','cevaplanmadı')->count());
        view()->share('onay',Product::where('check',0)->count());

    }

    public function index(){

        //En düşük fiyatlı ürünleri çek
        $data['lowproducts']=Product::where('check','1')->orderBy('price','ASC')->paginate(12);
        //Ürünleri tarihine göer listele
        $data['products']=Product::where('check','1')->orderBy('created_at','DESC')->paginate(12);
        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();

        //Slider liste
        $data['sliders']=Slider::where('durum','aktif')->get();

        //En Çok bakılan ürünler
        $data['HitProducts']=Product::where('status','Satışta')->OrderByDesc('hit')->get();

        return view('front/HomePage',$data);
}

//Ürün detay sayfası için
public function ProductDetail($slug){


        //Ürün Detayı için
        $product=Product::whereSlug($slug)->first() ?? abort(403,'Ürün Bulunamadı!');
        //sayfa Hiti için
        $product->increment('hit');
        $data['productsdetail']=$product;
    //Sepetteki ürün sayısı ve ürün listesi
    $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
    $data['WaitOrder'] = DB::table('products')
        ->select('products.title','products.image','orders.status')
        ->join('orders', 'products.id','=','orders.productID')
        ->where('orders.receiverUserID', Auth::id())
        ->whereIn('orders.status',$Query)
        ->get();

       //ilgili ürünler için
        $data['relatedproducts']=Product::where('check','1')->where('categoryID',$data['productsdetail']->categoryID)->get();
        return view('front/UrunDetay',$data);

}

//iletişim sayfası için
public function contact(){
    //Sepetteki ürün sayısı ve ürün listesi
    $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
    $data['WaitOrder'] = DB::table('products')
        ->select('products.title','products.image','orders.status')
        ->join('orders', 'products.id','=','orders.productID')
        ->where('orders.receiverUserID', Auth::id())
        ->whereIn('orders.status',$Query)
        ->get();
return view('front/iletisim',$data);

}

public function contactpost(Request $request){

        $rules=[
          'name'=>'required|min:3',
          'email'=>'required|email',
          'topic'=>'required|min:5',
          'message'=>'required|min:10'
        ];
        $Validate=Validator::make($request->post(),$rules);

        if($Validate->fails()){

            return redirect('iletisim')->withErrors($Validate)->withInput();
        }

       $contact=new Contact;
       $contact->name=$request->name;
       $contact->telephone=$request->phone;
       $contact->email=$request->email;
       $contact->topic=$request->topic;
       $contact->message=$request->message;
       $contact->save();

       //mesaj cevaplama tablosuna kaydet
    $contactID=Contact::orderByDesc('id')->first();

        $reply=new ContactReply();
        $reply->contactID=$contactID->id;
        $reply->status="cevaplanmadı";
        $reply->save();

       return redirect('iletisim')->with('success','Mesajınız tarafımıza iletilmiştir.Bildiriminiz için teşekkür ederiz.');

}

public function sss(){

    //Sepetteki ürün sayısı ve ürün listesi
    $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
    $data['WaitOrder'] = DB::table('products')
        ->select('products.title','products.image','orders.status')
        ->join('orders', 'products.id','=','orders.productID')
        ->where('orders.receiverUserID', Auth::id())
        ->whereIn('orders.status',$Query)
        ->get();

        return view('front/sss',$data);
}


}
