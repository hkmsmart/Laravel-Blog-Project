<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function getMessage(){
        $messages = Contact::orderby('created_at','desc')->get();
        return view('back.message.index',compact('messages'));
    }
}
