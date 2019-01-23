@extends('back.layouts.master')
  @section('content')
  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('admin')}}">Dashboard</a>
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
        <form action="{{url('admin/users/'.$detail->id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{$detail->name}}" class="form-control" placeholder="Name">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" value="{{$detail->email}}" id="exampleInputEmail1" placeholder="Email">
          </div>
          <button type="submit" class="btn btn-default">Update</button>
        </form>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection
