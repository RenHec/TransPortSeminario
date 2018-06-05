@extends('Unit.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Nueva Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Producto</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-unit.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-10">
                <label for="name" class="control-label"><label style="color:red">*</label> Nombre del Producto</label>
                <input id="name" type="text" class="form-control" placeholder="piso ceramico" name="name" value="{{ old('name') }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-2">
                <label for="quantity_matter" class="control-label"><label style="color:red">*</label> Componentes</label>
                <input id="quantity_matter" type="text" class="form-control" placeholder="1" name="quantity_matter" value="{{ old('quantity_matter') }}" required autofocus>
                  @if ($errors->has('quantity_matter'))
                    <span class="help-block"><strong>{{ $errors->first('quantity_matter') }}</strong></span>
                  @endif
              </div>              
            </div>

            <div class="row">
              <div class="col-md-12">
                <label for="description" class="control-label"><label style="color:red">*</label> Descripcion</label>
                <textarea id="description" type="text" class="form-control" placeholder="descripcion" name="description" value="{{ old('description') }}" required autofocus></textarea>  
                  @if ($errors->has('description'))
                    <span class="help-block"><strong>{{ $errors->first('description') }}</strong></span>
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