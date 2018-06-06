<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image" style="align-container:center">
        @if (Auth::user()->avatar == null)
          <img src="../dist/img/user.jpg" class="img-circle" alt="User Image">
        @else
          <img src="{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        @endif
        </div>
        <div class="pull-left info" style="text-align:center">
          <h5>
          @if (Auth::user()->username == null)
            <span>Invitado</span>
          @else
            {{ Auth::user()->username}}
          @endif
        </h5>
          <!-- Status -->
          <h5><i class="fa fa-circle text-success"></i> En Linea</h5>
        </div>
        <br>
        <br>
      </div>
      <hr>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header" style="text-align:center"><b>PANEL DE CONTROL</b></li>
        <!-- Optionally, you can add icons to the links -->
        <li <?php echo current_page('home') ? "class='active'" : "";?>><a href="{{ route('home.index') }}">
          <i class="glyphicon glyphicon-home"></i> <span>Dashboard</span></a></li>
        @if(Auth::user()->rol_id == 1) 
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Administración Central</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('transport-rol.index') }}"><i class="fa fa-lock"></i> <span>Rol</span></a></li>
            <li><a href="{{ route('transport-employee.index') }}"><i class="fa fa-male"></i> <span>Empleado</span></a></li> 
            <li><a href="{{ route('transport-user.index') }}"><i class="fa fa-users"></i> <span>Usuario</span></a></li>   
            <li><a href="{{ route('transport-customer.index') }}"><i class="fa fa-terminal"></i> <span>Cliente</span></a></li>                                                                            
          </ul>
        </li>
        @endif
        @if(Auth::user()->rol_id == 2 || Auth::user()->rol_id == 3 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 5 ||Auth::user()->rol_id == 6 || Auth::user()->rol_id == 7)
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Planta de Extración</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->rol_id == 2 || Auth::user()->rol_id == 4 || Auth::user()->rol_id == 6)
            <li><a href="#"><i class="fa fa-tree"></i> <span>Extración</span></a></li>
            @endif
            @if(Auth::user()->rol_id == 3 || Auth::user()->rol_id == 5 || Auth::user()->rol_id == 7)
            <li><a href="#"><i class="fa fa-truck"></i> <span>Cargamento</span></a></li>
            @endif
          </ul>
        </li>
        @endif
        @if(Auth::user()->rol_id == 8 || Auth::user()->rol_id == 9 || Auth::user()->rol_id == 10 || Auth::user()->rol_id == 11 || Auth::user()->rol_id == 12 || Auth::user()->rol_id == 13)
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Planta Materia Prima</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->rol_id == 8 || Auth::user()->rol_id == 10 ||Auth::user()->rol_id == 12)
            <li><a href="{{ route('transport-typeoperator.index') }}"><i class="fa fa-terminal"></i> <span>Tipo de Operador</span></a></li>  
            <li><a href="{{ route('transport-statesubject.index') }}"><i class="fa fa-terminal"></i> <span>Estado de Extracción</span></a></li>   
            <li><a href="{{ route('transport-typeextraction.index') }}"><i class="fa fa-terminal"></i> <span>Tipo de Extracción</span></a></li>                                  
            @endif
            @if(Auth::user()->rol_id == 9 || Auth::user()->rol_id == 11 ||Auth::user()->rol_id == 13)
            <li><a href="#"><i class="fa fa-building"></i> <span>Materia Prima</span></a></li>
            @endif
          </ul>
        </li> 
        @endif 
        @if(Auth::user()->rol_id == 14 || Auth::user()->rol_id == 15 || Auth::user()->rol_id == 16 || Auth::user()->rol_id == 17 || Auth::user()->rol_id == 18 || Auth::user()->rol_id == 19)       
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Planta Producción</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->rol_id == 14 || Auth::user()->rol_id == 16 ||Auth::user()->rol_id == 18)
            <li><a href="{{ route('transport-unit.index') }}"><i class="fa fa-terminal"></i> <span>Producto</span></a></li>
            <li><a href="{{ route('transport-measurement.index') }}"><i class="fa fa-terminal"></i> <span>Unidad de Medida</span></a></li>     
            <li><a href="{{ route('transport-commoditieunit.index') }}"><i class="fa fa-terminal"></i> <span>Materia Prima Unidad</span></a></li>                          
            @endif
            @if(Auth::user()->rol_id == 15 || Auth::user()->rol_id == 17 ||Auth::user()->rol_id == 19)
            <li><a href="#">Link in level 2</a></li>
            @endif
          </ul>
        </li>
        @endif 
        @if(Auth::user()->rol_id == 20 || Auth::user()->rol_id == 21 || Auth::user()->rol_id == 22 || Auth::user()->rol_id == 23 || Auth::user()->rol_id == 24 || Auth::user()->rol_id == 25)            
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Distribución de Productos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->rol_id == 20 || Auth::user()->rol_id == 22 ||Auth::user()->rol_id == 24)
            <li><a href="#">Link in level 2</a></li>
            @endif
            @if(Auth::user()->rol_id == 21 || Auth::user()->rol_id == 23 ||Auth::user()->rol_id == 25)
            <li><a href="#">Link in level 2</a></li>
            @endif
          </ul>
        </li>   
        @endif 
        @if(Auth::user()->rol_id == 26 || Auth::user()->rol_id == 27)           
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Transportes</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            @if(Auth::user()->rol_id == 26)
           <li><a href="{{ route('transport-sales.index') }}"><i class="fa fa-terminal"></i> <span>Costo</span></a></li>  
            <li><a href="{{ route('transport-category.index') }}"><i class="fa fa-terminal"></i> <span>Category</span></a></li>  
            <li><a href="{{ route('transport-machinary.index') }}"><i class="fa fa-terminal"></i> <span>Maquinaria</span></a></li>             
            @endif
            @if(Auth::user()->rol_id == 27)
            <li><a href="#">Link in level 2</a></li>
            @endif
          </ul>
        </li>   
        @endif                      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
