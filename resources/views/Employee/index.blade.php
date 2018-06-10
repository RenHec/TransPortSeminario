@extends('Employee.base')

@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="row" style="text-align:center">
              <h1>EMPLEADOS</h1>
      </div>
      <br>

        @component('layouts.esconder_info', ['title' => 'Agregar Información'])
            <!--Boton para Agregar-->
              <div class="form-group">
                <div class="col-md-7 col-md-offset-5">
                  <a class="btn btn-primary" href="{{ route('transport-employee.create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Nuevo</a>
                </div>
              </div>
        @endcomponent


      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('transport-employee.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Buscar'])
                <td class="col-md-12">
                  <input id="nombre1" type="text" class="form-control" placeholder="buscar por Primer / Segundo Nombre/ Primer / Segundo Apellido/ Organizacion/ Departamento/ Municipio" name="nombre1" value="{{ old('nombre1') }}">
                </td>
        @endcomponent
      </form>

  <div class="box">
    <div class="box-body">
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead >
              <tr role="row">
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">CUI</th>                
                <th width="23%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Completo</th>
                <th width="8%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Foto</th>                
                <th width="28%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Dirección</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Teléfono</th>   
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Organizacion</th>                                
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dats as $data)
                <tr role="row" class="odd">
                  <td class="sorting hidden-xs">{{ $data->dpi }}</td>
                  <td class="sorting">{{ $data->first_name }} {{ $data->second_name }} {{ $data->first_last_name }} {{ $data->second_last_name }}</td>
                  <td class="sorting"><img src="{{ $data->avatar }}" width="50" height="50"></td>
                  <td class="sorting hidden-xs">{{ $data->departament }}, {{ $data->municipality }}, {{ $data->direction }}</td>
                  <td class="sorting hidden-xs">{{ $data->phone }}</td>    
                  <td class="sorting hidden-xs">{{ $data->organitation }}</td>               
                  <td>
                    <form class="row" method="POST" action="{{ route('transport-employee.destroy', ['id' => $data->id]) }}" onsubmit = "return confirm('¿Está seguro que quiere eliminar a el registro?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('transport-employee.edit', ['id' => $data->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        @if(Auth::user()->username != $data->username) 
                          @if($data->low == false)
                          <button type="submit" class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i></button>
                          @endif
                          @if($data->low == true)
                          <button type="submit" class="btn btn-success"><i class="fa fa-thumbs-o-up"></i></button>
                          @endif
                        @endif
                    </form>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Registros mostrados {{count($dats)}}, registros existentes {{count($dats)}}</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $dats->links() }}
          </div>
        </div>
      </div>
    </div>      
    </div>
  </div>    

</section>
@endsection
