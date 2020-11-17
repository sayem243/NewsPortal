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
                        <li class="breadcrumb-item active">Namaz Setting</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Namaz  Setting</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body col-lg-6">
               <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Namaz Setting</h4>
            
            </div>


        <div class="modal-body">
          <form action="{{ route('update.namaztime',$namaz->id) }}" method="POST">
                @csrf
        <div class="form-group">
        <label for="exampleInputEmail1">Fazar</label>
          <input type="text-dark" class="form-control" value="{{$namaz->fazar}}" id="english" name="fazar" >   
         </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Zohur</label>
          <input type="text-dark" class="form-control" value="{{$namaz->zohur}}" id="english" name="zohur" >   
         </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Asor</label>
          <input type="text-dark" class="form-control" value="{{$namaz->asar}}" id="english" name="asar">   
         </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Magrib</label>
          <input type="text-dark" class="form-control" value="{{$namaz->magrib}}" id="english" name="magrib">   
         </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Esha</label>
          <input type="text-dark" class="form-control" value="{{$namaz->esha}}" id="english" name="esha">   
         </div>

         <div class="form-group">
        <label for="exampleInputEmail1">Zummah</label>
          <input type="text-dark" class="form-control" value="{{$namaz->zummah}}" id="english" name="zummah">   
         </div>
        

            <button type="submit" class="btn btn-success btn-block">Update</button>
            </form>


            </div>
          
          </div>
          
            </div>
            <!-- /.card-body -->
          </div>



    
@endsection
