<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class detailcontroller extends Controller
{
    public function detail_property($state,$city,$pname){
    	$dname=preg_replace('/[\\.\\&\\%\\$\\s\\0-9_\\-\\.]+/', ' ', $pname);
    	$dcity=preg_replace('/[\\.\\&\\%\\$\\s\\0-9_\\-\\.]+/', ' ', $city);
    	$results = DB::select( DB::raw("select id_property,property_type from property where property_title='$dname' and property_city='$dcity' and property_state='$state' LIMIT 1") );
    	$res=json_encode($results);
    	$idfromtitle=json_decode($res,true);
    	$propertyId = $idfromtitle[0]['id_property'];
    	// echo $property = $idfromtitle[0]['property_type'];
    	// die();
    	if ($idfromtitle[0]['property_type']=='general'){
    		$res1= DB::select( DB::raw("
    		Select id_property, property_type from property where replace(replace(replace(`property_title`,'\"',''),'/ ',' '),'-',' ')='" . ($dname) . "' and replace(replace(replace(`property_city`,'\"',''),'/ ',' '),'-',' ') = '" . ($dcity) . "' and property_state='" . $state . "' and property_type = 'premium' limit 1"));
    		$q1=json_encode($res1);
    		$idFromTitle2=json_decode($q1,true);
    		if (!empty($idFromTitle2[0]['id_property'])) {
    			$propertyId=$idFromTitle2[0]['id_property'];
    		}
    	}
    	$value=array();
    	$value['property']=DB::select(DB::raw("select * from property where id_property=".$propertyId.""));
    	$value1=json_decode(json_encode($value['property']),true);
    	$value['propertyUtilityAllowace']=DB::select(DB::raw("Select * from property_utility_allowance where property_id=".$propertyId.""));
    	if ($value1[0]['property_type']=='premium') {
    			$value['propertyDetail'] = DB::select(DB::raw("Select * from property_detail where id_property=".$propertyId.""));
                $value['propertyFloorPlanDetail'] = DB::select(DB::raw("Select * from property_floor_plan where id_property=" . $propertyId . " order by rent_from ASC limit 1"));
                $value['propertyPhotoDetail'] = DB::select(DB::raw("Select * from property_photo where id_property=" . $propertyId . " and status = 'Active' order by ord ASC limit 1"));
                $value['propertyContactDetail'] = DB::select(DB::raw("Select phone from property_contact where id_property=".$propertyId.""));
                $value['propertyAllFloorPlanDetail'] =DB::select(DB::raw("Select * from property_floor_plan where id_property=".$propertyId." order by rent_from ASC"));
                $value['propertyplanDetail'] =DB::select(DB::raw("Select min_rent,min_bed,max_bed,min_bath from property_detail where id_property=".$propertyId.""));
                $value['propertyDeal'] =DB::select(DB::raw("Select * from property_deals where id_property=".$propertyId.""));
                $rating=DB::select(DB::raw("Select vote_avg from rating where id_property=".$propertyId.""));
  					}	
    	 elseif($value1[0]['property_type']=='general') {
    			$value['propertyDetail'] = DB::select(DB::raw("Select * from property_detail where id_property=".$propertyId.""));
                $value['propertyFloorPlanDetail'] = DB::select(DB::raw("Select * from property_floor_plan where id_property=" . $propertyId . " order by rent_from ASC limit 1"));
                $value['propertyPhotoDetail'] = DB::select(DB::raw("Select * from property_photo where id_property=" . $propertyId . " and status = 'Active' order by ord ASC limit 1"));
                $value['propertyContactDetail'] = DB::select(DB::raw("Select phone from property_contact where id_property=".$propertyId.""));
                $value['propertyAllFloorPlanDetail'] =DB::select(DB::raw("Select * from property_floor_plan where id_property=".$propertyId." order by rent_from ASC"));
                $value['propertyDeal'] =DB::select(DB::raw("Select * from property_deals where id_property=".$propertyId.""));
                $value['propertyplanDetail'] =DB::select(DB::raw("Select min_rent,min_bed,max_bed,min_bath from property_detail where id_property=".$propertyId.""));
                $value['rating']=DB::select(DB::raw("Select vote_avg from rating where id_property=".$propertyId.""));
    		}
    		$data=json_decode(json_encode($value),true);
    		echo "<pre>";
    		print_r($data);
    		
    		// return response()->json(['data'=>$data]);
    }
}
// foreach ($rating as $user_key => $user_value){
// print_r($user_value->vote_avg);die;
// }
// $results = app('db')->select("select id_property,property_type from property where property_title='".($pname)."' and property_city='".($city)."' and property_state='".($state)."' LIMIT 1");	
    	// return response()->json(['data' => $results , 'message' =>'SUCCESS'],201);