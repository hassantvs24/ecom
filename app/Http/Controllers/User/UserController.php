<?php

namespace App\Http\Controllers\User;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $table = User::where('isAdmin', 'YES')->where('userLevel', 'Admin')->get();
        $role = Role::orderBy('name', 'ASC')->get();
        return view('user.user')->with(['table' => $table, 'role' => $role]);
    }


    public function save(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roleID' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => 'Oh! From Validation error!! Please try again.']);

        }else{
            $table = new User();
            $table->name = $request->name;
            $table->email = $request->email;
            $table->roleID = $request->roleID;
            $table->userLevel = 'Admin';
            $table->isAdmin = 'YES';
            $table->password = bcrypt($request->password);
            $table->save();
            return redirect()->back()->with(['message' => 'New User Save Successfully']);
        }

    }

    public function edit(Request $request){

        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric',
            'name' => 'required|string|min:2',
            //'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'roleID' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => 'Oh! From Validation error!! Please try again.']);

        }else{
            $table = User::find($request->id);
            $table->name = $request->name;
            $table->email = $request->email;
            $table->roleID = ($request->id == 1 ? 1:$request->roleID) ;
            $table->password = bcrypt($request->password);
            $table->save();
            return redirect()->back()->with(['message' => 'User Edit Successfully']);
        }

    }


    public function del($id){
        $table = User::find($id);
        $table->delete();

        return redirect()->back()->with(['message' => 'User Delete Successfully']);
    }

}
