@extends('Extraction.base')

@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="row" style="text-align:center">
              <h1>EXTRACCIONES</h1>
      </div>
      <br>

        @component('layouts.esconder_info', ['title' => 'Agregar Información'])
            <!--Boton para Agregar-->
              <div class="form-group">
                <div class="col-md-7 col-md-offset-5">
                  <a class="btn btn-primary" href="{{ route('transport-extraction.create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Nuevo</a>
                </div>
              </div>
        @endcomponent


      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('transport-extraction.search') }}">
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
                <th width="30%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Operador</th>                
                <th width="30%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Maquinaria</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Tipo de Extraccion</th>    
                <th width="18%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Planta</th>                                          
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($dats as $data)
                <tr role="row" class="odd">
                  <td class="sorting">{{ $data->first_name }} {{ $data->second_name }} {{ $data->first_last_name }} {{ $data->second_last_name }}</td>
                  <td class="sorting hidden-xs">{{ $data->machinery }}</td>
                  <td class="sorting">{{ $data->quantity }} {{ $data->unit_measurement }} de {{ $data->types_extraction }} en estado {{ $data->state_subject }}</td>  
                  <td class="sorting hidden-xs">{{ $data->organitation }} de {{ $data->municipality }}</td>               
                  <td>
                  <a href="{{ route('transport-extraction.edit', ['id' => $data->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
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
