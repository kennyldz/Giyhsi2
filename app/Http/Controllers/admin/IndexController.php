<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Contact;
use App\Models\ContactReply;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __construct()
    {
        view()->share('mesajlar',ContactReply::where('status','cevaplanmadı')->count());
        view()->share('onay',Product::where('check',0)->count());
    }
    //Admin Profil Sayfa
    public function Index(){

        //Toplam Siparişleri Al - İptallerde dahil
        $Orders=Order::count();
        //Teslim Edilen sipariş
        $CompleteOrder=Order::where('status','Teslim Edildi')->count();
        //İptal Edilen
        $CancelOrder=Order::where('status','İptal Edildi')->count();
        //Kargoda
        $ShippingOrder=Order::where('status','Kargoda')->count();
        //Bekleyen siparişler
        $WaitOrder=Order::where('status','Beklemede')->count();
        //Toplam ürün sayısı
        $Products=Product::count();
        //Gelen Mesajlar
        $Mail=Contact::count();
        //Kategori Sayısı
        $Category=Category::where('status','aktif')->count();
        //Kategori ürün sayısı
        $CategoryProduct=DB::table('categories')
            ->select("name", DB::raw("COUNT(products.categoryID) as product_count"))
            ->leftJoin('products','products.categoryID','=','categories.id')
            ->groupBy('categories.name')
            ->get();

        //Onay Beklyen Ürün
        $WaitCheck=Product::where('check',0)->paginate(3);

        //Üye Listesi
        $UserList=User::orderByDesc('id')->paginate(8);
        return view('admin/index',compact('Orders','Products','Mail','Category','CompleteOrder','CancelOrder','ShippingOrder','WaitOrder','CategoryProduct','WaitCheck','UserList'));

    }

}
