<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller

// auth()->user()
{
    public function __construct(){
        $this->middleware(['guest']);
        // https://youtu.be/MFh0Fd7BsjE?t=3722
    }
    public function index(){

        // dump(auth()->user());
        return view('auth.login');
    }
    public function store (Request $request){
        // dd($request->remember);
        $this->validate($request, [
            // mozemy walidować formularz, mamu dostęp do funkcji dzięki temu ze dziedziczymy po Controller
            // https://youtu.be/MFh0Fd7BsjE?t=3021
            'email'=> 'required|email|',
            'usernaem'=> ['require'],
        ]);
        if (!Auth::attempt($request->only('email', 'password'),$request->remember)) {
            // remember  https://youtu.be/MFh0Fd7BsjE?t=3899
            # code...
            return back()->with('status','Incorect login details');
        }
        return redirect()->route('dashboard');

    }
}
