<?php

namespace App\Http\Controllers\Product;

use App\Product;
use App\Promotions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PromotionalController extends Controller
{
    public function index(){
        $product = Product::orderBy('name', 'ASC')->get();
        $table = Promotions::orderBy('name', 'ASC')->get();
        return view('product.promotional')->with(['table' => $table, 'product' => $product]);
    }

    public function save(Request $request){

        $date_rang = date_time_range($request->dateRang);

        $table = new Promotions();
        $table->name = $request->name;
        $table->description = $request->description;
        $table->productID = $request->productID;
        $table->starts = $date_rang[0];
        $table->ends = $date_rang[1];

        if($request->hasFile('img')){
            $fileName = md5(date('d-m-y H:i:s')).'.jpg';

            //############ 500X290 ###########
            $thumbs_md = Image::make($request->file('img'));
            $thumbs_md->resize(500, 290, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbs_md->resizeCanvas(500, 290, 'center', false, 'rgba(255, 255, 255, 255)');
            $imageStream_md = $thumbs_md->stream('jpg');

            Storage::disk('product')->put($fileName, $imageStream_md->__toString());
            //############ 500X290 ###########

            $table->img = $fileName;

        }
        $table->save();

        return redirect()->back()->with(config('naz.save'));

    }

    public function edit(Request $request){

        $date_rang = date_time_range($request->dateRang);

        $table = Promotions::find($request->id);
        $table->name = $request->name;
        $table->description = $request->description;
        $table->productID = $request->productID;
        $table->starts = $date_rang[0];
        $table->ends = $date_rang[1];

        $img = $table->img;

        if($request->hasFile('img')) {
            $exists = Storage::disk('product')->exists($img);
            if($exists){
                Storage::disk('product')->delete($img);
            }

            $fileName = md5(date('d-m-y H:i:s')).'.jpg';

            //############ 500X290 ###########
            $thumbs_md = Image::make($request->file('img'));
            $thumbs_md->resize(500, 290, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbs_md->resizeCanvas(500, 290, 'center', false, 'rgba(255, 255, 255, 255)');
            $imageStream_md = $thumbs_md->stream('jpg');

            Storage::disk('product')->put($fileName, $imageStream_md->__toString());
            //############ 500X290 ###########

            $table->img = $fileName;
        }

        $table->save();

        return redirect()->back()->with(config('naz.edit'));

    }

    public function del($id){
        $table = Promotions::find($id);
        $img = $table->img;

        $exists = Storage::disk('product')->exists($img);

        if($exists){
            Storage::disk('product')->delete($img);
        }

        $table->delete();

        return redirect()->back()->with(config('naz.del'));
    }
}
