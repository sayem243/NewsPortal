@extends('layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post Inster Panel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post Inster Panel</li>
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
                <h3 class="card-title">Post Insert Panel</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('store.post') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="card-body">
                 <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Title Bangla</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title_bn">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Title English</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="title_en">
                  </div>
                  </div>


                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category_id" class="form-control">
                      <option selected="" disabled>Choose One</option>
                      @foreach($category as $row)
                      <option value="{{$row->id}}">{{$row->category_en}}| {{$row->category_bn}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Sub Category</label>
                     <select name="subcategory_id" class="form-control" id="subcategory_id">
                      <option selected="" disabled>Choose One</option>
                    
                    </select>
                  </div>
                  </div>



                  <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">District</label>
                    <select name="district_id" id="district_id" class="form-control">
                      <option selected="" disabled>Choose One</option>
                      @foreach($district as $row)
                      <option value="{{$row->id}}">{{$row->district_bn}}|{{$row->district_en}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Sub District</label>
                     <select name="subdistrict_id" id="subdistrict_id" class="form-control">
                      <option selected="" disabled>Choose One</option>
                    
                    </select>
                  </div>
                  </div>


          <div class="form-group">
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

  <div class="row">
  <div class="form-group col-md-6">
  <label for="exampleInputEmail1">Tags Bangla</label>
  <input type="text" class="form-control" id="exampleInputEmail1" name="tags_bn">
  </div>
<div class="form-group col-md-6">
<label for="exampleInputPassword1">Tags English</label>
<input type="text" class="form-control" id="exampleInputPassword1" name="tags_en">
</div>
</div>

            
  <div class="form-group col-md-12">
  <label for="exampleInputPassword1">Details  English</label>
  <textarea class="textarea" placeholder="Place some text here" name="details_en"style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;padding: 10px;"></textarea>
  </div>

<div class="form-group col-md-12">
 <label for="exampleInputPassword1">Details  Bangla</label>
<textarea class="textarea" placeholder="Place some text here" name="details_bn" style="width: 100%; height:20px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd;padding: 10px;"></textarea>
 </div>

    <hr>
    <h4 class="text-center">Extra Options</h4>
    <div class="row">
    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="headline" value="1">
    <label class="form-check-label" for="exampleCheck1">Headline</label>
    </div>

    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section" value="1">
    <label class="form-check-label" for="exampleCheck1">First Section</label>
    </div>

    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="first_section_thumbnil" value="1">
    <label class="form-check-label" for="exampleCheck1">FirstSection Big Thumbnail</label>
    </div> 

    <div class="form-check col-md-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="bigthumbnil" value="1">
    <label class="form-check-label" for="exampleCheck1">Genral Big Thumbnail</label>
    </div>      
    </div>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
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