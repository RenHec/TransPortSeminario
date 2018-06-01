@extends('auth.layouts.app')

@section('content')

@include('flash::message')

<div class="login-box-body">
<h4><b><p class="login-box-msg">CREAR PASSWORD</p></b></h4>
@foreach ($buscar_emails as $buscar_email)
  <p class="login-box-msg"><img src="{{ $buscar_email->avatar }}" width="70" height="70"></p>
  <h4><b><p class="login-box-msg">{{$buscar_email->username}}</p></b></h4>

<form id="register" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('password_reset.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group has-feedback" style="text-align: center;">
        <span><input id="password" type="password" class="form-control" name="password" placeholder="password"  minlength="8" value="{{ old('password') }}" autofocus required></span>
        <span class="glyphicon glyphicon-triangle-left form-control-feedback"></span>
        <span id="result"></span>
        <br>
          <span class="help-block" style="color:red;"><strong>{{ $messages }}</strong></span>
      </div>

      <div class="form-group has-feedback">
        <input id="password-confirm" type="password" class="form-control" placeholder="confirmar password" name="password_confirmation" minlength="8" required autofocus>
        <span class="glyphicon glyphicon-triangle-left form-control-feedback"></span>
      </div>
    <div class="row">
        <div class="col-md-5 col-md-offset-7">
            <button type="submit" class="btn btn-primary btn-block btn-flat">GUARDAR</button>
        </div>
    </div>
    <input style="visibility: hidden;" type="text" class="form-control" name="username" value="{{ $buscar_email->username }}">
@endforeach
</form>
@endsection
