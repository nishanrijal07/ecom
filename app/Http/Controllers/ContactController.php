<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    

    public function showForm()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'required|string|max:500',
        ]);

        Contact::create($validated);

       
        toastr()->timeOut(5000)->closeButton()->addSuccess('Message sent successfully!');
        return redirect()->back();
    }
}
