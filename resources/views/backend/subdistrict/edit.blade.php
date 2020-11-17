@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sub District</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Sub District</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Sub District </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

               <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Update District</h4>
            
            </div>


        <div class="modal-body">
            <form action="{{ route('update.subdistrict',$subdistrict->id) }}" method="POST">
                @csrf
            <div class="form-group">
             <label for="exampleInputEmail1">Sub District Name English</label>
             <input type="text-dark" class="form-control" value="{{$subdistrict->subdistrict_en}}" id="english" name="subdistrict_en" >
                  </div>
        
         <div class="form-group">
        <label for="exampleInputPassword1">Sub District Name Bangla</label>
        <input type="text" class="form-control"value="{{$subdistrict->subdistrict_bn}}" id="bangla" name="subdistrict_bn">  
         </div>

         <div class="form-group">
        <label for="exampleInputPassword1">Choose District </label>
        <select class="form-control" name="district_id" required>
          <option disabled="" selected="">=======ChooseOne=======</option>
          @foreach($district as $row)
          <option value="{{$row->id}}"<?php if($row->id==$subdistrict->district_id) echo "selected";?>>{{$row->district_bn}}|{{$row->district_en}} </option>
          @endforeach
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
