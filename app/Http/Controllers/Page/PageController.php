<?php

namespace App\Http\Controllers\Page;

use App\Pages;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(){
        $about = Pages::where('name', 'about')->first();
        $contact = Pages::where('name', 'contact')->first();
        $checkout = Pages::where('name', 'checkout')->first();
        return view('page.contant')->with(['about' => $about, 'contact' => $contact, 'checkout' => $checkout]);
    }

    public function about(Request $request){
       // dd($request->all());

        $detail=$request->contant;

        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/page/'. $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', asset('public//page/'.$image_name));
        }

        $detail = $dom->savehtml();

        $check = Pages::where('name', 'about')->first();
        if($check == null){
            $table = new Pages();
            $table->name = 'about';
            $table->content = $detail;
            $table->save();
        }else{
            $table = Pages::find($check->pagesID);
            $table->content = $detail;
            $table->save();
        }

        return redirect()->back()->with(config('naz.edit'));
    }

    public function contact(Request $request){
        $detail=$request->contant;

        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/page/'. $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', asset('public//page/'.$image_name));
        }

        $detail = $dom->savehtml();

        $check = Pages::where('name', 'contact')->first();
        if($check == null){
            $table = new Pages();
            $table->name = 'contact';
            $table->content = $detail;
            $table->save();
        }else{
            $table = Pages::find($check->pagesID);
            $table->content = $detail;
            $table->save();
        }

        return redirect()->back()->with(config('naz.edit'));
    }


    public function bank(Request $request){
        $detail=$request->contant;

        $dom = new \DOMDocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');

        foreach($images as $k => $img){
            $data = $img->getattribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $path = public_path() .'/page/'. $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', asset('public//page/'.$image_name));
        }

        $detail = $dom->savehtml();

        //Cart Page
        $check = Pages::where('name', 'cart')->first();
        if($check == null){
            $table = new Pages();
            $table->name = 'cart';
            $table->content = $detail;
            $table->save();
        }else{
            $table = Pages::find($check->pagesID);
            $table->content = $detail;
            $table->save();
        }
        //Cart Page

        //Checkout Page
        $checkx = Pages::where('name', 'checkout')->first();
        if($checkx == null){
            $tablex = new Pages();
            $tablex->name = 'checkout';
            $tablex->content = $detail;
            $tablex->save();
        }else{
            $tablex = Pages::find($checkx->pagesID);
            $tablex->content = $detail;
            $tablex->save();
        }
        //Checkout Page
        return redirect()->back()->with(config('naz.edit'));
    }
}
