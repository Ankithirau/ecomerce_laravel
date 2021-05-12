<?php

namespace App\Http\Controllers;
use App\Http\Controllers\prac;
use Illuminate\Http\Request;
use App\Models\king;
class prac extends Controller
{
   public function index(){
   		$products = king::find([1,2,3,4,5]);
   		$d="";
   		// $products = king::where('id','<=',5)->get();
   		foreach ($products as $key) {
   			$d.=$key->email;
   		}
   		return response()->json($d);
        // return response()->json($products);
        // return response()->json(['email'=>$d]);
   }
   public function create(Request $request){
   	$new = new king($request->all());
   	// $new= new king; // create data by this Eloquent method
   	// $new = king::find($id); // update data in this way also
   	// $new->name=$request->name;	
   	// $new->email=$request->email;	
   	// $new->email="dummy@gmail.com";	
   	// $new->mobile=$request->mobile;	
   	// $new->api_token = app('hash')->make('kjhjsdhjkshdhsjdh');
   	$new->save();
   	return response()->json(['data'=>$new,'status'=>'Data created successfully']);
   }
   public function update(Request $request){
   	$new=king::where('email','=','denim@gmail.com')
   	->update(['email'=>$request->email]);
   }
   public function del(Request $request,$id){
   	// $new= king::where('id','=',"$id")->delete();
   	// $new= king::destroy($id);
   	// $new= king::find($id);
   	// $new->delete();
   	return response()->json(['data'=>$new,'status'=>'Data deleted successfully']);
   }
}
