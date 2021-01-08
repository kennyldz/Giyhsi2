<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactReply;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function GuzzleHttp\Psr7\str;

class CategoryController extends Controller
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
        //Aktif
        $Active=Category::where('status','aktif')->count();
        //Pasif
        $Deactive=Category::where('status','pasif')->count();

        //Kategoriler
        $Kategoriler=Category::all();

        return view('admin/kategoriler',compact('Active','Deactive','Kategoriler'));
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
        $Kategori=new Category();
        $Kategori->name=$request->KategoriAdi;
        $Kategori->slug=Str::slug($request->KategoriAdi);
        $Kategori->status="aktif";
        $Kategori->save();

        return redirect('admin/kategoriislemler');

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
        #Kategori Düzenle
        $Kategori=Category::where('id',$id)->first();

        #Kategoriye ait ürün sayısı
        $Product=Product::where('categoryID',$id)->count();

        return view('admin/kategoriduzenle',compact('Kategori','Product'));

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
        switch ($request->guncelle){

            case "DurumGuncelle":

                Category::where('id',$id)->update([
                   "status"=>$request->KategoriDurum
                ]);

                break;

            case "IsimGuncelle":

                Category::where('id',$id)->update([
                   "name"=>$request->KategoriAdi,
                    "slug"=>Str::slug($request->KategoriAdi)
                ]);

                break;
        }

        return redirect('admin/kategoriislemler');

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
