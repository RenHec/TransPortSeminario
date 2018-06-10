@extends('Extraction.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Extraccion</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-extraction.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-12">
                <label for="operator_id" class="control-label"><label style="color:red">*</label> Operador</label>
                <select class="form-control" name="operator_id" id="operator_id" required autofocus>
                  <option value="" selected disabled>seleccione operador</option>
                    @foreach ($operators as $operator)
                      <option value="{{$operator->id}}" {{$operator->id == $data->operator_id ? 'selected' : ''}}>{{ $operator->first_name }} {{ $operator->second_name }} {{ $operator->first_last_name }} {{ $operator->second_last_name }}</option>
                    @endforeach
                </select>
              </div>                                          
            </div>
            <br>
            <div class="row">
              <div class="col-md-4">
                <label for="quantity" class="control-label"><label style="color:red">*</label> Cantidad</label>
                <input id="quantity" type="text" class="form-control" placeholder="000.00" name="quantity" value="{{ $data->quantity }}" maxlength="75" required autofocus>
                  @if ($errors->has('quantity'))
                    <span class="help-block"><strong>{{ $errors->first('quantity') }}</strong></span>
                  @endif
              </div>               
              <div class="col-md-8">
                <label for="type_extraction_id" class="control-label"><label style="color:red">*</label> Materia Extraida</label>
                <select class="form-control" name="type_extraction_id" id="type_extraction_id" required autofocus>
                  <option value="" selected disabled>seleccione extraccion</option>
                    @foreach ($types_extractions as $types_extraction)
                      <option value="{{$types_extraction->id}}" {{$types_extraction->id == $data->type_extraction_id ? 'selected' : ''}}>{{$types_extraction->name}}</option>
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
                  <a href="{{ route('transport-machinary.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection