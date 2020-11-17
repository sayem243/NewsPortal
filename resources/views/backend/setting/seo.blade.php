@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">SEO Setting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">SEO Setting</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body col-lg-6 ">
               <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> SEO Setting</h4>
            
            </div>


        <div class="modal-body">
          <form action="{{ route('update.seo',$seo->id) }}" method="POST">
                @csrf
        <div class="form-group">
        <label for="exampleInputEmail1">Author</label>
        <input type="text-dark" class="form-control" value="{{$seo->meta_author}}" id="english" name="meta_author" >   
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Meta Title</label>
        <input type="text-dark" class="form-control" value="{{$seo->meta_title}}" id="english" name="meta_title" >   
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Meta keyword </label>
        <input type="text-dark" class="form-control" value="{{$seo->meta_keyword}}" id="english" name="meta_keyword" >   
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Meta Description</label>
        <input type="text-dark" class="form-control" value="{{$seo->meta_description}}" id="english" name="meta_description" >   
        </div> 

        <div class="form-group">
        <label for="exampleInputEmail1"> Google Analytics</label>
        <input type="text-dark" class="form-control" value="{{$seo->google_analytics}}" id="english" name="google_analytics">   
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Google Verification</label>
        <input type="text-dark" class="form-control" value="{{$seo->google_verification}}" id="english" name="google_verification" >   
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Alexa Analytics</label>
        <input type="text-dark" class="form-control" value="{{$seo->alexa_analytics}}" id="english" name="alexa_analytics">   
        </div>
      
        

        <button type="submit" class="btn btn-success btn-block">Update</button>
        
        </form>


            </div>
          </div>
            </div>
            <!-- /.card-body -->
          </div>



    
@endsection
