<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $view = true;
        return view('contacts.index', compact('contacts','view'));
    }
    public function list()
    {
        $contacts = Contact::all();
        $view = false;

        return view('contacts.index', compact('contacts','view'));
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
    // app/Http/Controllers/ContactController.php

    public function edit(Contact $contact)
    {
        return view('contacts.create', compact('contact'));
    }
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name'    => 'required|string|min:5',
            'contact' => 'required|digits:9',
            'email'   => 'required|email|unique:contacts,email,'.$contact->id,
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

}
