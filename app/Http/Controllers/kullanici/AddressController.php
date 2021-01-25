<?php

namespace App\Http\Controllers\kullanici;

use App\Models\Addres;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AddressController extends kullanici
{
    public function __construct(){

        view()->share('categories',Category::where('status','aktif')->get());

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Sepetteki ürün sayısı ve ürün listesi
        $Query=['Beklemede','Ürün Hazırlanıyor','Kargoda'];
        $data['WaitOrder'] = DB::table('products')
            ->select('products.title','products.image','orders.status')
            ->join('orders', 'products.id','=','orders.productID')
            ->where('orders.receiverUserID', Auth::id())
            ->whereIn('orders.status',$Query)
            ->get();

        $adress=Addres::where('user_id',Auth::id())->orderByDesc('id')->paginate(3);

        return view('kullanici/adreslerim',$data,compact('adress',));
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
        $Adres=new Addres();
        $Adres->user_id=Auth::id();
        $Adres->address_name=$request->address_title;
        $Adres->address_province=$request->address_province;
        $Adres->address_district=$request->address_district;
        $Adres->address=$request->address;
        $Adres->name=$request->address_name;
        $Adres->telephone=$request->address_telephone;
        $Adres->save();

        return redirect('kullanici/hesabim/adreslerim');
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
        //
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
        $Adres=Addres::find($id);
        $Adres->address_name=$request->address_title;
        $Adres->address_province=$request->address_province;
        $Adres->address_district=$request->address_district;
        $Adres->address=$request->address;
        $Adres->name=$request->address_name;
        $Adres->telephone=$request->address_telephone;
        $Adres->save();

        return redirect('kullanici/hesabim/adreslerim');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Addres::destroy($id);

        return redirect('kullanici/hesabim/adreslerim');
    }
}
