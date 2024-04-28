<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    table {
      width: 100%;
    }
    table, th, td {
      border-collapse: collapse;
    }
    th {
      padding-bottom: .25em;
    }
    th:first-child {
      text-align: left;
    }
    td {
      border: 1px solid #000;
      text-align: center;
      /* padding: 0; */
    }
    td:first-child {
      text-align: left;
      padding: .25em;
    }
    td > div {
      padding: .25em;
      color: transparent;
      color: rgba(0,0,0,.5);
    }
    #post {
      max-width: 1000px;
      margin: 0 auto;
    }
    .green {
      background: lightgreen;
    }
    .red {
      background: #f300006b;
      background: #c1cbdb6b;
      color: transparent;
    }
  </style>
</head>
<body>
  <div id="post">
    <h2 style="margin-bottom: .5em;">
      Condominio Bloque 11 - 2021-2022
    </h2>
    <p style="color: grey; margin-top: 0;">
      Domingo 28 de Marzo de 2022
    </p>
    <table>
      <thead>
        <th>
          Apto
        </th>
        <th>
          Sept
        </th>
        <th>
          Oct
        </th>
        <th>
          Nov
        </th>
        <th>
          Dic
        </th>
        <th>
          Ene
        </th>
        <th>
          Feb
        </th>
        <th>
          Mar
        </th>
      </thead>
      <tbody>
        @foreach( $apartments as $apartment )
        <tr>
          <td>
            {{ $apartment->name }}
          </td>
          @foreach( range(1,7) as $index )
          <td>
            @php
              $mes = Carbon\Carbon::parse('2021-08-01')->addMonths($index)->format('Y-m-d')
            @endphp
            @if( array_key_exists( $mes, $apartment->paymentts->toArray() ))
              <div class="green">
                ✔
              </div>
            @else
              <div class="red">
                ✗
              </div>
            @endif
          </td>
          @endforeach
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>