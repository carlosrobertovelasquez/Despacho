<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
    <style type="text/css">
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
<h4  style="margin: 0px 0px 0px 0px"  align="center" >   DROGUERIA UNIVERSAL S.A. de C.V.  </h4>
<p style="margin:1% 0;" class="panel-title" align="center" > Numero de Ticket : {{$EncabezadoTicket->ticket}}  </p>
<p style="margin:1% 0;" class="panel-title" align="center" > Preparador :{{$EncabezadoTicket->preparador}}    Estado :{{$EncabezadoTicket->estado}} </p>
<p style="margin:-2.5% 0;"  align="left">Cliente:({{$EncabezadoTicket->cliente}})-{{$EncabezadoTicket->nombre}}  </p>
<p  style="margin:1% 0;" align="left">Vendedor :{{$EncabezadoTicket->nombre_vendedor}}</p>
<p  style="margin:1% 0;" align="left">Direcion :{{$EncabezadoTicket->direccion}}</p>
<p  style="margin:2% 0;" align="left">Notas : {{$EncabezadoTicket->nota}}</p>
@endforeach
<div class="panel-body">
<table style="margin: 1%" >

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
<table  style="font-size:10px ; border:0px  0px 0px 0px ;margin: 0px 0px 0px 0px ; padding: 12px 12px 12px 12px;">
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




