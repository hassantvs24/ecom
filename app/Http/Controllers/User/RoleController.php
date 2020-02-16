<?php

namespace App\Http\Controllers\User;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index(){
        $table = Role::orderBy('name', 'ASC')->get();
        return view('user.role')->with(['table' => $table]);
    }

    public function save(Request $request){
        $table = new Role();
        $table->name = $request->name;
        $table->save();
        return redirect()->back()->with(config('naz.save'));
    }


    public function edit(Request $request){
        $table = Role::find($request->id);
        $table->name = $request->name;
        $table->save();
        return redirect()->back()->with(config('naz.edit'));
    }

    public function del($id){
        $table = Role::find($id);
        $table->delete();

        return redirect()->back()->with(config('naz.del'));
    }


    public function permission($id){
        $table = Permission::where('roleID', $id)->get();
        return view('box.lightbox.permission')->with(['id' => $id, 'table' => $table]);
    }

    public function update_permission(Request $request){

        Permission::where('roleID', $request->id)->delete();

        if($request->has('permission')){
            $permit = $request->permission;

            foreach ($permit as $key => $row){
                $table = new Permission();
                $table->roleID = $request->id;
                $table->name = $row;
                $table->values = $key;
                $table->save();
            }
        }

        return redirect()->back()->with(config('naz.edit'));
    }


}
