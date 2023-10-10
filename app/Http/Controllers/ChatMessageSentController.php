<?php

namespace App\Http\Controllers;
use App\Events\ChatMessageSent;

use Illuminate\Http\Request;

class ChatMessageSentController extends Controller
{
    
    public function sentMessage(Request $request) {

        $request->validate([
            'name' => 'required',
            'text' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'text' => $request->text,
        ];
        event(new ChatMessageSent($data));
    
        return response()->json(['message' => 'Message sent to the public channel']);
    }
}
