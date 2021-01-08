<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactReply;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        view()->share('mesajlar',ContactReply::where('status','cevaplanmadı')->count());
        view()->share('onay',Product::where('check',0)->count());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ürünler ana sayfa
        #Onaylanmamış
        $WaitProduct=Product::where('check',0)->count();
        #Satışta
        $ActiveProduct=Product::where('check',1)->count();
        #Satıldı
        $CompleteProduct=Product::where('check',2)->count();
        #Askıdan Alındı
        $CancelProduct=Product::where('check',3)->count();
        #Ürünler
        $Products=DB::table('products')
            ->select('products.id','products.image','products.title','products.content','products.info','products.status','products.price','products.size','products.color','products.cargopayment','products.cargo','products.cargo','products.sendarea','products.check','products.hit','products.created_at','products.updated_at','users.name','users.email','categories.name','products.categoryID')
            ->join('categories','products.categoryID','=','categories.id')
            ->join('users','products.userID','=','users.id')
            ->get();


        return view('admin/urunler',compact('WaitProduct','ActiveProduct','CompleteProduct','CancelProduct','Products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //#ürün ekle sayfa

        #aktif kategorileri getir
        $categories=Category::all();
        return view('admin/urunekle',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #ürün tanmla
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
        $Product->color=$request->UrunRenk;
        $Product->cargopayment=$request->KargoOdeme;
        $Product->cargo=$request->KargoNereden;
        $Product->sendarea=$request->UrunGonderimAlani;
        $Product->cargocompany="-";
        $Product->check=1;
        $Product->status="Satışta";
        $Product->userID=Auth::id();
        $Product->save();

        return redirect('admin/urunislemler');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $Product=DB::table('products')
            ->select('products.id','products.image','products.title','products.content','products.info','products.status','products.price','products.size','products.color','products.cargopayment','products.cargo','products.cargo','products.sendarea','products.check','products.hit','products.created_at','products.updated_at','users.name','users.email','categories.name','products.categoryID')
            ->join('categories','products.categoryID','=','categories.id')
            ->join('users','products.userID','=','users.id')
            ->where('products.id',$id)
            ->first();

        $Orders=Order::where('productID',$id)->get();

        $Categorys=Category::where('status','aktif')->get();

        return view('admin/urunduzenle',compact('Product','Categorys','Orders'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //İşlemler
        switch ($request->Islem){

            //Onay
            case "Onayla":

                Product::where('id',$id)->update([
                    "check"=>1,
                    "status"=>"Satışta",
                    "categoryID"=>$request->UrunKategori,
                    "price"=>$request->UrunLokum
                ]);
                break;

                //Kaydet
            case "Kaydet":

             switch ($request->Durum){
                 case 1:
                     $Durum="Satışta";
                     break;

                 case 3:
                     $Durum="Askıdan Alındı";
                     break;
             }

                Product::where('id',$id)->update([
                    "check"=>$request->Durum,
                    "status"=>$Durum,
                    "categoryID"=>$request->UrunKategori,
                    "price"=>$request->UrunLokum
                ]);

                break;
        }


       return  redirect('admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
