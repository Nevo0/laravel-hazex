<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
        // https://youtu.be/MFh0Fd7BsjE?t=3722
    }
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // dd('abc'); zabija strone i wyswietla to co jest w srodku
        // dump( $request );
        $this->validate($request, [
            // mozemy walidować formularz, mamu dostęp do funkcji dzięki temu ze dziedziczymy po Controller
            // https://youtu.be/MFh0Fd7BsjE?t=2067
            'name'=> 'required|max:255',
            'username'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'usernaem'=> ['require', 'max:255'],
            'password'=> 'required|confirmed'

        ]);
        User::create(
            [
                'name' => $request->name,
                'username'=> $request->username,
                'email'=>$request->email,
                'password'=> Hash::make($request->password)
            ]
            );
            // auth()->attempt(['email' => $request->email, 'password' => $request->password]);
            Auth::attempt($request->only('email', 'password'));

return redirect()->route('dashboard');

    }
}
