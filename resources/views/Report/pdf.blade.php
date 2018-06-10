<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <style>
     table {
       border-collapse: collapse;
       width: 100%;
     }
     td, th {
       border: solid 1px;
       padding: 5px 3px;
     }
     tr {
       text-align: center;
     }
     .container {
       width: 100%;
       text-align: center;
       font-size:10px;
       font-family: "arial", serif;
     }
   </style>
  </head>
  <body>
    <div class="container">
        <div><h2>{{$title}}</h2></div>
       <table id="example2" role="grid">
            <thead>
              <tr role="row">
                <th width="33%">Cliente</th>
                <th width="33%">Maquinaria</th>
                <th width="33%">Costo</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($rents as $rent)
                <tr role="row" class="odd">
                  <td>DPI: {{ $rent['dpi'] }} Nombre: {{ $rent['first_name'] }} {{ $rent['second_name'] }} {{ $rent['first_last_name'] }} {{ $rent['second_last_name'] }} - Direccion: {{ $rent['departament'] }}, {{ $rent['municipality'] }}, {{ $rent['direction'] }} Telefono: {{ $rent['phone'] }}</td>
                  <td>Maquinaria: {{ $rent['machinery'] }} Modelo: {{ $rent['model'] }} Kilometrage: {{ $rent['km'] }} Descripcion: {{ $rent['description'] }} </td>  
                  <td>Total: {{ $rent['cost'] }} * {{ $rent['hour'] }} * {{ $rent['quantity'] }} = {{ $rent['ventas'] }} Tiempo de Retorno: {{ $rent['date_return'] }}</td>                                    
              </tr>
            @endforeach
            </tbody>
          </table>
    </div>
  </body>
</html>