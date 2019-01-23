@extends('back.layouts.master')
  @section('content')
  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('admin')}}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        Add Post
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
        <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
          </div>
           <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" id="description" placeholder="Enter Post Description">{{old('description')}}</textarea>
          </div>
          <div class="form-group">
            <label for="thumbnail">Thumbnail</label>
            <input type="file" name="thumbnail" id="thumbnail">

          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection
