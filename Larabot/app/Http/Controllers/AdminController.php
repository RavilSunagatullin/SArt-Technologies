<?php

namespace App\Http\Controllers;

use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users = TelegraphChat::all();
        return view('admin.index', compact('users'));
    }
    public function chat(TelegraphChat $chat){
        return view('admin.chat', compact('chat'));
    }
    public function send(Request $request){
        $text = $request->validate([
            'text'=>'required',
            'id'=>'required',
            'chat_id'=>'required'
        ]);
        $user = $text["chat_id"];
        try{
            $chat = TelegraphChat::find($text['id']);
            $chat->message( $text['text'])->send();
            return redirect()->route('chat', $text['id'])->with('status', "Успешное сообщение для $user");
        }
        catch (\Exception $exception){
            return redirect()->route('chat', $text['id'])->withErrors('Ошибка! Не удалось выполнить действие.');
        }
    }
    public function delete(TelegraphChat $chat){
        $chat->delete();
        return redirect()->route('admin');
    }
}
