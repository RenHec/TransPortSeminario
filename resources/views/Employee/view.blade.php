@extends('Employee.base')

@section('action-content')

<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Mostrar</a></li>
      <li class="active">Empleado</li>
    </ol>
</section>
<br>
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box box-widget widget-user">
      <div class="widget-user-header bg-aqua-active">
        <h3 class="widget-user-username">Alexander Pierce</h3>
          <h5 class="widget-user-desc">Founder &amp; CEO</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle" src="{{ $data->avatar }}">
      </div>
      <div class="box-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">3,200</h5>
                <span class="description-text">SALES</span>
            </div>
          </div>

          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">13,000</h5>
                <span class="description-text">FOLLOWERS</span>
            </div>
          </div>

          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">35</h5>
                <span class="description-text">PRODUCTS</span>
            </div>
          </div>
        </div>
      </div>
    </div> 
    </div>
  </div>
</section>  
@endsection