@extends('Rol.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Nueva Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Rol</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-rol.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-6">
                <label for="name" class="control-label"><label style="color:red">*</label> Nombre</label>
                <input id="name" type="text" class="form-control" placeholder="nombre del rol" name="name" value="{{ old('name') }}" onkeypress="return letras(event)" maxlength="20" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-6">
                <label class="control-label"><label style="color:red">*</label> Organizacion</label>
                  <select class="form-control" name="organitation_id" required autofocus>
                    <option value="" selected disabled>seleccione organizacion</option>
                      @foreach ($organitations as $organitation)
                        <option value="{{$organitation->id}}">{{$organitation->name}}</option>
                      @endforeach
                  </select>             
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
          
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-rol.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-6">
                <label class="control-label"><label style="color:red">*</label> Menu</label>
                  <select class="form-control" name="menu_id" required autofocus>
                    <option value="" selected disabled>seleccione menu</option>
                      @foreach ($menus as $menu)
                        <option value="{{$menu->id}}">{{$menu->name}}</option>
                      @endforeach
                  </select>                 
              </div>
              <div class="col-md-6">
                <label class="control-label"><label style="color:red">*</label> Boton</label>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                  <div class="row">
                    <div class="col-sm-10">
                      <table id="example2" class="table table-responsive" role="grid" aria-describedby="example2_info">
                        <tr>
                          @foreach ($buttons as $button)
                            <td role="row" class="form-control"><input type="checkbox" name="button_id[]" value="{{$button->id}}">  {{ $button->name }}</td>
                          @endforeach
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>                
              </div>  
            </div>
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Agregar
                  </button>
                  <a href="{{ route('transport-rol.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection