@extends('Extraction.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Extraccion</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-extraction.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-12">
                <label for="operator_id" class="control-label"><label style="color:red">*</label> Operador</label>
                <select class="form-control" name="operator_id" id="operator_id" required autofocus>
                  <option value="" selected disabled>seleccione operador</option>
                    @foreach ($operators as $operator)
                      <option value="{{$operator->id}}">{{ $operator->first_name }} {{ $operator->second_name }} {{ $operator->first_last_name }} {{ $operator->second_last_name }}</option>
                    @endforeach
                </select>
              </div>                                          
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <label for="quantity" class="control-label"><label style="color:red">*</label> Cantidad</label>
                <input id="quantity" type="text" class="form-control" placeholder="000.00" name="quantity" value="{{ old('quantity') }}" maxlength="75" required autofocus>
                  @if ($errors->has('quantity'))
                    <span class="help-block"><strong>{{ $errors->first('quantity') }}</strong></span>
                  @endif
              </div>               
              <div class="col-md-8">
                <label for="type_extraction_id" class="control-label"><label style="color:red">*</label> Materia Extraida</label>
                <select class="form-control" name="type_extraction_id" id="type_extraction_id" required autofocus>
                  <option value="" selected disabled>seleccione extraccion</option>
                    @foreach ($types_extractions as $types_extraction)
                      <option value="{{$types_extraction->id}}">{{$types_extraction->name}}</option>
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
                  <a href="{{ route('transport-extraction.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection