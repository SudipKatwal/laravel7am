@extends('back.layouts.master')
  @section('content')
  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Dashboard</a>
      </li>
    </ol>

    <!-- Page Content -->
    <div class="panel panel-body">
        <div class="form-group">
            @if(! empty($errors->all()))
                @foreach($errors->all() as $error)
                    <div class="form-group alert alert-danger">
                        <span class="text-danger">{{$error}}</span>
                    </div>
                @endforeach
            @endif
        </div>
        <form action="{{url('admin/add-user')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" name="image" id="exampleInputFile">

          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection
