@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Photo Gallery</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Photo Gallery</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Photo Gallery Modify </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

               <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Update Category</h4>
            
            </div>


      <div class="modal-body">
        <form action="{{ route('update.photos',$photos->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="form-group">
                 <label for="exampleInputEmail1">Title</label>
                 <input  type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$photos->title}}">
                    @error('title')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
             </div>

           <div class="row">
           
           <div class="form-group col-lg-6">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
              <div class="custom-file">
              <input type="file" class="custom-file-input" id="exampleInputFile" name="photo">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
               </div>
              <div class="input-group-append">
              <span class="input-group-text" id="">Upload</span>
              </div>
              </div>
              </div>


     <div class="col-lg-6">
  <label for="exampleInputFile">Old Image</label><br>
  <img src="{{URL::to($photos->photo)}}" style="height: 70px; width: 90px;">
  <input type="hidden" name="oldimage" value="{{$photos->photo}}">
  
</div>  

   </div>  
        


           <div class="form-group">
         <label for="exampleInputPassword1">Type</label>
         <select class="form-control" name="type" required>
           <option value="1">Big Photo</option>
           <option value="0">Small Photo</option>

         </select>
           
         </div>

            <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>



            </div>
          
          </div>
          
            </div>
            <!-- /.card-body -->
          </div>



    
@endsection
