<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\to_do_list;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function SendRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5'
        ]);
        // User::create([
        //     'name'=>$request->name,
        //     'username'=>$request->username,
        //     'password'=>md5($request->password)
        // ]);
        //USING ANOTHER METHOD

        $user = new User;
        $user->name = $request['name'];
        $user->username = $request['username'];
        $user->password = Hash::make($request['password']);
        if ($user->save()) {
            return back()->with('success', 'You are successfully registered!');
        }
    }
    public function SendLogin(Request $request)
    {
        $validated = $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ]
        );
        if (Auth::attempt($validated,true)) {
            
            return redirect()->to('dashboard');
        } else {
            return back()->with('error', 'Invalid Credentials');
        }
    }
    public function Logout()
    {
        Auth::logout();
        session()->flush();   
        return redirect()->to('login');  
           
    }
}
