<html>
<head>
    
    <title>Ticket</title>
    <style type="text/css">
        @page{
            size:a4 portrait;
            margin: 32px 36px;
            font-size: 30px;
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

<h4 align="center" >   DROGUERIA UNIVERSAL S.A. de C.V.  </h4>
<h4 align="center" >   ALAMEDA ROOSELVELT # 2736   TELEFONO : 0614-011191-104-0</h4>
<h4 align="center" >   REGISTRO :29104-8   NIT : 0614-011191-104-0</h4>
<h4 align="center" >   GIRO : VENTAS DE PRODUCTOS FARMACEUTICOS Y MEDICINALES</h4>

<h2 align="left" >   CLIENTE :{{$EncabezadoTicket->cliente}} --------> BULTOS :{{$EncabezadoTicket->vultos}}/{{$EncabezadoTicket->vultos}} </h2>
<h2 align="left" >   {{$EncabezadoTicket->nombre}}</h2>
<h2 align="left" >   {{$EncabezadoTicket->direccion}}</h2>
<p  align="left" > PEDIDO:{{$EncabezadoTicket->pedido}}     FECHA :{{$EncabezadoTicket->fecha}} </p>

@endforeach

</body>
<footer>
</footer>
</html>
