@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-11 ">




{!! Form::open(array('action' => 'FleteController@GuardarFlete')) !!}


<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Selecione Motorista : </h3>
  </div>
  <div class="panel-body">

        <select name="preparador" id="preparador" class="form-control">
              @foreach($ayudantes as $ayudante)
                   <option value="{!!$ayudante->id!!}">{!!$ayudante->id!!}-{!!$ayudante->dui!!}-{!!strtoupper($ayudante->nombre)!!}</option>

               @endforeach
         </select>
       
     </div>
</div>    

<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Selecione Vehiculo/Moto : </h3>
  </div>
  <div class="panel-body">

        <select name="vehiculo" id="vehiculo" class="form-control">
              @foreach($vehiculos as $vehiculo)
                   <option value="{!!$vehiculo->id!!}">{!!$vehiculo->id!!}-Placa-({!!$vehiculo->placa!!})--Marca--({!!strtoupper($vehiculo->modelo)!!})----Kilometraje Final----({!!$vehiculo->kfinal!!})</option>

               @endforeach
         </select>
         <p>
          <div>
        <label>Kilometraje Salida :</label>
         <input type="number" name="kinicial" required="true">
         </div>
         </p>
     </div>
</div>    

<div class="panel panel-default">      
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Facturas Que Estan En Flete</h3>
  </div>
  <div class="panel-body">
       
     
        <table class="table table-striped table-hover" style="font-size:10px">
                              <thead>
                                <th>Pedido</th>
                                <th>Fecha_Pedido</th>
                                <th>Cliente</th>
                                <th>Nombre</th>
                               <th>Direccion</th>
                               <th>Monto</th>
                            </thead>
                            <tbody>
                            @foreach($flete as $flete)
                                <tr>

                                    <td>{{ $flete->FACTURA }}</td>
                                    <td>{{ $flete->FECHA }}</td>
                                    <td>{{ $flete->CLIENTE }}</td>
                                    <td>{{ $flete->EMBARCAR_A }}</td>
                                    <td>{{ $flete->DIRECCION_FACTURA }}</td>
                                    <td>{{ $flete->TOTAL }}</td>
                                    <td>{{ number_format( $flete->TOTAL_FACTURA,2,'.',',') }}</td>
                                  </tr>
                            @endforeach
                            </tbody>
         </table>
      
   
  </div>
  </div>    
 </div> 

       
     
      <p>
       {!! Form::submit('Generar Flete', ['class'=>'btn btn-primary btn-lg active'] )  !!}
      <a href="{{ route('flete.show') }}" class="btn btn-primary btn-lg active" role="button">Regresar a Canasta </a>
      </P>
{!! Form::close() !!}         
    

</div>
</div>
</div>
@endsection