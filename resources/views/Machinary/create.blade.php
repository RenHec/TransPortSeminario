@extends('Machinary.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Maquinaria</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-machinary.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-12">
                <label for="category_id" class="control-label"><label style="color:red">*</label> Categoria</label>
                <select class="form-control" name="category_id" id="category_id" required autofocus>
                  <option value="" selected disabled>seleccione categoria</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
              </div>                            
            </div>
            <br>
            <div class="row">
              <div class="col-md-12">
                <label for="name" class="control-label"><label style="color:red">*</label> Nombre</label>
                <input id="name" type="text" class="form-control" placeholder="honda / civic" name="name" value="{{ old('name') }}" maxlength="75" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
              </div>                            
            </div>
            <br>                        
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
              <div class="col-md-2" align="center">
                <output id="list1" style="border:solid; width:100px; height:100px;"</output>
              </div>
              <div class="col-md-5">
                <label class="control-label"><label style="color:red">*</label> Ingresar Foto</label>
                <input type="file" class="=form-control" id="avatar" name="avatar" accept=".png, .jpg" autofocus required>
              </div>
              <div class="col-md-3">
                <label for="model" class="control-label"><label style="color:red">*</label> Modelo</label>
                <input id="model" type="text" class="form-control" placeholder="1900" name="model" value="{{ old('model') }}" onkeypress="return numero(event)" maxlength="4" required autofocus>
                  @if ($errors->has('model'))
                    <span class="help-block"><strong>{{ $errors->first('model') }}</strong></span>
                  @endif
              </div>    
             <div class="col-md-2">
                <label for="km" class="control-label"><label style="color:red">*</label> KM</label>
                <input id="km" type="text" class="form-control" placeholder="1900" name="km" value="{{ old('km') }}" onkeypress="return numero(event)" maxlength="10" required autofocus>
                  @if ($errors->has('km'))
                    <span class="help-block"><strong>{{ $errors->first('km') }}</strong></span>
                  @endif
              </div>                        
            </div> 
                        
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Agregar
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