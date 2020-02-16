<?php

namespace App\Http\Controllers\Advertise;

use App\Advertise;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdvertiseController extends Controller
{
    public function index(){
        $table = Advertise::orderBy('created_at', 'DESC')->get();
        return view('advertisement.advertise')->with(['table' => $table]);
    }

    public function save(Request $request){
      //  dd($request->all());
        DB::beginTransaction();
        try {

        $date_rang = date_time_range($request->dateRang);

        $table = new Advertise();
        $table->name = $request->name;
        $table->description = $request->description;
        $table->starts = $date_rang[0];
        $table->ends = $date_rang[1];

        if($request->hasFile('img')){
            $fileName = md5(date('d-m-y H:i:s')).'.jpg';
            //############ 1920X570 ###########
            $thumbs_sx = Image::make($request->file('img'));
            $thumbs_sx->resize(1920, 570, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbs_sx->resizeCanvas(1920, 570, 'center', false, 'rgba(255, 255, 255, 255)');
            $imageStream_sx = $thumbs_sx->stream('jpg');

            Storage::disk('product')->put($fileName, $imageStream_sx->__toString());
            //############ 1920X570 ###########

            $table->img = $fileName;
        }

            $table->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
            }

        return redirect()->back()->with(config('naz.save'));

    }


    public function edit(Request $request){

        DB::beginTransaction();
        try {

            $date_rang = date_time_range($request->dateRang);

            $table = Advertise::find($request->id);
            $table->name = $request->name;
            $table->description = $request->description;
            $table->starts = $date_rang[0];
            $table->ends = $date_rang[1];

            if($request->hasFile('img')){
                $img = $table->img;
                $exists = Storage::disk('product')->exists($img);

                if($exists){
                    Storage::disk('product')->delete($img);
                }

                $fileName = md5(date('d-m-y H:i:s')).'.jpg';
                //############ 1920X570 ###########
                $thumbs_sx = Image::make($request->file('img'));
                $thumbs_sx->resize(1920, 570, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(1920, 570, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream_sx->__toString());
                //############ 1920X570 ###########

                $table->img = $fileName;
            }

            $table->save();


            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        DB::beginTransaction();
        try {
            $table = Advertise::find($id);
            $img = $table->img;

            $exists = Storage::disk('product')->exists($img);

            if($exists){
                Storage::disk('product')->delete($img);
            }

            $table->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('naz.del'));
    }

    public function active($id){
        $table = Advertise::find($id);
        $status = $table->status;

        if($status == 'Active'){
            $table->status = 'Inactive';
        }else{
            $table->status = 'Active';
        }
        $table->save();

        return redirect()->back()->with(config('naz.edit'));
    }

}
