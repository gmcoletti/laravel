<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username == 'adm' && $password == '123') {
            session(['authenticated' => true]);
            return response()->json(['success' => true, 'redirect' => route('contacts.index')]);
        }

        return response()->json(['success' => false, 'error' => 'Credenciais inválidas.']);
    }
}
