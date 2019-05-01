<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class LoginController extends Controller
{
    public function index(){
      // $configTable = DB::table('configs')->where('name', '=', 'maintenance')->get();
      // $maintenance = false;
      // if($configTable[0]->value == 'on')
      // {
      //   $maintenance = true;
      // }
      return view('login'
      // , [
      //   'maintenance' => $maintenance
      // ]
    );
    }
    public function login(){
        $loginWasSuccessful = Auth::attempt([
          'email' => request('email'),
          'password' => request('password')
        ]);
        if($loginWasSuccessful)
        {
          return redirect('/profile');
        }
        else {
          return redirect('/login');
        }
    }

    public function logout(){
      Auth::logout();
      return redirect('/login');
    }
}
