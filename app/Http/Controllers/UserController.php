<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{


    function allUser()
    {
        $datap['users'] = User::get();
        $datap['data'] = 123;
        $datap['name'] = "Rafał";
        dump($datap);
        return view('user.home', compact('datap'));
    }
}
