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
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('rent.store') }}">
          {{ csrf_field() }}  
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">RENTA DE MAQUINARIA</h2>
          </div>
        </div>

          @foreach ($datas as $data)
          <div class="row">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="close-modal" data-dismiss="modal">
                  <div class="lr">
                    <div class="rl"></div>
                  </div>
                </div>
                <input value="{{ $data->id }}" name="warehous_machinary_id" style="visibility:hidden">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-8 mx-auto">
                      <div class="modal-body">
                        <!-- Project Details Go Here -->
                        <h2 class="text-uppercase">{{ $data->machinery }}</h2>
                        <img src="{{ $data->photo }}" class="img-fluid d-block mx-auto" alt="">
                        <p>{{ $data->description }}</p>
                        <ul class="list-inline">
                          <li>Modelo: {{ $data->model }}</li>
                          <li>Kilometrage: {{ $data->km }}</li>
                          <li>Stock: {{ $data->stock }}</li>
                          <li>Costo / Hora: {{ $data->sale_cost }}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          @endforeach
          <br>
          @foreach ($customers as $customer)
          <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-lg-8 mx-auto">
                  <div class="modal-body">
                    <input value="{{ $customer->id }}" name="customer_id" style="visibility:hidden">
                    <!-- Project Details Go Here -->
                    <h2 class="section-heading text-uppercase">{{ $customer->first_name }} {{ $customer->second_name }} {{ $customer->first_last_name }} {{ $customer->second_last_name }}</h2>
                  </div>
                </div>
              </div>
            </div>            
          </div>
          @endforeach
          <br>
            <div class="row">
              <div class="col-md-4">
                <label for="quantity" class="section-heading text-uppercase"><label style="color:red">*</label> Cantidad</label>
                <input id="quantity" type="text" class="form-control" placeholder="0000" name="quantity" value="{{ old('quantity') }}" onkeypress="return numeros(event)" maxlength="4" required autofocus>
                  @if ($errors->has('quantity'))
                    <span class="help-block"><strong>{{ $errors->first('quantity') }}</strong></span>
                  @endif
              </div>
              <div class="col-md-4">
                <label for="hour" class="section-heading text-uppercase"><label style="color:red">*</label> Horas</label>
                <input id="hour" type="text" class="form-control" placeholder="0000" name="hour" value="{{ old('hour') }}" onkeypress="return numeros(event)" maxlength="4" required autofocus>
                  @if ($errors->has('hour'))
                    <span class="help-block"><strong>{{ $errors->first('hour') }}</strong></span>
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
