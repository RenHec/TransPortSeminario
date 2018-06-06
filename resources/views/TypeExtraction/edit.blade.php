@extends('TypeExtraction.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Tipo de Extracción</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-typeextraction.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-4">
                <label for="name" class="control-label"><label style="color:red">*</label> Nombre</label>
                <input id="name" type="text" class="form-control" placeholder="arcilla / etc" name="name" value="{{ $data->name }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-4">
                <label for="state_subject_id" class="control-label"><label style="color:red">*</label> Estado de la Materia</label>
                <select class="form-control" name="state_subject_id" id="state_subject_id" required autofocus>
                  <option value="" selected disabled>seleccione estado de la materia</option>
                    @foreach ($statesubjects as $statesubject)
                      <option value="{{$statesubject->id}}" {{$statesubject->id == $data->state_subject_id ? 'selected' : ''}}>{{$statesubject->name}}</option>
                    @endforeach
                </select>
              </div> 
              <div class="col-md-4">
                <label for="unit_measurement_id" class="control-label"><label style="color:red">*</label> Estado de la Materia</label>
                <select class="form-control" name="unit_measurement_id" id="unit_measurement_id" required autofocus>
                  <option value="" selected disabled>seleccione unidad de medida</option>
                    @foreach ($unitmesurements as $unitmesurement)
                      <option value="{{$unitmesurement->id}}" {{$unitmesurement->id == $data->unit_measurement_id ? 'selected' : ''}}>{{$unitmesurement->name}} || {{$unitmesurement->abbreviation}}</option>
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
                  <a href="{{ route('transport-sales.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection