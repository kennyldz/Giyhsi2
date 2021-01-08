<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\HesapDurum;
use App\Mail\YeniSifre;
use App\Models\ContactReply;
use App\Models\Delight;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
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

        #Aktif Üye sayısını al
        $Active=User::where('status','aktif')->count();

        #Pasif Üye Sayısını Al
        $DeActive=User::where('status','pasif')->count();

        $Users=User::all();

        return view('admin/uyeler',compact('Active','DeActive','Users'));

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
        //Üye bilgiler
        $User=User::where('id',$id)->first();

        //Ürün Sayısı
        $ProductCount=Product::where('userID',$id)->get();

        //Sipariş Sayısı
        //$OrderCount=Order::where('receiverUserID',$id)->get();

        $OrderCount=DB::table('orders')
            ->select('orders.id','orders.status','orders.created_at','orders.updated_at','products.image','products.title')
            ->join('products','orders.productID','=','products.id')
            ->where('receiverUserID',$id)
            ->get();

        //Lokum
        $Delights=Delight::where('userID',$id)->orderByDesc('id')->first();

       $Delightslist=Delight::where('userID',$id)->get();

        return view('admin/uyeduzenle',compact('User','ProductCount','OrderCount','Delights','Delightslist'));
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
        #üye bilgi ve şifre değiştir
        switch ($request->Kaydet){

            #Üye durum ve lokum tanımlama
            case "bilgi":

                $data=[];
                $data['name']=$request->name;
                $data['email']=$request->email;

                if($request->durum!=$request->UyeDurum){
                    User::where('id',$id)->update([
                        "status"=>$request->UyeDurum
                    ]);

                    $data['durum']=$request->UyeDurum;

                }else{
                    $data['durum']="";
                }


                if($request->LokumTanimla!=NULL){
                    $DelightUpdate=new Delight();
                    $DelightUpdate->userID=$id;
                    $DelightUpdate->amount=$request->lokum+$request->LokumTanimla;
                    $DelightUpdate->check=$request->lokumkontrol;
                    $DelightUpdate->detail="Hesabınıza +$request->LokumTanimla lokum tanımlaması yapılmıştır ";
                    $DelightUpdate->save();

                    $data['lokum']=$request->LokumTanimla;

                }else{
                    $data['lokum']="";
                }


                Mail::to($request->email)->send(new HesapDurum($data));

                break;

             #şifre değişikliği için
            case "sifre":

                User::where('id',$id)->update([
                   "password"=>Hash::make($request->Sifre)
                ]);

                $data=[];
                $data['name']=$request->name;
                $data['email']=$request->email;
                $data['password']=$request->Sifre;

                Mail::to($request->email)->send(new YeniSifre($data));

                break;

        }

        return redirect('admin/uyeislemler');

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
