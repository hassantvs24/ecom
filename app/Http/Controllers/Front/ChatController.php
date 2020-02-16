<?php

namespace App\Http\Controllers\Front;

use App\Chat;
use App\ChatHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function index(Request $request){
        $table = Chat::find($request->id);
        return view('front.chat')->with(['table' => $table]);
    }

    public function chat_req(Request $request){
        DB::beginTransaction();
        try {
        $table = new Chat();
        $table->name = $request->name;
        $table->email = $request->email;
        if($request->has('id')){
            $table->userID = $request->id;
        }
        $table->save();

        $id = $table->chatID;

        $quest = new ChatHistory();
        $quest->chatID = $id;
        $quest->message = $request->message;
        $quest->name = $request->name;
        $quest->fromType = 'Customer';
        $quest->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }
        return response()->json(['id' => $id]);

    }

    public function chat_customer(Request $request){
        $chat = Chat::find($request->chatID);
        $status = $chat->status;

        if($status != 'End'){
            $table = new ChatHistory();
            $table->chatID = $request->chatID;
            $table->message = $request->message;
            $table->name = $request->name;
            $table->fromType = 'Customer';
            $table->save();

            return 1;
        }else{
            return 2;
        }

    }

    public function chat_history($id){
        $table = ChatHistory::where('chatID', $id)->orderBy('chatHistoryID', 'ASC')->get();
        return view('box.chat_lightbox')->with(['table' => $table]);
    }

    public function admin_name($id){
        $table = Chat::find($id);

        $adminName = $table->adminName;

        if($adminName == ''){
            return 'Connecting ...';
        }else{
            return $adminName;
        }

    }

    public function end_chat($id){
        $table = Chat::find($id);
        $table->status = 'End';
        $table->save();
        return 1;
    }


}
