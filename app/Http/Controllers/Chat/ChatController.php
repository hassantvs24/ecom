<?php

namespace App\Http\Controllers\Chat;

use App\Chat;
use App\ChatHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        $table = Chat::orderBy('chatID', 'DESC')->get();
        return view('chat.chat')->with(['table' => $table]);
    }

    public function start($id){
        $table = Chat::find($id);
        $status = $table->status;
        $adminID = $table->adminID;
        $customer = $table->name;

        if($status == 'Active'){
            if($adminID != Auth::user()->id)
            return redirect()->back()->with(['message' => 'Already another admin active',  'alert-type' => 'error']);
        }

        $table->adminID = Auth::user()->id;
        $table->adminName = Auth::user()->name;
        $table->status = 'Active';
        $table->save();

        return view('chat.live')->with(['id' => $id, 'customer' => $customer, 'adminID' => Auth::user()->id, 'adminName' => Auth::user()->name]);

    }

    public function messaging(Request $request){
        $chat = Chat::find($request->chatID);
        $status = $chat->status;

        if($status != 'End'){
            $table = new ChatHistory();
            $table->chatID = $request->chatID;
            $table->message = $request->message;
            $table->name = $request->name;
            $table->fromType = 'Admin';
            $table->save();

            return 1;
        }else{
            return 2;
        }
    }


    public function chat_history($id){
        $table = ChatHistory::where('chatID', $id)->orderBy('chatHistoryID', 'ASC')->get();
        return view('box.chat_light_admin')->with(['table' => $table]);
    }

    public function end_chat($id){
        $table = Chat::find($id);
        $table->status = 'End';
        $table->save();
        return redirect()->route('adchat')->with(['message' => 'Chat conversation end.',  'alert-type' => 'success']);
    }


    public function del_chat($id){
        $table = Chat::find($id);
        $table->delete();
        return redirect()->back()->with(config('naz.del'));
    }

}
