@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">All Posts</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post </h3>
              <button class="btn btn-danger btn-sm" style="float: right;"  data-toggle="modal" data-target="#modal-default">Add New</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category </th>
                  <th>Subcategory</th>
                  <th>Title</th>
                  <th>Thumbnil</th>
                  <th>Date</th>
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($post as $row)  
                <tr>
                  <td>{{$row->category_bn }}</td>
                  <td>{{$row->subcategory_bn }}</td>
                  <td>{{$row->title_bn }}</td>
                  <td><img src="{{URL::to($row->image)}}" style="height:80px;width: 80px;" ></td>
                  <td>{{$row->post_date}}</td>
                  
                  <td>
                  <a href="{{ route('post.edit',$row->id) }}"class="btn btn-info"><i class="fa fa-edit"></i> </a>    
                  <a href="{{ route('post.delete',$row->id) }}"class="btn btn-danger" id="delete"><i class="fa fa-trash"></i> </a>    
                  </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Category </th>
                  <th>Subcategory</th>
                  <th>Title</th>
                  <th>Thumbnil</th>
                  <th>Date</th>
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

                 {{--        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}

 
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    
@endsection
