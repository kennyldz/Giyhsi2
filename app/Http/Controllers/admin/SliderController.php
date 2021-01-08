<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactReply;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SliderController extends Controller
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

        //Sliders
        $Sliders=Slider::all();

        return view('admin/slider',compact('Sliders'));
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
        #slider Ekle
        $Slider=new Slider();
        if($request->hasFile('SliderGorsel')){

            $imageName=Str::slug($request->SliderGorsel).'.'.$request->SliderGorsel->getClientOriginalExtension();
            $request->SliderGorsel->move(public_path('uploads'),$imageName);
            $Slider->image='uploads/'.$imageName;
        }

        $Slider->bigslogan=$request->BuyukSlogan;
        $Slider->smallslogan=$request->kucukSlogan;
        $Slider->sliderlink=$request->Link;

        $Slider->save();

       return redirect('admin/sliderislemler');

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
        #Slider düzenle
        $Slider=Slider::where('id',$id)->first();

        return view('admin/sliderduzenle',compact('Slider'));
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
        //Bilgi güncelle
        if($request->hasFile('SliderGorsel')){

            $imageName=Str::slug($request->SliderGorsel).'.'.$request->SliderGorsel->getClientOriginalExtension();
            $request->SliderGorsel->move(public_path('uploads'),$imageName);

            Slider::where('id',$id)->update([
               "image"=> 'uploads/'.$imageName
            ]);

        }

        Slider::where('id',$id)->update([
           "bigslogan"=>$request->anaslogan,
            "smallslogan"=>$request->altslogan,
            "sliderlink"=>$request->sliderlink,
            "durum"=>$request->SliderDurum
        ]);


        return redirect('admin/sliderislemler');

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
