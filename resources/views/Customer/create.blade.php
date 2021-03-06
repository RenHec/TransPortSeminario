@extends('Customer.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Cliente</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-customer.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-12">
                <label for="dpi" class="control-label"><label style="color:red">*</label> CUI</label>
                <input id="dpi" type="text" class="form-control" placeholder="0000000000000" name="dpi" value="{{ old('dpi') }}" onkeypress="return numeros(event)" minlength="13" maxlength="13" required autofocus>
                  @if ($errors->has('dpi'))
                    <span class="help-block"><strong>{{ $errors->first('dpi') }}</strong></span>
                  @endif
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label for="first_name" class="control-label"><label style="color:red">*</label> Primer Nombre</label>
                <input id="first_name" type="text" class="form-control" placeholder="nombre" name="first_name" value="{{ old('first_name') }}" onkeypress="return letras(event)" maxlength="50" required autofocus>
                  @if ($errors->has('first_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-3">
                <label for="second_name" class="control-label"> Segundo Nombre</label>
                <input id="second_name" type="text" class="form-control" placeholder="nombre" name="second_name" value="{{ old('second_name') }}" onkeypress="return letras(event)" maxlength="50" autofocus>
                  @if ($errors->has('second_name'))
                    <span class="help-block"><strong>{{ $errors->first('second_name') }}</strong></span>
                  @endif
              </div> 
              <div class="col-md-3">
                <label for="first_last_name" class="control-label"><label style="color:red">*</label> Primer Apellido</label>
                <input id="first_last_name" type="text" class="form-control" placeholder="apellido" name="first_last_name" value="{{ old('first_last_name') }}" onkeypress="return letras(event)" maxlength="50" required autofocus>
                  @if ($errors->has('first_last_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_last_name') }}</strong></span>
                  @endif
              </div> 
              <div class="col-md-3">
                <label for="second_last_name" class="control-label"> Segundo Apellido</label>
                <input id="second_last_name" type="text" class="form-control" placeholder="apellido" name="second_last_name" value="{{ old('second_last_name') }}" onkeypress="return letras(event)" maxlength="50" autofocus>
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
              <div class="col-md-6">
                <label for="direction" class="control-label"><label style="color:red">*</label> Dirección</label>
                  <input id="direction" type="text" class="form-control" placeholder="zona/avenida/colonia/barrio/cacerio" name="direction" value="{{ old('direction') }}" maxlength="150" required autofocus>
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
                    <input type="text" value="{{ old('date_birth') }}" placeholder="yyyy-mm-dd" name="date_birth" class="form-control pull-right" id="fechaNacimiento" required>
                  </div>               
              </div>
              <div class="col-md-3">
                <label for="phone" class="control-label"><label style="color:red">*</label> Teléfono</label>
                <input id="phone" type="text" class="form-control" placeholder="00000000" name="phone" value="{{ old('phone') }}" onkeypress="return numeros(event)" maxlength="8" required autofocus>
                  @if ($errors->has('phone'))
                    <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                  @endif                
              </div>
            </div> 
    
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Agregar
                  </button>
                  <a href="{{ route('transport-customer.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection