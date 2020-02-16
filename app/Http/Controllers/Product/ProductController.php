<?php

namespace App\Http\Controllers\Product;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
        $table =Product::orderBy('created_at', 'DESC')->get();
        $category =Product::select('category')->orderBy('category','ASC')->where('category', '<>', null)->groupBy('category')->get();
        return view('product.product')->with([ 'table' => $table, 'category' => $category]);
    }

    public function save(Request $request){


      //  dd($request->all());

        DB::beginTransaction();
        try {

            $table = new Product();
            $table->sku = $request->sku;
            $table->category = $request->category;
            $table->name = $request->name;
            $table->price = $request->price;
            $table->pre_price = $request->pre_price;
            $table->weight = $request->weight;
            $table->s_commission = $request->s_commission;
            $table->d_commission = $request->d_commission;
            $table->review = $request->review;
            $table->rating = $request->rating;
            $table->notes = Str::limit($request->notes, 185);
            $table->description = $request->description;

            if($request->hasFile('img')){
                $fileName = md5(date('d-m-y H:i:s')).'.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img = $fileName;

            }

            if($request->hasFile('img_one')){
                $fileName = md5(date('d-m-y H:i:s')).'_one.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img_one'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img_one'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img_one'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img_one'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img_one = $fileName;

            }

            if($request->hasFile('img_two')){
                $fileName = md5(date('d-m-y H:i:s')).'_two.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img_two'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img_two'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img_two'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img_two'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img_two = $fileName;
            }

            if($request->hasFile('img_tree')){
                $fileName = md5(date('d-m-y H:i:s')).'_tree.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img_tree'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img_tree'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img_tree'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img_tree'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img_tree = $fileName;
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
        //dd($request->all());

            $table = Product::find($request->id);

            $table->sku = $request->sku;
            $table->category = $request->category;
            $table->name = $request->name;
            $table->price = $request->price;
            $table->pre_price = $request->pre_price;
            $table->weight = $request->weight;
            $table->s_commission = $request->s_commission;
            $table->d_commission = $request->d_commission;
            $table->review = $request->review;
            $table->rating = $request->rating;
            $table->notes = Str::limit($request->notes, 185);
            $table->description = $request->description;

            $img = $table->img;
            $img_one = $table->img_one;
            $img_two = $table->img_two;
            $img_tree = $table->img_tree;

            if($request->hasFile('img')){
                $exists = Storage::disk('product')->exists($img);
                $exists_sx = Storage::disk('product')->exists('sx_'.$img);
                $exists_sm = Storage::disk('product')->exists('sm_'.$img);
                $exists_md = Storage::disk('product')->exists('md_'.$img);

                if($exists){
                    Storage::disk('product')->delete($img);
                }

                if($exists_sx){
                    Storage::disk('product')->delete('sx_'.$img);
                }

                if($exists_sm){
                    Storage::disk('product')->delete('sm_'.$img);
                }

                if($exists_md){
                    Storage::disk('product')->delete('md_'.$img);
                }

                $fileName = md5(date('d-m-y H:i:s')).'.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img = $fileName;

            }

            if($request->hasFile('img_one')){

                $exists_one = Storage::disk('product')->exists($img_one);
                $exists_one_sx = Storage::disk('product')->exists('sx_'.$img_one);
                $exists_one_sm = Storage::disk('product')->exists('sm_'.$img_one);
                $exists_one_md = Storage::disk('product')->exists('md_'.$img_one);

                if($exists_one){
                    Storage::disk('product')->delete($img_one);
                }

                if($exists_one_sx){
                    Storage::disk('product')->delete('sx_'.$img_one);
                }

                if($exists_one_sm){
                    Storage::disk('product')->delete('sm_'.$img_one);
                }

                if($exists_one_md){
                    Storage::disk('product')->delete('md_'.$img_one);
                }

                $fileName = md5(date('d-m-y H:i:s')).'_one.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img_one'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img_one'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img_one'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img_one'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img_one = $fileName;

            }

            if($request->hasFile('img_two')){
                $exists_two = Storage::disk('product')->exists($img_two);
                $exists_two_sx = Storage::disk('product')->exists('sx_'.$img_two);
                $exists_two_sm = Storage::disk('product')->exists('sm_'.$img_two);
                $exists_two_md = Storage::disk('product')->exists('md_'.$img_two);

                if($exists_two){
                    Storage::disk('product')->delete($img_two);
                }

                if($exists_two_sx){
                    Storage::disk('product')->delete('sx_'.$img_two);
                }

                if($exists_two_sm){
                    Storage::disk('product')->delete('sm_'.$img_two);
                }

                if($exists_two_md){
                    Storage::disk('product')->delete('md_'.$img_two);
                }

                $fileName = md5(date('d-m-y H:i:s')).'_two.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img_two'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img_two'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img_two'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img_two'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img_two = $fileName;

            }

            if($request->hasFile('img_tree')){
                $exists_tree = Storage::disk('product')->exists($img_tree);
                $exists_tree_sx = Storage::disk('product')->exists('sx_'.$img_tree);
                $exists_tree_sm = Storage::disk('product')->exists('sm_'.$img_tree);
                $exists_tree_md = Storage::disk('product')->exists('md_'.$img_tree);

                if($exists_tree){
                    Storage::disk('product')->delete($img_tree);
                }

                if($exists_tree_sx){
                    Storage::disk('product')->delete('sx_'.$img_tree);
                }

                if($exists_tree_sm){
                    Storage::disk('product')->delete('sm_'.$img_tree);
                }

                if($exists_tree_md){
                    Storage::disk('product')->delete('md_'.$img_tree);
                }

                $fileName = md5(date('d-m-y H:i:s')).'_tree.jpg';

                //############ 80X82 ###########
                $thumbs_sx = Image::make($request->file('img_tree'));
                $thumbs_sx->resize(82, 80, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sx->resizeCanvas(82, 80, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sx = $thumbs_sx->stream('jpg');

                Storage::disk('product')->put('sx_'.$fileName, $imageStream_sx->__toString());
                //############ 80X82 ###########

                //############ 120X90 ###########
                $thumbs_sm = Image::make($request->file('img_tree'));
                $thumbs_sm->resize(90, 120, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_sm->resizeCanvas(90, 120, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_sm = $thumbs_sm->stream('jpg');

                Storage::disk('product')->put('sm_'.$fileName, $imageStream_sm->__toString());
                //############ 120X90 ###########

                //############ 364X272 ###########
                $thumbs_md = Image::make($request->file('img_tree'));
                $thumbs_md->resize(272, 364, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs_md->resizeCanvas(272, 364, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream_md = $thumbs_md->stream('jpg');

                Storage::disk('product')->put('md_'.$fileName, $imageStream_md->__toString());
                //############ 364X272 ###########

                //############ 675X505 ###########
                $thumbs = Image::make($request->file('img_tree'));
                $thumbs->resize(505, 675, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbs->resizeCanvas(505, 675, 'center', false, 'rgba(255, 255, 255, 255)');
                $imageStream = $thumbs->stream('jpg');

                Storage::disk('product')->put($fileName, $imageStream->__toString());
                //############ 675X505 ###########

                $table->img_tree = $fileName;

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
            $table = Product::find($id);
            $img = $table->img;
            $img_one = $table->img_one;
            $img_two = $table->img_two;
            $img_tree = $table->img_tree;

            $exists = Storage::disk('product')->exists($img);
            $exists_sx = Storage::disk('product')->exists('sx_'.$img);
            $exists_sm = Storage::disk('product')->exists('sm_'.$img);
            $exists_md = Storage::disk('product')->exists('md_'.$img);

            $exists_one = Storage::disk('product')->exists($img_one);
            $exists_one_sx = Storage::disk('product')->exists('sx_'.$img_one);
            $exists_one_sm = Storage::disk('product')->exists('sm_'.$img_one);
            $exists_one_md = Storage::disk('product')->exists('md_'.$img_one);

            $exists_two = Storage::disk('product')->exists($img_two);
            $exists_two_sx = Storage::disk('product')->exists('sx_'.$img_two);
            $exists_two_sm = Storage::disk('product')->exists('sm_'.$img_two);
            $exists_two_md = Storage::disk('product')->exists('md_'.$img_two);

            $exists_tree = Storage::disk('product')->exists($img_tree);
            $exists_tree_sx = Storage::disk('product')->exists('sx_'.$img_tree);
            $exists_tree_sm = Storage::disk('product')->exists('sm_'.$img_tree);
            $exists_tree_md = Storage::disk('product')->exists('md_'.$img_tree);

            //Primary Image
            if($exists){
                Storage::disk('product')->delete($img);
            }

            if($exists_sx){
                Storage::disk('product')->delete('sx_'.$img);
            }

            if($exists_sm){
                Storage::disk('product')->delete('sm_'.$img);
            }

            if($exists_md){
                Storage::disk('product')->delete('md_'.$img);
            }
            //Primary Image

            //Image One
            if($exists_one){
                Storage::disk('product')->delete($img_one);
            }

            if($exists_one_sx){
                Storage::disk('product')->delete('sx_'.$img_one);
            }

            if($exists_one_sm){
                Storage::disk('product')->delete('sm_'.$img_one);
            }

            if($exists_one_md){
                Storage::disk('product')->delete('md_'.$img_one);
            }
            //Image One

            //Image Two
            if($exists_two){
                Storage::disk('product')->delete($img_two);
            }

            if($exists_two_sx){
                Storage::disk('product')->delete('sx_'.$img_two);
            }

            if($exists_two_sm){
                Storage::disk('product')->delete('sm_'.$img_two);
            }

            if($exists_two_md){
                Storage::disk('product')->delete('md_'.$img_two);
            }
            //Image Two

            //Image Three
            if($exists_tree){
                Storage::disk('product')->delete($img_tree);
            }

            if($exists_tree_sx){
                Storage::disk('product')->delete('sx_'.$img_tree);
            }

            if($exists_tree_sm){
                Storage::disk('product')->delete('sm_'.$img_tree);
            }

            if($exists_tree_md){
                Storage::disk('product')->delete('md_'.$img_tree);
            }
            //Image Three

            $table->delete();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

        return redirect()->back()->with(config('naz.del'));
    }

    public function swap_img($id, $col){
        $table = Product::find($id);
        $img = $table->{$col};
        $pri = $table->img;
        $exists = Storage::disk('product')->exists($img);

        if($exists){
            $table->img = $img;
            $table->{$col} = $pri;
        }
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }

}
