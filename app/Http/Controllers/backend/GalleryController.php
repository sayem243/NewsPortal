<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use Auth;

class GalleryController extends Controller
{
    public function __construct(){
    
        $this->middleware('auth');
    }

    public function photos(){

    	$photos=DB::table('photos')->get();
    	return view('backend.gallery.photos',compact('photos'));
    }

    public function photoStore(Request $request){

    	 $validatedData = $request->validate([
        'title' => 'required',      
    ]);
    	$data=array();
    	$data['title']=$request->title;
    	$data['type']=$request->type;

    	$image=$request->photo;
           if ($image) {
                $image_one= uniqid().'.'.$image->getClientOriginalExtension();    //123123.jpg
                Image::make($image)->resize(500,310)->save('public/photos_gallery/'.$image_one);    //   public/postimages/123123.jpg
                $data['photo']='public/photos_gallery/'.$image_one;   //   public/postimages/123123.jpg
                 DB::table('photos') ->insert($data);
                $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
           }else{
             return Redirect()->back();
           }


    }

    public function photo_edit($id){

    	$photos=DB::table('photos')->where('id',$id)->first();

 	return view('backend.gallery.photo_edit',compact('photos'));


    }

    public function update(Request $request,$id){

     $validatedData = $request->validate([
    //'title' => 'required',
    //'type' => 'required',
  	
    ]);

     $data=array();
    $data['title']=$request->title;
    $data['type']=$request->type;
    
     $oldimage=$request->oldimage;
     $image=$request->photo;
           if ($image) {
                $image_one= uniqid().'.'.$image->getClientOriginalExtension();    //123123.jpg
                Image::make($image)->resize(500,310)->save('public/photos_gallery/'.$image_one);    //   public/postimages/123123.jpg
                $data['photo']='public/photos_gallery/'.$image_one;   //   public/postimages/123123.jpg
                 DB::table('photos')->where('id',$id)->update($data);
                 unlink($oldimage);
                $notification=array(
                     'messege'=>'Successfully  update ',
                     'alert-type'=>'success'
                    );
            return Redirect()->route('photo.gallery')->with($notification);
           }//jodi notun image na thake 
   
         $data['photo']=$oldimage;
          //var_dump($data); die;
          DB::table('photos')->where('id',$id)->update($data);
           
                $notification=array(
                     'messege'=>'Successfully update  ',
                     'alert-type'=>'success'
                    );
            return Redirect()->route('photo.gallery')->with($notification);
    }



    public function delete($id){

        $post=DB::table('photos')->where('id',$id)->first();
        unlink($post->photo);
        DB::table('photos')->where('id',$id)->delete();

          $notification=array(
         'messege'=>'Successfully Deleted',
        'alert-type'=>'success'
                         );
    return redirect()->back()->with($notification);

    }

    public function video(){
       $video=DB::table('videos')->get();
        return view('backend.gallery.video',compact('video')); 
    }



public function videoStore(Request $request){

     $validatedData = $request->validate([
        'title' => 'required',      
    ]);
        $data=array();
        $data['title']=$request->title;
        $data['type']=$request->type;
        $data['embed_code']=$request->embed_code;

      DB::table('videos') ->insert($data);
    $notification=array(
         'messege'=>'Successfully video Inserted ',
         'alert-type'=>'success'
        );
    return Redirect()->back()->with($notification);

}
    
    public function video_edit($id){

    $video=DB::table('videos')->where('id',$id)->first();

    return view('backend.gallery.video_edit',compact('video'));

    }
  public function video_update(Request $request,$id){

     $validatedData = $request->validate([
    //'title' => 'required',
    //'type' => 'required',
    ]);

     $data=array();
    $data['title']=$request->title;
    $data['embed_code']=$request->embed_code;

    $data['type']=$request->type;     
    DB::table('videos')->where('id',$id)->update($data);
   
        $notification=array(
             'messege'=>'Successfully update  ',
             'alert-type'=>'success'
            );
 return Redirect()->route('video.gallery')->with($notification);
    }


public function Video_delete($id){

        DB::table('videos')->where('id',$id)->delete();

          $notification=array(
         'messege'=>'Successfully Deleted',
        'alert-type'=>'success'
                         );
    return redirect()->back()->with($notification);


}




}
