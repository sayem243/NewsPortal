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
              <h3 class="card-title">Sub District Table  </h3>
              <button class="btn btn-danger btn-sm" style="float: right;"  data-toggle="modal" data-target="#modal-default">Add New</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sub District Name Bangla</th>
                  <th>Sub District Name English</th>
                  <th>District Name </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subdistrict as $row)  
                <tr>
                  <td>{{$row->subdistrict_bn }}</td>
                  <td>{{$row->subdistrict_en }}</td>
                  <td>{{$row->district_en }}</td>
                 
                  <td>
                  <a href="{{ route('edit.subdistrict',$row->id) }}"class="btn btn-info"><i class="fa fa-edit"></i> </a>    
                  <a href="{{ route('delete.subdistrict',$row->id) }}"class="btn btn-danger" id="delete"><i class="fa fa-trash"></i> </a>    
                  </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Sub District Name Bangla</th>
                  <th>Sub District Name English</th>
                  <th>District Name </th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

    <!-- Category Added Modal -->
     <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('store.subdistrict') }}" method="POST">
                    @csrf
                <div class="form-group">
                 <label for="exampleInputEmail1">Sub District Name English</label>
                 <input type="text-dark" class="form-control @error('subdistrict_en') is-invalid @enderror" id="english" name="subdistrict_en" required="">
                    @error('subdistrict_en')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
             </div>
         <div class="form-group">
        <label for="exampleInputPassword1">Sub District Name Bangla</label>
    <input type="text" class="form-control @error('subdistrict_bn') is-invalid @enderror"id="bangla"name="subdistrict_bn" required="">
              @error('subdistrict_bn')
                  <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                 @enderror
         </div>

        <div class="form-group">
        <label for="exampleInputPassword1">Choose Category </label>
        <select class="form-control @error('district_id') is-invalid @enderror" name="district_id" required>
          <option disabled="" selected="">=======ChooseOne=======</option>
          @foreach($district as $row)
          <option value="{{$row->id}}">{{$row->district_en}}|{{$row->district_bn}} </option>
          @endforeach
        </select>
         @error('district_id')
          <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
          </span>
         @enderror
              
         </div>   

            <button type="submit" class="btn btn-success btn-block">Submit</button>
            </form>


            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    
@endsection
