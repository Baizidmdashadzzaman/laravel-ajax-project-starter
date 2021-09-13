@extends('backend.auth.layout')
@section('title')
    Login
@endsection
@section('content')
@php
$setting=App\Models\Setting::first();
@endphp
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="/" class="h1"><b>{{$setting->site_name}}</b></a>
        
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        
            @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-ban"></i> Error!</h5>
              {{ Session::get('error_message') }}
            </div>
           @endif
           @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h5><i class="icon fas fa-check"></i> Success!</h5>
              {{ Session::get('success_message') }}
            </div>
            @endif
          
        <form action="{{route('admin.login.try')}}" method="post">
            @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required> 
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
@endsection