<?php

namespace App\Http\Controllers;
use App\Models\king;
use Illuminate\Http\Request;

class demo extends Controller
{
    public function showdemo()
    {
      $cars = king::all();
      return response()->json($cars);
    }
  public function createdemo(Request $request)
    {
    // dd($request->all());
     $this->validate($request,[
            'name' => 'required|max:20|unique:kings',
            'email' => 'required|email|unique:kings',
            'mobile' => 'required|max:10|min:3|unique:kings',
      ]);
      $car = new king;
      $car->name = $request->input('name');
      $car->email = $request->input('email');
      $car->mobile = $request->input('mobile');
      $car->api_token = app('hash')->make('kjhjsdhjkshdhsjdh');
 	    $car->save();
      return response()->json(['user' => $car , 'message' => 'CREATED'], 201);
    }
  public function updatedemo(Request $request, $id)
    {
      $car = king::find($id);
      $car->name = $request->input('name');
      $car->email = $request->input('email');
      $car->mobile = $request->input('mobile');
 	    $car->save();
      return response()->json(['user' => $car , 'message' => 'UPDATED'], 201);
     } 
  public function deldemo($id)
     {
        $product = king::find($id);
        $product->delete();
        return response()->json(['user' => $product , 'message' => 'DELETED'], 201);
     } 
 
}
