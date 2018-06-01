<?php
function current_page($url = '/'){
  return request()->path() == $url;
}
?>
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
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
        <li class="treeview">
          <a href="#"><i class="glyphicon glyphicon-cog"></i> <span>Administracion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('user-management.index') }}"><i class="fa fa-users"></i> <span>Usuario</span></a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
