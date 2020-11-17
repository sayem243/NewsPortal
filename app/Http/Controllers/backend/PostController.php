<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use Auth;

class PostController extends Controller
{
   
	      public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

    	$category=DB::table('categories')->get();
    	//$subcategory=DB::table('subcategories')->get();
    	$district=DB::table('districts')->get();

    	
    	return view('backend.post.create',compact('category','district'));		
    }

    public function GetSubCategory($category_id){

         $subcategory=DB::table('subcategories')->where('category_id',$category_id)->get();

    
         return response()->json($subcategory);

    }

    public function GetSubdistrict($district_id){

        $subdistrict=DB::table('subdistricts')->where('district_id',$district_id)->get();
        
        return response()->json($subdistrict);    
    }


    public function store(Request $request){

     $validatedData = $request->validate([
    'category_id' => 'required',
    'subcategory_id'=>'required',
    'district_id'=>'required',
    'subdistrict_id'=>'required',
    'title_bn' => 'required|unique:posts|max:255',
    'title_en' => 'required|unique:posts|max:255',
    'image' => 'required',
    'details_en' => 'required',
    'details_bn' => 'required',
    ]);

     $data=array();
     $data['title_bn']=$request->title_bn;
     $data['title_en']=$request->title_en;
     $data['user_id']=Auth::user()->id;
     $data['category_id']=$request->category_id;
     $data['subcategory_id']=$request->subcategory_id;
     $data['district_id']=$request->district_id;
     $data['subdistrict_id']=$request->subdistrict_id;
     $data['details_bn']=$request->details_bn;
     $data['details_en']=$request->details_en;
     $data['tags_bn']=$request->tags_bn;
     $data['tags_en']=$request->tags_en;
     $data['headline']=$request->headline;
     $data['first_section']=$request->first_section;
     $data['first_section_thumbnil']=$request->first_section_thumbnil;
     $data['bigthumbnil']=$request->bigthumbnil;
     $data['post_date']=date('d-m-Y');
     $data['post_month']=date("F");
    // $data['image']="asa";
     $image=$request->image;
           if ($image) {
                $image_one= uniqid().'.'.$image->getClientOriginalExtension();    //123123.jpg
                Image::make($image)->resize(500,310)->save('public/postimage/'.$image_one);    //   public/postimages/123123.jpg
                $data['image']='public/postimage/'.$image_one;   //   public/postimages/123123.jpg
                 DB::table('posts') ->insert($data);
                $notification=array(
                     'messege'=>'Successfully Post Inserted ',
                     'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
           }else{
             return Redirect()->back();
           }
     //return response()->json($data); 
     return Redirect()->back()->with($notification);

    }

    public function index(){
        $post=DB::table('posts')
              ->join('categories','posts.category_id','categories.id')
              ->join('subcategories','posts.subcategory_id','subcategories.id')
              ->select('posts.*','categories.category_bn','subcategories.subcategory_bn')
              // ->join('districts','posts.district_id','districts.id')
              // ->join('subdistricts','posts.subdistrict_id','subdistricts.id')
              ->get();
        return view('backend.post.index',compact('post'));
        //return response()->json($post);
    }



    public function delete($id){

        $post=DB::table('posts')->where('id',$id)->first();
        unlink($post->image);
        DB::table('posts')->where('id',$id)->delete();

          $notification=array(
         'messege'=>'Successfully Deleted',
        'alert-type'=>'success'
                         );
    return redirect()->back()->with($notification);

    }

    public function edit($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $category=DB::table('categories')->get();
        $district=DB::table('districts')->get();

        return view('backend.post.edit',compact('post','category','district'));
    }


    public function update(Request $request,$id){
    

     $validatedData = $request->validate([
    'category_id' => 'required',
    'subcategory_id'=>'required',
    'district_id'=>'required',
    'subdistrict_id'=>'required',
    'title_bn' => 'required',
    'title_en' => 'required',
    'details_en' => 'required',
    'details_bn' => 'required',
    ]);

     $data=array();
     $data['title_bn']=$request->title_bn;
     $data['title_en']=$request->title_en;
     $data['category_id']=$request->category_id;
     $data['subcategory_id']=$request->subcategory_id;
     $data['district_id']=$request->district_id;
     $data['subdistrict_id']=$request->subdistrict_id;
     $data['details_bn']=$request->details_bn;
     $data['details_en']=$request->details_en;
     $data['tags_bn']=$request->tags_bn;
     $data['tags_en']=$request->tags_en;
     $data['headline']=$request->headline;
     $data['first_section']=$request->first_section;
     $data['first_section_thumbnil']=$request->first_section_thumbnil;
     $data['bigthumbnil']=$request->bigthumbnil;
    
     $oldimage=$request->oldimage;
     $image=$request->image;
           if ($image) {
                $image_one= uniqid().'.'.$image->getClientOriginalExtension();    //123123.jpg
                Image::make($image)->resize(500,310)->save('public/postimage/'.$image_one);    //   public/postimages/123123.jpg
                $data['image']='public/postimage/'.$image_one;   //   public/postimages/123123.jpg
                 DB::table('posts')->where('id',$id)->update($data);
                 unlink($oldimage);
                $notification=array(
                     'messege'=>'Successfully Post update ',
                     'alert-type'=>'success'
                    );
            return Redirect()->back()->with($notification);
           }//jodi notun image na thake 

           // var_dump($data); die

         $data['image']=$oldimage;
          DB::table('posts')->where('id',$id)->update($data);
               
                $notification=array(
                     'messege'=>'Successfully update Inserted ',
                     'alert-type'=>'success'
                    );
            return Redirect()->route('all.post')->with($notification);
     //return response()->json($data); 
     
    

    }

}

