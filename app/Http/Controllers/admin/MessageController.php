<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Mail\Bilgilendirme;

use App\Models\ContactReply;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
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
        //Gelen Mesajlar

        #Cevaplanan
        $Reply=ContactReply::where('status','cevaplandı')->count();

        #cevaplanmayan
        $Noreply=ContactReply::where('status','cevaplanmadı')->count();

        $Messages=DB::table('contacts')
            ->select('contacts.id','contacts.name','contacts.topic','contacts.created_at','contact_replies.status')
            ->leftJoin('contact_replies','contacts.id','=','contact_replies.contactID')
            ->get();

        return view('admin/gelenmesajlar',compact('Reply','Noreply','Messages'));

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
        //Gelen mesaj cevapla-oku
        $message=DB::table('contacts')
            ->select('contacts.id','contacts.name','contacts.telephone','contacts.email','contacts.topic','contacts.message','contacts.created_at','contact_replies.status','contact_replies.reply','contact_replies.updated_at')
            ->leftJoin('contact_replies','contacts.id','=','contact_replies.contactID')
            ->where('contacts.id',$id)
            ->first();

        return view('admin/gelenmesajcevap',compact('message'));
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
        //Mail cevap
        ContactReply::where('contactID',$id)->update([
           "reply"=>$request->cevap,
            "status"=>"cevaplandı"
        ]);

        //Mail bilgilendirme
        $data=[];
        $data['name']=$request->name;
        $data['topic']=$request->topic;
        $data['message']=$request->message;
        $data['created_at']=$request->created_at;
        $data['reply']=$request->cevap;

        Mail::to($request->email)->send(new Bilgilendirme($data));

        return redirect('admin/gelenmesajlar');

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
