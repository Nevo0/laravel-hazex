<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd('abc'); zabija strone i wyswietla to co jest w srodku
        $this->validate($request, [
            // mozemy walidować formularz, mamu dostęp do funkcji dzięki temu ze dziedziczymy po Controller
            // https://youtu.be/MFh0Fd7BsjE?t=2067
            'naem'=> 'require|max:255',
            'usernaem'=> ['require', 'max:255']
            
        ]);
        dump($request->name);
    }
}
