@extends('Employee.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Empleado</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-employee.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-9">
                <label for="dpi" class="control-label"><label style="color:red">*</label> CUI</label>
                <input id="dpi" type="text" class="form-control" placeholder="0000000000000" name="dpi" value="{{ $data->dpi }}" onkeypress="return numeros(event)" minlength="13" maxlength="13" required autofocus>
                  @if ($errors->has('dpi'))
                    <span class="help-block"><strong>{{ $errors->first('dpi') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label class="">
                    <div class="icheckbox_flat-green" style="position: relative;" aria-checked="true" aria-disabled="false"><input class="flat-red" style="position: absolute; opacity: 0;" type="checkbox" value="1" name="editCUI"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                     Modificar CUI
                  </label>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label for="first_name" class="control-label"><label style="color:red">*</label> Primer Nombre</label>
                <input id="first_name" type="text" class="form-control" placeholder="nombre" name="first_name" value="{{ $data->first_name }}" onkeypress="return letras(event)" maxlength="50" required autofocus>
                  @if ($errors->has('first_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-3">
                <label for="second_name" class="control-label"> Segundo Nombre</label>
                <input id="second_name" type="text" class="form-control" placeholder="nombre" name="second_name" value="{{ $data->second_name }}" onkeypress="return letras(event)" maxlength="50" autofocus>
                  @if ($errors->has('second_name'))
                    <span class="help-block"><strong>{{ $errors->first('second_name') }}</strong></span>
                  @endif
              </div> 
              <div class="col-md-3">
                <label for="first_last_name" class="control-label"><label style="color:red">*</label> Primer Apellido</label>
                <input id="first_last_name" type="text" class="form-control" placeholder="apellido" name="first_last_name" value="{{ $data->first_last_name }}" onkeypress="return letras(event)" maxlength="50" required autofocus>
                  @if ($errors->has('first_last_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_last_name') }}</strong></span>
                  @endif
              </div> 
              <div class="col-md-3">
                <label for="second_last_name" class="control-label"> Segundo Apellido</label>
                <input id="second_last_name" type="text" class="form-control" placeholder="apellido" name="second_last_name" value="{{ $data->second_last_name }}" onkeypress="return letras(event)" maxlength="50" autofocus>
                  @if ($errors->has('second_last_name'))
                    <span class="help-block"><strong>{{ $errors->first('second_last_name') }}</strong></span>
                  @endif
              </div>                                           
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label class="control-label"><label style="color:red">*</label> Departamento</label>
                  <select class="form-control" name="departament_id" id="departament_id" required autofocus>
                    <option value="" selected disabled>seleccione departamento</option>
                      @foreach ($departaments as $departament)
                        <option value="{{$departament->id}}" {{$departament->id == $data->departament_id ? 'selected' : ''}}>{{$departament->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-3">
                <label class="control-label"><label style="color:red">*</label> Municipio</label>
                <select class="form-control" name="municipality_id" id='municipality_id' required autofocus>
                  <option value="" selected disabled>seleccione municipio</option>
                  @foreach ($municipalitys as $municipality)
                    <option value="{{$municipality->id}}" {{$municipality->id == $data->municipality_id ? 'selected' : ''}}>{{$municipality->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="direction" class="control-label">Dirección</label>
                  <input id="direction" type="text" class="form-control" placeholder="zona/avenida/colonia/barrio/cacerio" name="direction" value="{{ $data->direction }}" maxlength="150" autofocus>
                    @if ($errors->has('direction'))
                      <span class="help-block">
                        <strong>{{ $errors->first('direction') }}</strong>
                      </span>
                    @endif
              </div>
            </div>   
            <br>
            <div class="row">
              <div class="col-md-3">
                <label class="control-label"><label style="color:red">*</label> Fecha de Nacimiento</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="{{ $data->date_birth }}" placeholder="yyyy-mm-dd" name="date_birth" class="form-control pull-right" id="fechaNacimiento" required>
                  </div>               
              </div>
              <div class="col-md-3">
                <label for="phone" class="control-label"><label style="color:red">*</label> Teléfono</label>
                <input id="phone" type="text" class="form-control" placeholder="00000000" name="phone" value="{{ $data->phone }}" onkeypress="return numeros(event)" maxlength="8" required autofocus>
                  @if ($errors->has('phone'))
                    <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                  @endif                
              </div>
              <div class="col-md-2">
               <label for="type_license" class="control-label"><label style="color:red">*</label> Tipo Licencia</label>
                <input id="type_license" type="text" class="form-control" placeholder="A / B / C / M" name="type_license" value="{{ $data->type_license }}" onkeypress="return tipolicencia(event)" minlength="1" maxlength="1" onKeyUp="this.value=this.value.toUpperCase();" required autofocus>
                  @if ($errors->has('type_license'))
                    <span class="help-block"><strong>{{ $errors->first('type_license') }}</strong></span>
                  @endif                
              </div>
              <div class="col-md-3">
                <ul>
                   <li class="fa fa-circle-o text-red"></li> <label class="control-label"> A - Transporte Pesado</label><br>
                   <li class="fa fa-circle-o text-red"></li> <label class="control-label"> B - Transporte Liviano</label><br>
                   <li class="fa fa-circle-o text-red"></li> <label class="control-label"> C - Carro</label><br>
                   <li class="fa fa-circle-o text-red"></li> <label class="control-label"> M - Moto</label>
                </ul>
              </div>
            </div> 
            <br>
            <div class="row">
              <div class="col-md-2" align="center">
                <img src="{{ $data->avatar }}" style="border:solid; width:100px; height:100px;">
                <output id="list2" style="border:solid; width:100px; height:100px;"</output>
              </div>
              <div class="col-md-5">
                <label class="control-label"><label style="color:red">*</label> Ingresar Foto</label>
                <input type="file" class="=form-control" id="avatar_edit" name="avatar_edit" accept=".png, .jpg" autofocus>
                <br>
                <div class="form-group">
                  <label class="">
                    <div class="icheckbox_flat-green" style="position: relative;" aria-checked="true" aria-disabled="false"><input class="flat-red" style="position: absolute; opacity: 0;" type="checkbox" value="1" name="editFoto"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                     Modificar Foto
                  </label>
                </div>                
              </div>
              <div class="col-md-5">
                <label class="control-label"><label style="color:red">*</label> Organización</label>
                  <select class="form-control" name="organitation_id" id="organitation_id" required autofocus>
                    <option value="" selected disabled>seleccione departamento</option>
                      @foreach ($organitations as $organitation)
                        <option value="{{$organitation->id}}" {{$organitation->id == $data->organitation_id ? 'selected' : ''}}>{{$organitation->name}} | {{$organitation->departament}}, {{$organitation->municipality}}</option>
                      @endforeach
                  </select>
              </div>              
            </div>       
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                  </button>
                  <a href="{{ route('transport-employee.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection