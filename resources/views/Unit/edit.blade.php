@extends('Unit.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Producto</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-unit.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-10">
                <label for="name" class="control-label"><label style="color:red">*</label> Nombre del Producto</label>
                <input id="name" type="text" class="form-control" placeholder="piso ceramico" name="name" value="{{ $data->name }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-2">
                <label for="quantity_matter" class="control-label"><label style="color:red">*</label> Componentes</label>
                <input id="quantity_matter" type="text" class="form-control" placeholder="1" name="quantity_matter" value="{{ $data->quantity_matter }}" required autofocus>
                  @if ($errors->has('quantity_matter'))
                    <span class="help-block"><strong>{{ $errors->first('quantity_matter') }}</strong></span>
                  @endif
              </div>              
            </div>

            <div class="row">
              <div class="col-md-12">
                <label for="description" class="control-label"><label style="color:red">*</label> Descripcion</label>
                <textarea id="description" type="text" class="form-control" placeholder="descripcion" name="description" value="{{ $data->description }}" required autofocus>{{ $data->description }}</textarea>  
                  @if ($errors->has('description'))
                    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
                  @endif                   
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