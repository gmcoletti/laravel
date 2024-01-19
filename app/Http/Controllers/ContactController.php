<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        $view = true;
        return view('contacts.index', compact('contacts','view'));
    }
    public function list()
    {
        $contacts = Contact::paginate(10);
        $view = false;

        return view('contacts.index', compact('contacts','view'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'    => 'required|string|min:5',
                'contact' => 'required|digits:9',
                'email'   => 'required|email|unique:contacts',
            ]);

            Contact::create($request->all());

            return response()->json(['success' => true, 'message' => 'Contact created successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function edit(Contact $contact)
    {
        return view('contacts.create', compact('contact'));
    }
    public function update(Request $request, Contact $contact)
    {
        try {
            $request->validate([
                'name'    => 'required|string|min:5',
                'contact' => 'required|digits:9',
                'email'   => 'required|email|unique:contacts,email,' . $contact->id,
            ]);

            $contact->update($request->all());

            return response()->json(['success' => true, 'message' => 'Contact updated successfully']);
        } catch (\Exception $e) {
            // Se ocorrer uma exceção (por exemplo, falha na validação), retorna erro.
            return response()->json(['success' => false, 'message' => $e->getMessage()], 422);
        }
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }

}
