<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Filesystem\Cache;
use Illuminate\Http\Request;

class UserController extends Controller
{


    function allUsers()
    {

        $datap['users'] = User::get();
        $datap['user'] = User::where('email', 'rafal@rafal.pi')->first();
        $datap['user1'] = User::find(2);
        // $datap['user_id'] = User::findOrFail(3);
        // ^jesli nie bedzie usera to bedzie błąd^
        $datap['data'] = 123;
        $datap['name'] = "Rafał";
        $pogoda = \Cache::get('pogoda');
        $datap['pogoda'] = $pogoda;

        dump($datap);
        return view('user.home', compact('datap'));
    }
    function idUser($id_user)
    {
        $datap['users'] = User::get();
        $datap['user'] = User::where('email', 'rafal@rafal.pi')->first();
        $datap['user1'] = User::find(2);
        // $datap['user_id'] = User::findOrFail($id_user);
        $datap['data'] = 123;
        $datap['name'] = "Rafał";
        dump($datap);
        return view('user.home', compact('datap'));
    }
    function createUser()
    {

        $datap['users'] = User::get();
        $datap['user'] = User::where('email', 'rafal@rafal.pi')->first();
        $datap['user1'] = User::find(2);
        // $datap['user_id'] = User::findOrFail($id_user);
        $datap['data'] = 123;
        $datap['name'] = "Rafał";
        dump($datap);
        return view('user.create');
    }
    function seveUser(Request $request)
    {

        $datap['users'] = User::get();
        $datap['user'] = User::where('email', 'rafal@rafal.pi')->first();
        $datap['user1'] = User::find(2);
        // $datap['user_id'] = User::findOrFail($id_user);
        $datap['data'] = 123;
        $datap['name'] = "Rafał";
        $datap['request'] = $request;
        $datap['requestparametersx'] = $request->request;
        $datap['requestparameters'] = $request->all();
        $datap['nameu'] = $request->name;
        $datap['emailu'] = $request->email;
        $datap['passwordu'] = $request->password;
        dump($datap);
        // return view('user.create');
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect()->back()->with('success', 'User has been added successfully');
    }
}
