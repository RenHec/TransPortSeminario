<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TransPort, S.A.</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset("/catalogo/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset("/catalogo/css/agency.min.css") }}" rel="stylesheet" type="text/css" />
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">TransPort, S.A.</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
      </div>
    </nav>

              
    <!-- Contact -->
    <section id="contact">
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('nuevo.store') }}">
          {{ csrf_field() }}  
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">CLIENTE</h2>
          </div>
        </div>

            @foreach ($datas as $data)
              <input value="{{ $data->id }}" name="id" style="visibility:hidden">
            @endforeach  
            <div class="row">
              <div class="col-md-12">
                <label for="dpi" class="section-heading text-uppercase"><label style="color:red">*</label> CUI</label>
                <input id="dpi" type="text" class="form-control" placeholder="0000000000000" name="dpi" value="{{ old('dpi') }}" onkeypress="return numeros(event)" minlength="13" maxlength="13" required autofocus>
                  @if ($errors->has('dpi'))
                    <span class="help-block"><strong>{{ $errors->first('dpi') }}</strong></span>
                  @endif
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label for="first_name" class="section-heading text-uppercase"><label style="color:red">*</label> Primer Nombre</label>
                <input id="first_name" type="text" class="form-control" placeholder="nombre" name="first_name" value="{{ old('first_name') }}" onkeypress="return letras(event)" maxlength="50" required autofocus>
                  @if ($errors->has('first_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-3">
                <label for="second_name" class="section-heading text-uppercase"> Segundo Nombre</label>
                <input id="second_name" type="text" class="form-control" placeholder="nombre" name="second_name" value="{{ old('second_name') }}" onkeypress="return letras(event)" maxlength="50" autofocus>
                  @if ($errors->has('second_name'))
                    <span class="help-block"><strong>{{ $errors->first('second_name') }}</strong></span>
                  @endif
              </div> 
              <div class="col-md-3">
                <label for="first_last_name" class="section-heading text-uppercase"><label style="color:red">*</label> Primer Apellido</label>
                <input id="first_last_name" type="text" class="form-control" placeholder="apellido" name="first_last_name" value="{{ old('first_last_name') }}" onkeypress="return letras(event)" maxlength="50" required autofocus>
                  @if ($errors->has('first_last_name'))
                    <span class="help-block"><strong>{{ $errors->first('first_last_name') }}</strong></span>
                  @endif
              </div> 
              <div class="col-md-3">
                <label for="second_last_name" class="section-heading text-uppercase"> Segundo Apellido</label>
                <input id="second_last_name" type="text" class="form-control" placeholder="apellido" name="second_last_name" value="{{ old('second_last_name') }}" onkeypress="return letras(event)" maxlength="50" autofocus>
                  @if ($errors->has('second_last_name'))
                    <span class="help-block"><strong>{{ $errors->first('second_last_name') }}</strong></span>
                  @endif
              </div>                                           
            </div>
            <br>
            <div class="row">
              <div class="col-md-3">
                <label class="section-heading text-uppercase"><label style="color:red">*</label> Departamento</label>
                  <select class="form-control" name="departament_id" id="departament_id" required autofocus>
                    <option value="" selected disabled>seleccione departamento</option>
                      @foreach ($departaments as $departament)
                        <option value="{{$departament->id}}">{{$departament->name}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="col-md-3">
                <label class="section-heading text-uppercase"><label style="color:red">*</label> Municipio</label>
                  <select class="form-control" name="municipality_id" id='municipality_id' required autofocus>
                    <option value="" selected disabled>seleccione municipio</option>
                  </select>
              </div>
              <div class="col-md-6">
                <label for="direction" class="section-heading text-uppercase"><label style="color:red">*</label> Dirección</label>
                  <input id="direction" type="text" class="form-control" placeholder="zona/avenida/colonia/barrio/cacerio" name="direction" value="{{ old('direction') }}" maxlength="150" required autofocus>
                    @if ($errors->has('direction'))
                      <span class="help-block">
                        <strong>{{ $errors->first('direction') }}</strong>
                      </span>
                    @endif
              </div>
            </div>   
            <br>
            <div class="row">
              <div class="col-md-3">
                <label class="section-heading text-uppercase"><label style="color:red">*</label> Fecha de Nacimiento</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="{{ old('date_birth') }}" placeholder="yyyy-mm-dd" name="date_birth" class="form-control pull-right" id="fechaNacimiento" required>
                  </div>               
              </div>
              <div class="col-md-3">
                <label for="phone" class="section-heading text-uppercase"><label style="color:red">*</label> Teléfono</label>
                <input id="phone" type="text" class="form-control" placeholder="00000000" name="phone" value="{{ old('phone') }}" onkeypress="return numeros(event)" maxlength="8" required autofocus>
                  @if ($errors->has('phone'))
                    <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
                  @endif                
              </div>
            </div> 
            <br>
             <div class="row">
                <div class="col-md-6 col-md-offset-5">
                    <button type="submit" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus-sign"></i> Agregar
                    </button>
                </div>              
              </div>               
            </form>              
      </div>
    </section>  

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; TransPort 2018</span>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset ("/catalogo/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/dropdowns.js") }}"></script>
    <script src="{{ asset ("/catalogo/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset ("/catalogo/vendor/jquery-easing/jquery.easing.min.js") }}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset ("/catalogo/js/jqBootstrapValidation.js") }}"></script>  
    <script src="{{ asset ("/catalogo/js/contact_me.js") }}"></script>          

    <!-- Custom scripts for this template -->
    <script src="{{ asset ("/catalogo/js/agency.min.js") }}"></script>       
      <script>
        $(document).ready(function() {
          //Date picker
          $('#fechaNacimiento').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#fechaIngreso').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
          });
          $('#from').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#to').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#fromm').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#too').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#fecha').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#fechaInicio').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#fechaFin').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
          $('#fecha2').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
          });
        });
      </script>
    <script>
          function letras(e) {
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8) return true;
              patron =/[A-Za-z-áéíóúñÑ ]+/;
              te = String.fromCharCode(tecla);
              return patron.test(te);
          }
    </script>

    <script>
          function numeros(e) {
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8) return true;
              patron =/[0-9]+/;
              te = String.fromCharCode(tecla);
              return patron.test(te);
          }
    </script>

    <script>
          function tipolicencia(e) {
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8) return true;
              patron =/[ABCM]/;
              te = String.fromCharCode(tecla);
              return patron.test(te);
          }
    </script>

    <script>
          function letrasynumeros(e) {
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8) return true;
              patron =/[A-Za-záéíóú-0-9 ]/;
              te = String.fromCharCode(tecla);
              return patron.test(te);
          }
    </script>    

  </body>

</html>
