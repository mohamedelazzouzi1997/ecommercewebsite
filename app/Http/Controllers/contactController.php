<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class contactController extends Controller
{
    //

    public function contact(){

        return view('contact.contact');
    }

    public function sendMsg(Request $request){

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->msg = $request->msg;
        $contact->save();

        return redirect()->back()->with(['success'=> 'Your message has been sent successfully']);
    }
}
