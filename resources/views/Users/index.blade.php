@extends('Users.base')

@section('action-content')
    <!-- Main content -->
    <section class="content">
      <div class="row" style="text-align:center">
              <h1>Mostrar Usuarios</h1>
      </div>
      <br>

        @component('layouts.esconder_info', ['title' => 'Agregar Usuario'])
            <!--Boton para Agregar-->
              <div class="form-group">
                <div class="col-md-7 col-md-offset-5">
                  <a class="btn btn-primary" href="{{ route('user-management.create') }}"><i class="glyphicon glyphicon-plus-sign"></i> Nuevo Usuario</a>
                </div>
              </div>
        @endcomponent

  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('user-management.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Buscar'])
                <td class="col-md-10">
                  <input id="nombre1" type="text" class="form-control" placeholder="buscar por Nombre/Apellido" name="nombre1" value="{{ old('nombre1') }}" onKeyUp="this.value=this.value.toUpperCase();">
                </td>
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead >
              <tr role="row">
                <th width="8%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Usuario</th>
                <th width="10%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Imagen</th>
                <th width="30%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Nombre</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Rol</th>
                <th width="5%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Estado</th>
                <th width="15%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Opciones</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr role="row" class="odd">
                  <td class="sorting">{{ $user->username }}</td>
                  <td class="sorting"> <img src="{{ $user->avatar }}" width="50" height="50"></td>
                  <td class="sorting hidden-xs">{{ $user->first_name }}
                                        {{ $user->second_name }}
                                        {{ $user->first_last_name }}
                                        {{ $user->second_last_name }}</td>
                  <td class="sorting hidden-xs">{{ $user->rol_name }}</td>
                  @if($user->estado == 1)
                  <td class="sorting hidden-xs">Activo</td>
                  @endif
                  @if($user->estado == 2)
                  <td class="sorting hidden-xs">Inactivo</td>
                  @endif
                  <td>
                    <form class="row" method="POST" action="{{ route('user-management.destroy', ['id' => $user->id]) }}" onsubmit = "return confirm('¿Está seguro que quiere eliminar a el registro?')">
                        <input type="hidden" name="_method" onKeyUp="this.value=this.value.toUpperCase();" value="DELETE">
                        <input type="hidden" name="_token" onKeyUp="this.value=this.value.toUpperCase();" value="{{ csrf_token() }}">
                        <a href="{{ route('user-management.edit', ['id' => $user->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('user-management.show', ['id' => $user->id]) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        @if ($user->username != Auth::user()->username)
                          <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                        @endif
                    </form>
                  </td>
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

    </section>
    <!-- /.content -->
  </div>
@endsection
