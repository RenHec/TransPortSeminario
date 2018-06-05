@extends('TypeOperator.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Tipo Operador</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-typeoperator.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-7">
                <label for="name" class="control-label"><label style="color:red">*</label> Tipo Operador</label>
                <input id="name" type="text" class="form-control" placeholder="chofer" name="name" value="{{ $data->name }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
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
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                  </button>
                  <a href="{{ route('transport-unit.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection