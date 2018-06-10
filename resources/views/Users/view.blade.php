@extends('Users.base')

@section('action-content')

<section class="content">
  <div class="row" style="text-align:center">
          <h1>Mostrar Informacion del Usuario</h1>
  </div>
  <br>

        <table id="example2" class="col-md-offset-4 table table-responsive" style="border:solid; width:40%">
            <tr>
              <td>
                  <label class="control-label"></label><b>DPI</b></label>
              </td>
              <td>
                  <label class="control-label"></label>{{ $user->dpi }}</label>
              </td>
            </tr>
            <tr>
              <td>
                  <label class="control-label"></label><b>Nombre Completo</b></label>
              </td>
              <td>
                  <label class="control-label"></label>{{ $user->first_name }} {{ $user->second_name }} {{ $user->first_last_name }} {{ $user->second_last_name }}</label>
              </td>
            </tr>
            <tr>
              <td>
                  <label class="control-label"></label><b>Username</b></label>
              </td>
              <td>
                  <label class="control-label"></label>{{ $user->username }}</label>
              </td>
            </tr>
            <tr>
              <td>
                  <label class="control-label"></label><b>Correo Electronico</b></label>
              </td>
              <td>
                  <label class="control-label"></label>{{ $user->email }}</label>
              </td>
            </tr>
            <tr>
              <td>
                  <label class="control-label"></label><b>Domicilio</b></label>
              </td>
              <td>
                  <label class="control-label"></label>{{ $user->departament_name }} , {{ $user->municipality_name }} , {{ $user->direction }}</label>
              </td>
            </tr>
            <tr>
              <td>
                  <label class="control-label"></label><b>Rol</b></label>
              </td>
              <td>
                  <label class="control-label"></label>{{ $user->rol_name }}</label>
              </td>
            </tr>
        </table>
        <!--Boton para Agregar-->
          <div class="form-group">
              <div class="col-md-8 col-md-offset-5">
                <li><a href="{{ route('transport-user.index') }}" class="btn btn-primary"><i class="fa fa-mail-reply-all"></i> Regresar</a></li>
              </div>
          </div>
</section>
@endsection
