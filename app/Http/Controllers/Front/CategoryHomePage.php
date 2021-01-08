<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Modeller
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryHomePage extends Controller
{
    public function index($slug){

        //Kategorileri al
        $data['categories']=Category::all();

        //Slugdan gelen kategorinin ID'sini al
        $CategoryID=Category::whereSlug($slug)->first();

        //Kategori ID'sine göre ürünleri getir
        $data['ProductsCategory']=Product::where('check','1')->where('categoryID',$CategoryID->id)->paginate(12);

        $Hitproduct=Product::where('categoryID',$CategoryID->id)->where('check','1')->OrderByDesc('hit')->first();

        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();

        return view('front/Kategori',$data,compact('Hitproduct'));
    }
}
