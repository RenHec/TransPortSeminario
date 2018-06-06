@extends('CommoditieUnit.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Nueva Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Materia para Producto</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-commoditieunit.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-4">
                <label for="unit_id" class="control-label"><label style="color:red">*</label> Producto</label>
                <select class="form-control" name="unit_id" id="unit_id" required autofocus>
                  <option value="" selected disabled>seleccione producto</option>
                    @foreach ($units as $unit)
                      <option value="{{$unit->id}}">{{$unit->name}}</option>
                    @endforeach
                </select>
              </div> 
              <div class="col-md-4">
                <label for="type_extraction_id" class="control-label"><label style="color:red">*</label> Tipo de Extracción</label>
                <select class="form-control" name="type_extraction_id" id="type_extraction_id" required autofocus>
                  <option value="" selected disabled>seleccione tipo de extraccion</option>
                    @foreach ($typesextractions as $typeextraction)
                      <option value="{{$typeextraction->id}}">{{$typeextraction->name}}</option>
                    @endforeach
                </select>
              </div>               
              <div class="col-md-4">
                <label for="quantity" class="control-label"><label style="color:red">*</label> Cantidad</label>
                <input id="quantity" type="text" class="form-control" placeholder="00" name="quantity" value="{{ old('quantity') }}" required autofocus>
                  @if ($errors->has('quantity'))
                    <span class="help-block"><strong>{{ $errors->first('quantity') }}</strong></span>
                  @endif
              </div>
            </div>

            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Guardar
                  </button>
              </div>              
            </div>
            <br>
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection