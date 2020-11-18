<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
        // Middleware\Authenticate redirect to login route

    }
    public function index(){
        dump(auth()->user()->posts);
        // https://youtu.be/MFh0Fd7BsjE?t=4691
        dump(auth()->user());
        return view('dashboard');
    }
}
