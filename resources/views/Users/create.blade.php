@extends('Users.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Usuario</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-user.store') }}">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-4">
                <label for="username" class="control-label"><label style="color:red">*</label> Username</label>
                <input id="username" type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}" onkeypress="return letras(event)" maxlength="30" required autofocus>
                  @if ($errors->has('username'))
                    <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-7">
                <label for="email" class="control-label"><label style="color:red">*</label> Correo Electronico</label>
                <input id="email" type="text" class="form-control" placeholder="email electronico" name="email" value="{{ old('email') }}" maxlength="50" required autofocus>
                  @if ($errors->has('email'))
                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                  @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label class="control-label"><label style="color:red">*</label> Organizacion</label>
                  <select class="form-control" name="organitation_id" id="organitation_id" required autofocus>
                    <option value="" selected disabled>seleccione organizacion</option>
                      @foreach ($organitations as $organitation)
                        <option value="{{$organitation->id}}">{{$organitation->name}} | {{$organitation->departament}}, {{$organitation->municipality}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-4">
                <label class="control-label"><label style="color:red">*</label> Empleado</label>
                  <select class="form-control" name="employee_id" id='employee_id' required autofocus>
                    <option value="" selected disabled>seleccione empleado</option>
                  </select>
              </div>  
              <div class="col-md-4">
                <label class="control-label"><label style="color:red">*</label> Rol</label>
                  <select class="form-control" name="rol_id" id='rol_id' required autofocus>
                    <option value="" selected disabled>seleccione rol</option>
                  </select>
              </div>                           
            </div>
            <br>

            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Agregar
                  </button>
                  <a href="{{ route('transport-user.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection