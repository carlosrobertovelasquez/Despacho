<html>
<head>
    
    <title>Ticket</title>
    <style type="text/css">
        @page{
            size:a4 portrait;
             margin: 32px 36px;
              }
        table {
            margin: 0 auto;
            padding: 15px;
            border: 1px solid;
            font-size: 10px;
            width: 100%;
        }
    body{
        margin: 0px 0px 0px 0px;
        padding: 0px 0px 0px 0px;
              border-bottom: 0px;
        border-top-width: 0px;
        border-top-width: 0px;
    }
   
    </style>

</head>
<body>
@foreach($EncabezadoTicket as $EncabezadoTicket)
<h1   align="center" >   DROGUERIA UNIVERSAL S.A. de C.V.  </h1>
<p  align="center" > Numero de Ticket : {{$EncabezadoTicket->ticket}}  </p>
<p  align="center" > Preparador :{{$EncabezadoTicket->preparador}}    Estado :{{$EncabezadoTicket->estado}} </p>
<p   align="left">Cliente:({{$EncabezadoTicket->cliente}})-{{$EncabezadoTicket->nombre}}  </p>
<p  align="left">Vendedor :{{$EncabezadoTicket->nombre_vendedor}}</p>
<p  align="left">Direcion :{{$EncabezadoTicket->direccion}}</p>
<p align="left">Notas : {{$EncabezadoTicket->nota}}</p>
@endforeach
<div >
<table  >
    <thead>
    <tr>
    <th>Pedido</th>
    <th>Articulo</th>
    <th>Descripcion</th>
    <th>Cantidad</th>
    <th>Lote</th>
    <th>Vence</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pedidosSoftLinea as  $pedidosSoftLinea)
        <tr>
            <td>{{ $pedidosSoftLinea->PEDIDO}}</td>
            <td>{{$pedidosSoftLinea->ARTICULO}}</td>
            <td>{{$pedidosSoftLinea->DESCRIPCION}}</td>
            <td>{{number_format($pedidosSoftLinea->CANTIDAD,2)}}</td>
            <td>{{$pedidosSoftLinea->LOTE}}</td>
            <td>{{ $pedidosSoftLinea->FECHA_VENCIMIENTO}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<table  >
    <tr>
        <td   align="left">Preparador : </td>
        <td  align="left">Revisa: </td>
        <td  align="left">Fecha :   </td>
    </tr>

</table>
</div>
</body>
<footer>
</footer>
</html>




