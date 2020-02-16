<?php

namespace App\Http\Controllers\Redemption;

use App\Product;
use App\Redemption;
use App\RedemptionList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class RedemptionController extends Controller
{
    public function index(){
        $table = Redemption::orderBy('name', 'ASC')->get();
        return view('redemption.redemption')->with(['table' => $table]);
    }

    public function save(Request $request){

        $date_rang = date_time_range($request->dateRang);

        $table = new Redemption();
        $table->name = $request->name;
        $table->description = $request->description;
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

        $table = Redemption::find($request->id);
        $table->name = $request->name;
        $table->description = $request->description;
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
        $table = Redemption::find($id);
        $img = $table->img;

        $exists = Storage::disk('product')->exists($img);

        if($exists){
            Storage::disk('product')->delete($img);
        }

        $table->delete();

        return redirect()->back()->with(config('naz.del'));
    }

    public function list($id){
        $product = Product::orderBy('name', 'ASC')->get();
        $redemption = Redemption::find($id);
        $table = RedemptionList::where('redemptionID', $id)->orderBy('created_at', 'DESC')->get();
        return view('redemption.set_product')->with(['table' => $table, 'redemption' => $redemption, 'product' => $product]);
    }

    public function save_list(Request $request){
        if($request->point > 0){
            $table = new RedemptionList();
            $table->productID = $request->productID;
            $table->redemptionID = $request->redemptionID;
            $table->point = $request->point;
            $table->save();

            return redirect()->back()->with(config('naz.save'));
        }else{
            return redirect()->back()->with(config('naz.not_happen'));
        }


    }

    public function edit_list(Request $request){
        if($request->point > 0){
            $table = RedemptionList::find($request->id);
            $table->productID = $request->productID;
            $table->redemptionID = $request->redemptionID;
            $table->point = $request->point;
            $table->save();

            return redirect()->back()->with(config('naz.edit'));
        }else{
            return redirect()->back()->with(config('naz.not_happen'));
        }
    }

    public function del_list($id){
        $table = RedemptionList::find($id);
        $table->delete();

        return redirect()->back()->with(config('naz.del'));
    }


}
