@extends('Category.base')

@section('action-content')

<section class="content-header">
  <h1>Editar Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Editar</a></li>
      <li class="active">Categoria</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('transport-category.update', ['id' => $data->id]) }}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
              <div class="col-md-12">
                <label for="name" class="control-label"><label style="color:red">*</label> Categoria</label>
                <input id="name" type="text" class="form-control" placeholder="categoria" name="name" value="{{ $data->name }}" required autofocus>
                  @if ($errors->has('name'))
                    <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                  @endif
              </div>
            </div>
            
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-floppy-disk"></i> Guardar
                  </button>
                  <a href="{{ route('transport-sales.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection