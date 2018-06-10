@extends('Users.base')

@section('action-content')

<section class="content">
  <div class="row" style="text-align:center">
          <h1>Actualizar Usuario</h1>
  </div>
  <br>

  <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-user', ['id' => $user->id]) }}">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="container">
  <div class="row">
        <div class="col-md-11">
          <label for="dpi" class="control-label"><label style="color:red">*</label> DPI</label>
          <input id="dpi" type="text" class="form-control" placeholder="0000000000000" name="dpi" value="{{ $user->dpi }}" onkeypress="return numeros(event)" minlength="13" maxlength="13" required autofocus>
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
            @if ($user->rol_id == 1)
              @foreach ($rols as $rol)
              <option disabled value="{{$rol->id}}" {{ $rol->id == $user->rol_id ? 'selected' : ''}}>{{$rol->name}}</option>
              @endforeach
            @else
              <option value="" selected disabled>seleccione rol</option>
              @foreach ($rols as $rol)
                  <option value="{{$rol->id}}" {{$rol->id == $user->rol_id ? 'selected' : ''}}>{{$rol->name}}</option>
              @endforeach
            @endif
        </select>
    </div>
  </div>
  <br>
  <div class="row">
      <div class="col-md-6">
        <label for="nombre1" class="control-label"><label style="color:red">*</label> Primer Nombre</label>
        <input id="nombre1" type="text" class="form-control" placeholder="primer nombre" name="nombre1" value="{{ $user->first_name  }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('nombre1'))
            <span class="help-block"><strong>{{ $errors->first('nombre1') }}</strong></span>
          @endif
      </div>

      <div class="col-md-5">
        <label for="apellido1" class="control-label"><label style="color:red">*</label> Primer Apellido</label>
        <input id="apellido1" type="text" class="form-control" placeholder="primer apellido" name="apellido1" value="{{ $user->first_last_name  }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('apellido1'))
            <span class="help-block"><strong>{{ $errors->first('apellido1') }}</strong></span>
          @endif
      </div>
  </div>
  <br>
  <div class="row">
      <div class="col-md-6">
        <label for="nombre2" class="control-label">Segundo Nombre</label>
        <input id="nombre2" type="text" class="form-control" placeholder="segundo nombre" name="nombre2" value="{{ $user->second_name }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" autofocus>
          @if ($errors->has('nombre2'))
            <span class="help-block"><strong>{{ $errors->first('nombre2') }}</strong></span>
          @endif
      </div>
      <div class="col-md-5">
        <label for="apellido2" class="control-label">Segundo Apellido</label>
        <input id="apellido2" type="text" class="form-control" placeholder="segundo apellido" name="apellido2" value="{{ $user->second_last_name }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" autofocus>
          @if ($errors->has('apellido2'))
            <span class="help-block"><strong>{{ $errors->first('apellido2') }}</strong></span>
          @endif
      </div>
  </div>
  <br>
  <div class="row">
      <div class="col-md-3">
        <label for="username" class="control-label"><label style="color:red">*</label> Username</label>
        <input id="username" type="text" class="form-control" placeholder="username" name="username" value="{{ $user->username }}" onkeypress="return letras(event)" maxlength="30" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('username'))
            <span class="help-block"><strong>{{ $errors->first('username') }}</strong></span>
          @endif
      </div>
      <div class="col-md-8">
        <label for="correo" class="control-label"><label style="color:red">*</label> Correo Electronico</label>
        <input id="correo" type="text" class="form-control" placeholder="correo electronico" name="correo" value="{{ $user->email }}" maxlength="50" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
          @if ($errors->has('correo'))
            <span class="help-block"><strong>{{ $errors->first('correo') }}</strong></span>
          @endif
      </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-11">
        <label>
            <input type="checkbox" name="pass_edit" id="pass_edit" value="1" onchange="javascript:PasswordEdit()" />
            Editar Password
        </label>
    </div>
  </div>
  <br>
  <div id="editar_password" style="display: none;">
    <div class="row">
            <div class="col-md-6">
              <label for="password" class="control-label"><label style="color:red">*</label> Contraseña</label>
              <input id="password" type="password" class="form-control" placeholder="password" name="password" onkeypress="return letrasynumeros(event)" minlength="8" autofocus>
                @if ($errors->has('password'))
                  <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                @endif
            </div>
            <div class="col-md-5">
              <label for="password-confirm" class="control-label"><label style="color:red">*</label> Confirmar Contraseña</label>
              <input id="password-confirm" type="password" class="form-control" placeholder="confirmar password" name="password_confirmation" onkeypress="return letrasynumeros(event)" minlength="8" autofocus>
            </div>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3">
      <label class="control-label"><label style="color:red">*</label> Departamento</label>
        <select class="form-control" name="departament_id" id="departament_id" required autofocus>
          <option value="" selected disabled>seleccione departamento</option>
            @foreach ($departaments as $departament)
              <option value="{{$departament->id}}" {{$departament->id == $user->departament_id ? 'selected' : ''}}>{{$departament->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
      <label class="control-label"><label style="color:red">*</label> Municipio</label>
        <select class="form-control" name="municipality_id" id='municipality_id' required autofocus>
          <option value="" selected disabled>seleccione municipio</option>
          @foreach ($municipalitys as $municipality)
            <option value="{{$municipality->id}}" {{$municipality->id == $user->municipality_id ? 'selected' : ''}}>{{$municipality->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-5">
        <label for="direccion" class="control-label">Dirección</label>
          <input id="direccion" type="text" class="form-control" placeholder="zona/avenida/colonia/barrio/cacerio" name="direccion" value="{{ $user->direction }}" maxlength="75" onKeyUp="this.value=this.value.toUpperCase();" autofocus>
            @if ($errors->has('direccion'))
              <span class="help-block">
                <strong>{{ $errors->first('direccion') }}</strong>
              </span>
            @endif
      </div>
  </div>
  @if ($user->estado == 2)
  <br>
  <div class="row">
      <div class="col-md-11">
        <label class="control-label"> Activar Cuenta</label>
          <select class="form-control" name="estado" id="estado" autofocus>
            <option value="2" selected disabled>Desea Activar nuevamente la Cuenta</option>
              <option value="1">Activar</option>
          </select>
    </div>
  </div>
  @endif
</div>
<!--Boton para Agregar-->
<br>
<div class="row">
      <div class="col-md-6 col-md-offset-5">
          <button type="submit" class="btn btn-primary">
              <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
          </button>
          <a href="{{ route('user-management.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
      </div>
</div>
</form>

</section>
@endsection
