@extends('Users.base')

@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="row" style="text-align:center">
              <h1>USUARIOS</h1>
      </div>
      <br>

        @component('layouts.esconder_info', ['title' => 'Agregar Información'])
            <!--Boton para Agregar-->
              <div class="form-group">
                <div class="col-md-7 col-md-offset-5">
                  <a class="btn btn-primary" href="{{ route('transport-user.create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Nuevo</a>
                </div>
              </div>
        @endcomponent


      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>

      <form method="POST" action="{{ route('transport-user.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Buscar'])
                <td class="col-md-12">
                  <input id="nombre1" type="text" class="form-control" placeholder="buscar por Primer Nombre/ Primer Apellido/ Rol/ Estado" name="nombre1" value="{{ old('nombre1') }}">
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
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Usuario</th>
                <th width="23%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre Usuario</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Email</th>
                <th width="15%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Rol</th>
                <th width="10%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Estado</th>
                <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr role="row" class="odd">
                  <td class="sorting">{{ $user->username }}</td>
                  <td class="sorting">{{ $user->first_name }} {{ $user->first_last_name }}</td>
                  <td class="sorting hidden-xs">{{ $user->email }}</td>
                  <td class="sorting hidden-xs">{{ $user->rol }} | {{ $user->organitation }} - {{ $user->municipality }}</td>    
                  <td class="sorting hidden-xs">{{ $user->state }}</td>               
                  <td>
                    <form class="row" method="POST" action="{{ route('transport-user.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('¿Está seguro que quiere eliminar a el registro?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if(Auth::user()->username != $user->username) 
                          @if($user->state_id == 1)
                          <button type="submit" class="btn btn-danger"><i class="fa fa-thumbs-o-down"></i></button>
                          @endif
                          @if($user->state_id == 2)
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Registros mostrados {{count($users)}}, registros existentes {{count($users)}}</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $users->links() }}
          </div>
        </div>
      </div>
    </div>      
    </div>
  </div>    

</section>
@endsection