@extends('back.layouts.master')
  @section('content')
  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{url('admin')}}">Dashboard</a>
      </li>
      <li>/Users</li>
    </ol>

    <!-- Page Content -->
    <div class="panel panel-body">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            @if(count($users)>0)
                @foreach($users as $key=>$user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a href="{{url('admin/users/'.$user->id.'/edit')}}">EDIT</a></td>
                <td>
                    <form action="{{url('admin/users',$user->id)}}" method="post">
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
