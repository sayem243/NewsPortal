<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DistrictController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth');
    }

    public function distict_index(){

    	$district=DB::table('districts')->get();
    	return view ('backend.district.district_index',compact('district'));

    }

     public function store(Request $request){
    	 $validatedData = $request->validate([
        'district_en' => 'required|unique:districts|max:255',
        'district_bn' => 'required|unique:districts|max:255',
       
    ]);
    	$data=array();
    	$data['district_en']=$request->district_en;
    	$data['district_bn']=$request->district_bn;

    	DB::table('districts')->insert($data);
    	

     $notification=array(
                        'messege'=>'Successfully Added',
                        'alert-type'=>'success'
                         );
	return redirect()->back()->with($notification);

}

 public function delete($id){
 	DB::table('districts')->where('id',$id)->delete();

 	    $notification=array(
                        'messege'=>'Successfully Deleted',
                        'alert-type'=>'success'
                         );
	return redirect()->back()->with($notification);

 }

  public function edit($id){
 	$district=DB::table('districts')->where('id',$id)->first();

 	return view('backend.district.edit',compact('district'));

 }

  public function update(Request $request,$id){
    	 $validatedData = $request->validate([
        'district_en' => 'required|max:255',
        'district_bn' => 'required|max:255',
       
    ]);
    	$data=array();
    	$data['district_en']=$request->district_en;
    	$data['district_bn']=$request->district_bn;

    	DB::table('districts')->where('id',$id)->update($data);
    	

     $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
	return Redirect()->route('district')->with($notification);

}

}
