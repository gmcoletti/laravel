<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }
    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|min:5',
            'contact' => 'required|digits:9',
            'email'   => 'required|email|unique:contacts',
        ]);
        Contact::create($request->all());

        return redirect()->route('contacts.create')->with('success', 'Contact created successfully!');
    }
}
