@extends('auth.layouts.app')

@section('content')

@include('flash::message')
<div class="login-box-body">
<h4><b><p class="login-box-msg">CONFIRMAR EMAIL</p></b></h4>
<form form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('confirmation_email.store') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group has-feedback">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo" autocomplete="false" required autofocus/>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
          <input id="token" type="text" class="form-control" name="token" value="{{ old('token') }}" placeholder="Token" autocomplete="false" required autofocus/>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

    <div class="row">
        <div class="col-md-5 col-md-offset-7">
            <button type="submit" class="btn btn-primary btn-block btn-flat">CONFIRMAR</button>
        </div>
    </div>
</form>
@endsection
