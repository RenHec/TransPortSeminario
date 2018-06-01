@extends('Users.base')

@section('action-content')

<section class="content">
  <div class="row" style="text-align:center">
          <h1>Crear Nuevo Usuario</h1>
  </div>
  <br>

  <div class="container">
    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('user-management.store') }}">
      {{ csrf_field() }}
    <div class="row">
      <div class="col-md-11">
        <label for="dpi" class="control-label"><label style="color:red">*</label> DPI</label>
        <input id="dpi" type="text" class="form-control" placeholder="0000000000000" name="dpi" value="{{ old('dpi') }}" onkeypress="return numeros(event)" minlength="13" maxlength="13" required autofocus>
          @if ($errors->has('dpi'))
            <span class="help-block"><strong>{{ $errors->first('dpi') }}</strong></span>
          @endif
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-11">
        <label class="control-label"><label style="color:red">*</label> Rol</label>
          <select class="form-control" name="rol_id" id="rol_id" required autofocus>
            <option value="" selected disabled>seleccione rol</option>
              @foreach ($rols as $rol)
                <option value="{{$rol->id}}">{{$rol->name}}</option>
              @endforeach
          </select>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6">
        <label for="nombre1" class="control-label"><label style="color:red">*</label> Primer Nombre</label>
        <input id="nombre1" type="text" class="form-control" placeholder="primer nombre" name="nombre1" value="{{ old('nombre1') }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('nombre1'))
            <span class="help-block"><strong>{{ $errors->first('nombre1') }}</strong></span>
          @endif
      </div>
      <div class="col-md-5">
        <label for="apellido1" class="control-label"><label style="color:red">*</label> Primer Apellido</label>
        <input id="apellido1" type="text" class="form-control" placeholder="primer apellido" name="apellido1" value="{{ old('apellido1') }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('apellido1'))
            <span class="help-block"><strong>{{ $errors->first('apellido1') }}</strong></span>
          @endif
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-6">
        <label for="nombre2" class="control-label">Segundo Nombre</label>
        <input id="nombre2" type="text" class="form-control" placeholder="segundo nombre" name="nombre2" value="{{ old('nombre2') }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" autofocus>
          @if ($errors->has('nombre2'))
            <span class="help-block"><strong>{{ $errors->first('nombre2') }}</strong></span>
          @endif
      </div>
      <div class="col-md-5">
        <label for="apellido2" class="control-label">Segundo Apellido</label>
        <input id="apellido2" type="text" class="form-control" placeholder="segundo apellido" name="apellido2" value="{{ old('apellido2') }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" autofocus>
          @if ($errors->has('apellido2'))
            <span class="help-block"><strong>{{ $errors->first('apellido2') }}</strong></span>
          @endif
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4">
        <label for="username" class="control-label"><label style="color:red">*</label> Username</label>
        <input id="username" type="text" class="form-control" placeholder="username" name="username" value="{{ old('username') }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('username'))
            <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
          @endif
      </div>
      <div class="col-md-7">
        <label for="correo" class="control-label"><label style="color:red">*</label> Correo Electronico</label>
        <input id="correo" type="text" class="form-control" placeholder="correo electronico" name="correo" value="{{ old('correo') }}" maxlength="50" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('correo'))
            <span class="help-block"><strong>{{ $errors->first('correo') }}</strong></span>
          @endif
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4">
        <label class="control-label"><label style="color:red">*</label> Departamento</label>
          <select class="form-control" name="departament_id" id="departament_id" required autofocus>
            <option value="" selected disabled>seleccione departamento</option>
              @foreach ($departaments as $departament)
                <option value="{{$departament->id}}">{{$departament->name}}</option>
              @endforeach
          </select>
      </div>
      <div class="col-md-3">
        <label class="control-label"><label style="color:red">*</label> Municipio</label>
          <select class="form-control" name="municipality_id" id='municipality_id' required autofocus>
            <option value="" selected disabled>seleccione municipio</option>
          </select>
      </div>
      <div class="col-md-4">
        <label for="direccion" class="control-label">Dirección</label>
          <input id="direccion" type="text" class="form-control" placeholder="zona/avenida/colonia/barrio/cacerio" name="direccion" value="{{ old('direccion') }}" maxlength="75" onKeyUp="this.value=this.value.toUpperCase();" autofocus>
            @if ($errors->has('direccion'))
              <span class="help-block">
                <strong>{{ $errors->first('direccion') }}</strong>
              </span>
            @endif
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-md-2" align="center">
        <output id="list" style="border:solid; width:100px; height:100px;"</output>
      </div>
      <div class="col-md-3">
        <label class="control-label"><label style="color:red">*</label> Ingresar Foto</label>
        <input type="file" class="=form-control" id="avatar_subir" name="avatar_subir" accept=".png, .jpg" autofocus required>
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <!--Boton para Agregar-->
      <div class="col-md-6 col-md-offset-5">
          <button type="submit" class="btn btn-primary">
              <i class="glyphicon glyphicon-plus-sign"></i> Nuevo Usuario
          </button>
          <a href="{{ route('user-management.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
      </div>
    </div>
    </form>
  </div>
</section>
@endsection
