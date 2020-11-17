<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubDistrictController extends Controller
{
    
    public function __construct(){
   
    $this->middleware('auth');

    }

 public function index(){
 $subdistrict=DB::table('subdistricts')->join('districts','subdistricts.district_id','districts.id')->select('districts.district_en','subdistricts.*')->get();
    $district=DB::table('districts')->get();
    return view('backend.subdistrict.index',compact('subdistrict','district'));
    }


       public function store(Request $request){

    	 $validatedData = $request->validate([
        'subdistrict_bn' => 'required|unique:subdistricts|max:255',
        'subdistrict_en' => 'required|unique:subdistricts|max:255',
         'district_id'   => 'required',
       
    ]);
    	$data=array();
    	$data['subdistrict_en']=$request->subdistrict_en;
    	$data['subdistrict_bn']=$request->subdistrict_bn;
    	$data['district_id']=$request->district_id;

    	DB::table('subdistricts')->insert($data);
    	

     $notification=array(
                        'messege'=>'Successfully Added',
                        'alert-type'=>'success'
                         );
	return redirect()->back()->with($notification);

}

	public function edit($id){
 	$subdistrict=DB::table('subdistricts')->where('id',$id)->first();
 	$district=DB::table('districts')->get();


 	return view('backend.subdistrict.edit',compact('subdistrict','district'));

 }
	public function delete($id){
 		DB::table('subdistricts')->where('id',$id)->delete();

 	    $notification=array(
                        'messege'=>'Successfully Deleted',
                        'alert-type'=>'success'
                         );
	return redirect()->back()->with($notification);

 }



    public function update(Request $request,$id){
    	 $validatedData = $request->validate([
       'subdistrict_bn' => 'required|max:255',
        'subdistrict_en' => 'required|max:255',
         'district_id'   => 'required',   
    ]);

    	$data=array();
    	$data['subdistrict_en']=$request->subdistrict_en;
    	$data['subdistrict_bn']=$request->subdistrict_bn;
    	$data['district_id']=$request->district_id;

    	DB::table('subdistricts')->where('id',$id)->update($data);
    	
     $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
	return Redirect()->route('subdistrict')->with($notification);


}

      



}
