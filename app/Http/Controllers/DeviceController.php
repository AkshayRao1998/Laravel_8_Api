<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
// use Validator;
use Illuminate\Support\Facades\Validator;


class DeviceController extends Controller
{
    public function list($id = null)
    {	
    	if(isset($id)){
    		$device = Device::find($id);
    	}else{
    		$device = Device::all();
    	}
    	echo json_encode($device);
    }

    public function PostData(Request $req)
    {	 	
    	$device = new Device;
    	$device->name = $req->name;
    	$result = $device->save();
    	if ($result) {
    		return "Data saved";
    	}else{
    		return "Data not saved";
    	}
    }

    public function UpdateData(Request $req)
    {
    	$device = Device::find($req->id);
    	$device->name = $req->name;
    	$update = $device->save();
    	if($update){
    		return "Data updated successfully";
    	}else{
    		return "Something went wrong";
    	}
    }

    public function Search($name)
    {

    	$result =  Device::where('name', "like", "%".$name."%")->get();

    	if($result->isNotEmpty()){
    		return $result;
    	}else{
    		echo "Data not found";
    	}	
    }

    public function Delete($id)
    {
    	$result = Device::where('id', "$id")->delete();
    	if($result){
    		return "deleted successfully";
    	}else{
    		echo "Data not found";
    	}
    }

    public function Save(Request $req)
    {
    	$rules = array(
    				"name"=>"required|min:1"
    			);
    	$validator = Validator::make($req->all(), $rules);
    	if($validator->fails()){
    		return $validator->error();
    	}else{
    		$device = new Device;
    		$device->name = $req->name;
    		$result = $device->save();
	    	if ($result) {
	    		return "Data saved";
	    	}else{
	    		return "Data not saved";
	    	}
    	}

    }
}
