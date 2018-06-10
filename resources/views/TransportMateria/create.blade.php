@extends('TransportMateria.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Asignar</a></li>
      <li class="active">Extraccio a Operador</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-transportmateria.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-12">
                <label for="operator_id" class="control-label"><label style="color:red">*</label> Operador</label>
                <select class="form-control" name="operator_id" id="operator_id" required autofocus>
                  <option value="" selected disabled>seleccione operador</option>
                    @foreach ($operators as $operator)
                      <option value="{{$operator->id}}">Nombre: {{$operator->first_name}} {{$operator->second_name}} {{$operator->first_last_name}} {{$operator->second_last_name}}, Opera: {{$operator->machinery}}</option>
                    @endforeach
                </select>
              </div>                                          
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <label for="extraction_id" class="control-label"><label style="color:red">*</label> Operador</label>
                <select class="form-control" name="extraction_id" id="extraction_id" required autofocus>
                  <option value="" selected disabled>seleccione operador</option>
                    @foreach ($extractions as $extraction)
                      <option value="{{$extraction->id}}">Cantidad: {{$extraction->quantity}} {{$extraction->unit_measurement}} - Materia: {{$extraction->type_extraction}}</option>
                    @endforeach
                </select>
              </div>                                          
            </div>            
                        
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Agregar
                  </button>
                  <a href="{{ route('transport-transportmateria.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection