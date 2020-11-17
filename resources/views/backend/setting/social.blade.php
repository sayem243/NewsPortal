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
                        <li class="breadcrumb-item active">Social Setting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Social Setting</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body col-lg-6">
               <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Social Setting</h4>
            
            </div>


        <div class="modal-body">
          <form action="{{ route('update.social',$social->id) }}" method="POST">
                @csrf
        <div class="form-group">
        <label for="exampleInputEmail1">Facebook</label>
          <input type="text-dark" class="form-control" value="{{$social->facebook}}" id="english" name="facebook" >   
         </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Twiter</label>
          <input type="text-dark" class="form-control" value="{{$social->twiter}}" id="english" name="twiter" >   
         </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Youtube</label>
          <input type="text-dark" class="form-control" value="{{$social->youtube}}" id="english" name="youtube">   
         </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Instagram</label>
          <input type="text-dark" class="form-control" value="{{$social->instagram}}" id="english" name="instagram">   
         </div>
        <div class="form-group">
        <label for="exampleInputEmail1">linkedin</label>
          <input type="text-dark" class="form-control" value="{{$social->linkedin}}" id="english" name="linkedin">   
         </div>
        

            <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>


            </div>
          
          </div>
          
            </div>
            <!-- /.card-body -->
          </div>



    
@endsection
