@extends('Formulario.base')

@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="row" style="text-align:center">
              <h1>Mostrar Información</h1>
      </div>
      <br>

        @component('layouts.esconder_info', ['title' => 'Agregar Información'])
            <!--Boton para Agregar-->
              <div class="form-group">
                <div class="col-md-7 col-md-offset-5">
                  <a class="btn btn-primary" href="{{ route('transport-formulario.create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Nuevo</a>
                </div>
              </div>
        @endcomponent


      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('transport-formulario.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Buscar'])
                <td class="col-md-12">
                  <input id="nombre1" type="text" class="form-control" placeholder="buscar por Boton/Menu/Rol" name="nombre1" value="{{ old('nombre1') }}">
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
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Completo</th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Direccion</th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Telefono</th>   
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nit</th>  
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Estado Civil</th> 
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Status</th>                                                          
                <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dats as $data)
                <tr role="row" class="odd">
                  <td class="sorting">{{ $data->nombre_cliente }} {{ $data->apellido_cliente }}</td>
                  <td class="sorting">{{ $data->direccion }}</td>
                  <td class="sorting">{{ $data->telefono }}</td>
                  <td class="sorting">{{ $data->nit }}</td>
                  <td class="sorting">{{ $data->estado_civil }}</td>
                  <td class="sorting">{{ $data->status }}</td>
                  <td>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <a href="{{ route('transport-rol.edit', ['id' => $data->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('transport-rol.show', ['id' => $data->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                  </td>
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
