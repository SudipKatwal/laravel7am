@extends('back.layouts.master')
@section('content')

<div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Setting</li>
    </ol>

    <!-- Page Content -->
    <div class="panel panel-default">
        <div id="message">
            @if(Session::get('success')!=null)
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @if(Session::get('error')!=null)
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
            @endif
        </div>
        <div class="panel panel-body">
            <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{old('name') ? old('name') : auth()->user()->name}}" class="form-control">
                            @if($errors->has('name'))
                                <span class="text-danger"><small>{{$errors->first('name')}}</small></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{old('email') ? old('email') : auth()->user()->email}}" class="form-control">
                            @if($errors->has('email'))
                                <span class="text-danger"><small>{{$errors->first('email')}}</small></span>
                            @endif
                        </div>
                </div>
                <div class="col-md-6">
                    <img src="{{URL::to('images/users/'.auth()->user()->thumbnail)}}" alt="Profile Image" style="object-fit:cover; width:100%; height:400px;">
                </div>
            </div>
        </div>
        <hr>
        <div class="panel panel-body">
            <div class="col-md-12">
                <form action="{{route('admin.change.password')}}" method="post">
                {{csrf_field()}}
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" name="old_password" value="{{old('old_password')}}" class="form-control">
                        @if($errors->has('old_password'))
                            <span class="text-danger"><small>{{$errors->first('old_password')}}</small></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control">
                        @if($errors->has('password'))
                            <span class="text-danger"><small>{{$errors->first('password')}}</small></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" value="{{old('password_conformation')}}" class="form-control">
                        @if($errors->has('password_confirmation'))
                            <span class="text-danger"><small>{{$errors->first('password_confirmation')}}</small></span>
                        @endif
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
