@extends('layouts.app')
@section('content')

@php
  $subcategory=DB::table('subcategories')->where('category_id',$post->category_id)->get();
  $subdistrict=DB::table('subdistricts')->where('district_id',$post->subdistrict_id)->get();
@endphp

    <!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
     <div class="row mb-2">
        <div class="col-sm-6">
           <h1 class="m-0 text-dark">Post Update Panel</h1>
             </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post Update Panel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
</div>

 <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Post Update Panel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('update.post',$post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="card-body">
                 <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Title Bangla</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title_bn" value="{{$post->title_bn}}">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Title English</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="title_en"  value="{{$post->title_en}}">
                  </div>
                  </div>


                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category_id" class="form-control">
                      <option selected="" disabled>Choose One</option>
                      @foreach($category as $row)
                      <option value="{{$row->id}}"<?php if($row->id==$post->category_id) echo "selected"; ?> >{{$row->category_en}}| {{$row->category_bn}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Sub Category</label>
                     <select name="subcategory_id" class="form-control" id="subcategory_id">
                      <option selected="" disabled>Choose One</option>
                        @foreach($subcategory as $row)
                      <option value="{{$row->id}}"<?php if($row->id==$post->subcategory_id) echo "selected"; ?> >{{$row->subcategory_en}}| {{$row->subcategory_bn}}</option>
                      @endforeach
                    
                    </select>
                  </div>
                  </div>



                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">District</label>
                    <select name="district_id" id="district_id" class="form-control">
                      <option selected="" disabled>Choose One</option>
                      @foreach($district as $row)
                      <option value="{{$row->id}}" <?php if($row->id==$post->district_id) echo "selected"; ?>>{{$row->district_bn}}|{{$row->district_en}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Sub District</label>
                     <select name="subdistrict_id" id="subdistrict_id" class="form-control">
                      <option selected="" disabled>Choose One</option>
                       @foreach($subdistrict as $row)
                      <option value="{{$row->id}}" <?php if($row->id==$post->subdistrict_id) echo "selected"; ?>>{{$row->subdistrict_bn}}|{{$row->subdistrict_en}}</option>
                      @endforeach
                    
                    </select>
                  </div>
                  </div>

<div class="row">

<div class="form-group col-lg-6">
<label for="exampleInputFile">File input</label>
<div class="input-group">
<div class="custom-file">
<input type="file" class="custom-file-input" id="exampleInputFile" name="image">
<label class="custom-file-label" for="exampleInputFile">Choose file</label>
 </div>
<div class="input-group-append">
<span class="input-group-text" id="">Upload</span>
</div>
</div>
</div>

<div class="col-lg-6">
  <label for="exampleInputFile">Old Image</label><br>
  <img src="{{URL::to($post->image)}}" style="height: 50px; width: 70px;">
  <input type="hidden" name="oldimage" value="{{$post->image}}">
  
</div>

</div>


         

  <div class="row">
  <div class="form-group col-md-6">
  <label for="exampleInputEmail1">Tags Bangla</label>
  <input type="text" class="form-control" id="exampleInputEmail1" name="tags_bn" value="{{$post->tags_bn}}">
  </div>
<div class="form-group col-md-6">
<label for="exampleInputPassword1">Tags English</label>
<input type="text" class="form-control" id="exampleInputPassword1" name="tags_en" value="{{$post->tags_en}}">
</div>
</div>

            
  <div class="form-group col-md-12">
  <label for="exampleInputPassword1">Details  English</label>
  <textarea class="textarea" placeholder="Place some text here" name="details_en"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;padding: 10px;">
   {{$post->details_en}}
  </textarea>
  </div>

<div class="form-group col-md-12">
 <label for="exampleInputPassword1">Details  Bangla</label>
<textarea class="textarea" placeholder="Place some text here" name="details_bn" value="{{$post->details_bn}}" style="width: 100%; height:20px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;padding: 10px;">
  {{$post->details_en}}
</textarea>
 </div>

    <hr>
    <h4 class="text-center">Extra Options</h4>
    <div class="row">
    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1" <?php if($post->headline==1){
      echo "checked";
    } ?>>
    <label class="form-check-label" for="exampleCheck1">Headline</label>
    </div>

    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section" value="1"
      <?php if($post->headline==1){
      echo "checked";
    } ?>
    >
    <label class="form-check-label" for="exampleCheck1">First Section</label>
    </div>

    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumbnil" value="1"
     <?php if($post->first_section_thumbnil==1){
      echo "checked";
    } ?>
    >
    <label class="form-check-label" for="exampleCheck1">FirstSection Big Thumbnail</label>
    </div> 

    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumbnil" value="1"
     <?php if($post->bigthumbnil==1){
      echo "checked";
    } ?>
    >
    <label class="form-check-label" for="exampleCheck1">Genral Big Thumbnail</label>
    </div>      
    </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
</div>
</div>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  
  $('select[name="category_id"]').on('change',function(){
    var category_id=$(this).val();
    if(category_id){
      $.ajax({
        url: "{{ url('/get/subcategory/') }}/"+category_id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
          $('#subcategory_id').empty();
          $.each(data,function(key,value){
          $("#subcategory_id").append('<option value="'+value.id+'">'+value.subcategory_bn+'</option>');

          })

          console.log(data);
        },
     
      });
     
      
    }
    else {
      alert('danger');
             }

  })  
  
});

</script>

<script type="text/javascript">
$(document).ready(function() {
  
  $('select[name="district_id"]').on('change',function(){
    var district_id=$(this).val();
    if(district_id){
      $.ajax({

        url: "{{ url('/get/subdistrict/') }}/"+district_id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
          $('#subdistrict_id').empty();
          $.each(data,function(key,value){
          $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_bn+'</option>');

          })

          console.log(data);
        },
     
      });
     
      
    }
    else {
      alert('danger');
             }

  })  
  
});

</script>

@endsection