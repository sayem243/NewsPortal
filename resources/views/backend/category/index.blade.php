@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header" id="category">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark" v-text="name"> </h1>
                   {{--  <span v-text="name"></span> --}}

                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" v-text="name"></li>

                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


      <div class="card">
            <div class="card-header">
              <h3 class="card-title">All Categories </h3>
              <button class="btn btn-danger btn-sm" style="float: right;"  data-toggle="modal" data-target="#modal-default">Add New</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name Bangla</th>
                  <th>Category Name English</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $row)
                <tr>
                  <td>{{$row->category_bn }}</td>
                  <td>{{$row->category_en }}</td>
                  <td>
                  <a href="{{ route('edit.category',$row->id) }}"class="btn btn-info"><i class="fa fa-edit"></i> </a>
                  <a href="{{ route('delete.category',$row->id) }}"class="btn btn-danger" id="delete"><i class="fa fa-trash"></i> </a>
                  </td>
                </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>Category Name Bangla</th>
                  <th>Category Name English</th>
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

                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            <div class="modal-body">
                <form action="{{ route('store.category') }}" method="POST">
                    @csrf
                <div class="form-group">
                 <label for="exampleInputEmail1">Category Name English</label>
                 <input  type="text" class="form-control @error('category_en') is-invalid @enderror" id="english" name="category_en">
                    @error('category_en')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                     @enderror
             </div>
         <div class="form-group">
        <label for="exampleInputPassword1">Category Name Bangla</label>
        <input type="text" class="form-control @error('category_bn') is-invalid @enderror" id="bangla" name="category_bn">
              @error('category_bn')
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


<script type="text/javascript" src="{{ asset('public/js/vue.js') }}"></script>
<script type="text/javascript">

  var app= new Vue({
    el:"#category",
    data:{
      name :"Categories",

    }

  });



</script>


@endsection
