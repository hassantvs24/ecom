<?php

namespace App\Http\Controllers\Page;

use App\Pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BannerController extends Controller
{
    public function index(){
        $table = Pages::orderBy('name', 'ASC')->get();
        return view('page.banner')->with(['table' => $table]);
    }

    public function save(Request $request){



        $check = Pages::where('name', $request->name)->first();
        if($check == null){
            $table = new Pages();
            $table->name = $request->name;
            $table->title = $request->title;
            $table->subTitle = $request->subTitle;

            if($request->hasFile('img')){
                $fileName = $request->name.'.jpg';

                //############ 1920X239 ###########
                $img  = Image::make($request->file('img'));
                $img->crop(1920, 239);
                $imageStream_md = $img->stream('jpg');

                Storage::disk('slip')->put($fileName, $imageStream_md->__toString());
                //############ 1920X239 ###########

                $table->img = $fileName;

            }

            $table->save();
        }else{
            $table = Pages::find($check->pagesID);
            $table->title = $request->title;
            $table->subTitle = $request->subTitle;

            if($request->hasFile('img')){
                $fileName = $request->name.'.jpg';

                //############ 1920X239 ###########
                $img  = Image::make($request->file('img'));
                $img->crop(1920, 239);
                $imageStream_md = $img->stream('jpg');

                Storage::disk('slip')->put($fileName, $imageStream_md->__toString());
                //############ 1920X239 ###########

                $table->img = $fileName;

            }

            $table->save();
        }

        //Artisan::call('view:cache');
        return redirect()->route('banner')->with(config('naz.edit'));
    }
}
