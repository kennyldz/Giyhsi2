<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactReply;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
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
        //Siparişler ana sayfa
        //Teslim Edilen sipariş
        $CompleteOrder=Order::where('status','Teslim Edildi')->count();
        //İptal Edilen
        $CancelOrder=Order::where('status','İptal Edildi')->count();
        //Kargoda
        $ShippingOrder=Order::where('status','Kargoda')->count();
        //Bekleyen siparişler
        $WaitOrder=Order::where('status','Beklemede')->count();

        #siparişler
        $Orders=DB::table('orders')
            ->select('orders.id','orders.status','orders.created_at','orders.updated_at','products.image','products.title')
            ->join('products','orders.productID','=','products.id')
            ->get();


        return view('admin/siparisler',compact('CancelOrder','CompleteOrder','ShippingOrder','WaitOrder','Orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //siparis detay görüntüle düzenleme
        $Orders=DB::table('orders')
            ->select('orders.id','orders.productID','orders.province','orders.district','orders.address','orders.name','orders.telephone','orders.cargoNumber','orders.receiverUserID','orders.senderUserID','orders.status','orders.created_at','orders.updated_at','products.title','products.image','products.price','products.cargo','products.cargopayment','products.cargocompany')
            ->join('products','orders.productID','=','products.id')
            ->where('orders.id',$id)
            ->first();

        #Ürünü Alan
        $ReceiveUser=User::where('id',$Orders->receiverUserID)->first();
        #Ürünü Satan
        $SenderUser=User::where('id',$Orders->senderUserID)->first();

        return view('admin/siparisdetay',compact('Orders','ReceiveUser','SenderUser'));
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
        /*
        #Gelen durum kontrol et ve işlem yap
        switch ($request->SiparisDurum){

            #Ürün Hazırlanıyor
            case "Ürün Hazırlanıyor":

                //Eğer sipariş teslim edilmiş ise satıcının hesabına tanımlanmış lokumu geri al
                if($request->status=="Teslim Edildi")
                {

                }


                break;

            #Kargoda
            case "Kargoda":

                echo "Kargoda";
                break;

            #teslim Edildi
            case "Teslim Edildi":
                echo "Teslim";
                break;

            #iptal edildi
            case "İptal Edildi":
                echo "İptal";

                break;

        }
        */

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
