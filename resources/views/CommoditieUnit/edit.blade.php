@extends('CommoditieUnit.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Materia para Producto</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-commoditieunit.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-4">
                <label for="unit_id" class="control-label"><label style="color:red">*</label> Producto</label>
                <select class="form-control" name="unit_id" id="unit_id" required autofocus>
                  <option value="" selected disabled>seleccione producto</option>
                    @foreach ($units as $unit)
                      <option value="{{$unit->id}}" {{$unit->id == $data->unit_id ? 'selected' : ''}}>{{$unit->name}}</option>
                    @endforeach
                </select>
              </div> 
              <div class="col-md-4">
                <label for="type_extraction_id" class="control-label"><label style="color:red">*</label> Tipo de Extracción</label>
                <select class="form-control" name="type_extraction_id" id="type_extraction_id" required autofocus>
                  <option value="" selected disabled>seleccione tipo de extraccion</option>
                    @foreach ($typesextractions as $typeextraction)
                      <option value="{{$typeextraction->id}}" {{$typeextraction->id == $data->type_extraction_id ? 'selected' : ''}}>{{$typeextraction->name}}</option>
                    @endforeach
                </select>
              </div>               
              <div class="col-md-4">
                <label for="quantity" class="control-label"><label style="color:red">*</label> Cantidad</label>
                <input id="quantity" type="text" class="form-control" placeholder="00" name="quantity" value="{{ $data->quantity }}" required autofocus>
                  @if ($errors->has('quantity'))
                    <span class="help-block"><strong>{{ $errors->first('quantity') }}</strong></span>
                  @endif
              </div>
            </div>
            
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                  </button>
                  <a href="{{ route('transport-commoditieunit.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection