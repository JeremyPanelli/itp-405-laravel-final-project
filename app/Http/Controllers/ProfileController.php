<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ProfileController extends Controller
{
    public function index(){
      $query = DB::table('users_stock')
        ->where('id', '=', Auth::id())
        ->get();
      return view('/profile', [
        'stocks' => $query
      ]);
    }
    public function deleteStockFromProfile($stock){
      //dd($stock);
      $query = DB::table('users_stock')
        ->where('id', '=', Auth::id())
        ->where('stock', '=', $stock)
        ->delete();
      return redirect('/profile');
    }
}
