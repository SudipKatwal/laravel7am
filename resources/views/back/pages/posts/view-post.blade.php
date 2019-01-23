@extends('back.layouts.master')
  @section('content')
  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('admin')}}">Dashboard</a>
      </li>
      <li>/Posts</li>
    </ol>

    <!-- Page Content -->
    <div class="panel panel-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>Description</th>
                <th>Author</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @if(count($posts)>0)
                @foreach($posts as $key=>$post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route('admin.posts.edit',$post->id)}}">EDIT</a></td>
                <td>
                    <form action="{{route('admin.posts.destroy',$post->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
                @endforeach
            @endif
        </table>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection
