<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function Socialsetting(){

    	$social=DB::table('socials')->first();
    	return view('backend.setting.social',compact('social'));
    }


    public function UpdateSocial(Request $request,$id){

    	$data=array();
    	$data['facebook']=$request->facebook;
    	$data['twiter']=$request->twiter;
    	$data['youtube']=$request->youtube;
    	$data['instagram']=$request->instagram;
    	$data['linkedin']=$request->linkedin;

    
        DB::table('socials')->where('id',$id)->update($data);
    	
     $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
	return redirect()->back()->with($notification);


    }

    public function SeoSetting(){

    	$seo=DB::table('seos')->first();
    	return view('backend.setting.seo',compact('seo'));
    }


    public function UpdateSEO(Request $request,$id){

		$data=array();
    	$data['meta_author']=$request->meta_author;
    	$data['meta_title']=$request->meta_title;
    	$data['meta_keyword']=$request->meta_keyword;
    	$data['meta_description']=$request->meta_description;
    	$data['google_analytics']=$request->google_analytics;
    	$data['google_verification']=$request->google_verification;
    	$data['alexa_analytics']=$request->alexa_analytics;

    	DB::table('seos')->where('id',$id)->update($data);
    	
     $notification=array(
                        'messege'=>'Successfully Update',
                        'alert-type'=>'success'
                         );
	return redirect()->back()->with($notification);


    }

    public function NamazSetting(){

        $namaz=DB::table('namaz')->first();
        return view('backend.setting.namaz',compact('namaz'));
    }
    public function UpdateNamaz(Request $request,$id){

        $data=array();
        $data['fazar']=$request->fazar;
        $data['zohur']=$request->zohur;
        $data['asar']=$request->asar;
        $data['magrib']=$request->magrib;
        $data['esha']=$request->esha;
        $data['zummah']=$request->zummah;
    
        DB::table('namaz')->where('id',$id)->update($data);
        
     $notification=array(
        'messege'=>'Successfully Update',
       'alert-type'=>'success'
                         );  
    return redirect()->back()->with($notification);                    

    }


    public function LiveTv(){

     $livetv=DB::table('livetv')->first();
    return view('backend.setting.livetv',compact('livetv'));

    }

    public function UpdateLiveTv(Request $request,$id){

        $data=array();
        $data['embed_code']=$request->embed_code;
       
        DB::table('livetv')->where('id',$id)->update($data);
        
     $notification=array(
        'messege'=>'Successfully Update',
       'alert-type'=>'success'
                         );  
    return redirect()->back()->with($notification); 

    }

    public function ActiveLiveTv($id){
        DB::table('livetv')->where('id',$id)->update(['status'=>1]);

        $notification=array(
        'messege'=>'Successfully Tv Live On your website',
       'alert-type'=>'success'
         );
       return redirect()->back()->with($notification);                       

    }

    public function DeactiveLiveTv($id){

         DB::table('livetv')->where('id',$id)->update(['status'=>0]);

        $notification=array(
        'messege'=>'Live Tv off  your website',
       'alert-type'=>'success'
         );
       return redirect()->back()->with($notification);                       

        
    }

    public function NoticeSetting(){

     $notice=DB::table('notices')->first();
    return view('backend.setting.notice',compact('notice'));
    }


    public function UpdateNotice(Request $request,$id){

       $data=array();
       $data['notice']=$request->notice;
       
        DB::table('notices')->where('id',$id)->update($data);
        
     $notification=array(
        'messege'=>'Successfully Update Notice',
       'alert-type'=>'success'
                         );  
    return redirect()->back()->with($notification); 
    }

    public function ActiveNotice($id){
        
        DB::table('notices')->where('id',$id)->update(['status'=>1]);

        $notification=array(
        'messege'=>' Notice On Your website',
       'alert-type'=>'success'
         );
       return redirect()->back()->with($notification);         

    }


    public function DeactiveNotice($id){

      DB::table('notices')->where('id',$id)->update(['status'=>0]);

    $notification=array(
        'messege'=>'Notice off Your website',
       'alert-type'=>'success'
         );
       return redirect()->back()->with($notification);   

    }

//website
    public function Website(){
    $web=DB::table('websites')->get();
    return view('backend.setting.website',compact('web')); 

    }

    public function Web_store(Request $request){

       $data=array();
       $data['website_name']=$request->website_name;
        $data['website_name_en']=$request->website_name_en;
       $data['website_link']=$request->website_link;
       
        DB::table('websites')->insert($data);
        
     $notification=array(
        'messege'=>'Successfully Update website',
       'alert-type'=>'success');
    return redirect()->back()->with($notification);      
    }

    public function web_delete($id){
            DB::table('websites')->where('id',$id)->delete();

        $notification=array(
                        'messege'=>'Successfully Deleted',
                        'alert-type'=>'success'
                         );
    return redirect()->back()->with($notification);

    }

    public function web_edit($id){
    $web=DB::table('websites')->where('id',$id)->first();

    return view('backend.setting.web_edit',compact('web'));
}


    public function web_update(Request $request,$id){
        $data=array();
        $data['website_name']=$request->website_name;
        $data['website_name_en']=$request->website_name_en;
        $data['website_link']=$request->website_link;

        DB::table('websites')->where('id',$id)->update($data);
        

     $notification=array(
                 'messege'=>'Successfully Update',
                'alert-type'=>'success'
                         );
    return Redirect()->route('website.setting')->with($notification);

    }

    

}
