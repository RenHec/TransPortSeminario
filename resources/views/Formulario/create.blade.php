@extends('Formulario.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Nueva Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Formulario TB</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-formulario.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-6">
                <label class="control-label"><label style="color:red">*</label> Nombre</label>
                <input type="text" class="form-control" placeholder="nombre del cliente" name="nombre_cliente" value="{{ old('nombre_cliente') }}" onkeypress="return letras(event)" required autofocus>
              </div>
              <div class="col-md-6">
                <label class="control-label"><label style="color:red">*</label> Apellido</label>
                <input type="text" class="form-control" placeholder="apellido del cliente" name="apellido_cliente" value="{{ old('apellido_cliente') }}" onkeypress="return letras(event)" required autofocus>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <label class="control-label"><label style="color:red">*</label> Direccion</label>
                <input type="text" class="form-control" placeholder="direccion del cliente" name="direccion" value="{{ old('direccion') }}" required autofocus>
              </div>
            </div>    

            <div class="row">
              <div class="col-md-3">
                <label class="control-label"><label style="color:red">*</label> Telefono</label>
                <input type="text" class="form-control" placeholder="telefono del cliente" name="telefono" value="{{ old('telefono') }}" required autofocus>
              </div>
              <div class="col-md-3">
                <label class="control-label"><label style="color:red">*</label> NIT</label>
                <input type="text" class="form-control" placeholder="nit del cliente" name="nit" value="{{ old('nit') }}" required autofocus>
              </div>                 
              <div class="col-md-3">
                <label class="control-label"><label style="color:red">*</label> Estado Civil</label>
                <input type="text" class="form-control" placeholder="estado civil del cliente" name="estado_civil" value="{{ old('estado_civil') }}" required autofocus>
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