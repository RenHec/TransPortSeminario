<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/dropdowns.js") }}"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/precargarimagen.js") }}"></script>

<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/fastclick/fastclick.js") }}" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript" ></script>
<script src="{{ asset ("/bower_components/AdminLTE/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript" ></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>

  <script type="text/javascript">
        function showContent() {
            element = document.getElementById("editar_direccion");
            check = document.getElementById("check");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
    </script>
    <script type="text/javascript">
        function PasswordEdit() {
            element = document.getElementById("editar_password");
            check = document.getElementById("pass_edit");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
    </script>
    <script type="text/javascript">
        function EsconderDias() {
            element = document.getElementById("editar_dia");
            check = document.getElementById("dia_default");
            if (check.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    </script>
    <script type="text/javascript">
        function EsconderTerapias() {
            element = document.getElementById("editar_terapia");
            check = document.getElementById("terapia_default");
            if (check.checked) {
                element.style.display='none';
            }
            else {
                element.style.display='block';
            }
        }
    </script>
    <script>
      $('div.alert').not('.alert-important').delay(1000).fadeOut(200);
    </script>
      <script>
        $(document).ready(function() {
          //Date picker
          $('#fechaNacimiento').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
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
          function letrasynumeros(e) {
              tecla = (document.all) ? e.keyCode : e.which;
              if (tecla==8) return true;
              patron =/[A-Za-záéíóú-0-9 ]/;
              te = String.fromCharCode(tecla);
              return patron.test(te);
          }
    </script>

    <script type="text/javascript">
      function mostrarReferencia(){
        if (document.fcontacto.Conocido[1].checked == true) {
          document.getElementById('desdeotro').style.display='block';
        } else {
          document.getElementById('desdeotro').style.display='none';
        }
      }
    </script>
