<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message; 

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Message::create($request->all());
        toastr()->timeOut(10000)->closeButton()->addSuccess('Message Sent Successfully');
        return redirect()->back();
    }
}
