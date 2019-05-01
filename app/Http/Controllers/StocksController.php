<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Schema;
use Auth;
use Validator;
class StocksController extends Controller
{
    public function index(Request $request){
        $query = DB::table('stocks')
          ->select('name');
        if($request->query('search'))
        {
          $query->where('name', '=', $request->query('search'));
        }
        $stocks = $query->get();
        return view('stocks', [
           'stocks' => $stocks,
           'search' => $request->query('search'),
           'user' => Auth::id()
        ]);
    }
    public function getStock($id, Request $request){
      if(Schema::hasTable($id))
      {
        $query = DB::table($id)
          ->orderBy('Date', 'desc');
        if($request->query('search'))
        {
          $query->where('Volume', '>', $input);
        }
        $stock = $query->get();
        //dd($query);
        return view('specificStock', [
          'Date' => $stock,
          'id' => $id
        ]);
      }
      else {
        return view('NoStock', [
          'name' => $id
        ]);
      }
    }
    public function addStock($stock, $user){
      if(DB::table('users_stock')->where('stock', '=', $stock)->where('id', '=', $user)->exists())
      {
        return redirect('/stocks');
      }
      else
      {
        DB::table('users_stock')->insert([
          'id'=>$user,
          'stock' => $stock
        ]);
      }
      return redirect('/profile');
    }

    public function search(Request $request, $id){
      return view('search', [
        'id' => $id
      ]);
    }

    public function getSearch(Request $request, $id)
    {
      $query = DB::table($id)
        ->orderBy('Date', 'desc');
      //dd($request);
      $this->validate($request,[
        'minVol' => 'numeric|nullable',
        'maxVol' => 'numeric|nullable',
        'minHigh' => 'numeric|nullable',
        'maxHigh' => 'numeric|nullable',
        'minLow' => 'numeric|nullable',
        'maxLow' => 'numeric|nullable',
        'minClose' => 'numeric|nullable',
        'maxClose' => 'numeric|nullable',
        'date' => 'date|nullable'
      ]);

      $minVol = $request->query('minVol');

      $maxVol = $request->query('maxVol');

      $minHigh = $request->query('minHigh');

      $maxHigh = $request->query('maxHigh');

      $minLow = $request->query('minLow');

      $maxLow = $request->query('maxLow');

      $minClose = $request->query('minClose');

      $maxClose = $request->query('maxClose');

      $date = $request->query('date');

      if($request->query('minVol'))
      {
        $query->where('Volume', '>', $minVol);
      }
      if($request->query('maxVol'))
      {
        $query->where('Volume', '<', $maxVol);
      }
      if($request->query('minHigh'))
      {
        $query->where('High', '>', $minHigh);
      }
      if($request->query('maxHigh'))
      {
        $query->where('High', '<', $maxHigh);
      }
      if($request->query('minLow'))
      {
        $query->where('Low', '>', $minClose);
      }
      if($request->query('maxLow'))
      {
        $query->where('Low', '<', $maxLow);
      }
      if($request->query('minClose'))
      {
        $query->where('Close', '>', $minClose);
      }
      if($request->query('maxClose'))
      {
        $query->where('Close', '<', $maxClose);
      }
      if($request->query('date'))
      {
        $query->whereDate('date', '>=', $date);
      }
      $searched = $query->get();
      return view('specificStock', [
        'Date' => $searched,
        'id' => $id
      ]);
    }

    public function deleteStock($stock){

    }
}
