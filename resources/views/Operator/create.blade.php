@extends('Operator.base')

@section('action-content')

<section class="content-header">
  <h1>Crear Informacion</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Crear</a></li>
      <li class="active">Operador de Maquina</li>
    </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('transport-operator.store') }}">
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-12">
                <label for="category_id" class="control-label"><label style="color:red">*</label> Empleado</label>
                <select class="form-control" name="employee_id" id="employee_id" required autofocus>
                  <option value="" selected disabled>seleccione empleado</option>
                    @foreach ($employeees as $employee)
                      <option value="{{$employee->id}}">{{ $employee->first_name }} {{ $employee->second_name }} {{ $employee->first_last_name }} {{ $employee->second_last_name }}</option>
                    @endforeach
                </select>
              </div>                                          
            </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <label for="category_id" class="control-label"><label style="color:red">*</label> Categoria</label>
                <select class="form-control" name="category_id" id="category_id" required autofocus>
                  <option value="" selected disabled>seleccione categoria</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
              </div>  
              <div class="col-md-6">
               <label class="control-label"><label style="color:red">*</label> Maquinaria</label>
                  <select class="form-control" name="machinery_id" id='machinery_id' required autofocus>
                    <option value="" selected disabled>seleccione maquinaria</option>
                  </select>
              </div>                                         
            </div>
                        
            <br>
            <div class="row">
              <div class="col-md-6 col-md-offset-5">
                  <button type="submit" class="btn btn-primary">
                      <i class="glyphicon glyphicon-plus-sign"></i> Agregar
                  </button>
                  <a href="{{ route('transport-operator.index') }}" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
              </div>              
            </div>  
          </form>
        </div>
      </div>    
    </div>
  </div>
</section>  
@endsection