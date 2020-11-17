@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Categories</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Categories Modify </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

               <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Update Category</h4>
            
            </div>


        <div class="modal-body">
            <form action="{{ route('update.category',$category->id) }}" method="POST">
                @csrf
            <div class="form-group">
             <label for="exampleInputEmail1">Category Name English</label>
             <input type="text-dark" class="form-control" value="{{$category->category_en}}" id="english" name="category_en" >
                 
             </div>
         <div class="form-group">
        <label for="exampleInputPassword1">Category Name Bangla</label>
        <input type="text" class="form-control"value="{{$category->category_bn}}" id="bangla" name="category_bn">
              
         </div>

            <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>


            </div>
          
          </div>
          
            </div>
            <!-- /.card-body -->
          </div>



    
@endsection
