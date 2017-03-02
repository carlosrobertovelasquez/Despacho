@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')
<div class="container spark-screen">
<div class="row">
<div class="col-md-11 ">




{!! Form::open(array('action' => 'CartController@GuardarTicket')) !!}


<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Selecione Preparador : </h3>
  </div>
  <div class="panel-body">

        <select name="preparador" id="preparador" class="form-control">
              @foreach($ayudantes as $ayudante)
                   <option value="{!!$ayudante->id!!}">{!!$ayudante->id!!}-{!!$ayudante->dui!!}-{!!strtoupper($ayudante->nombre)!!}</option>

               @endforeach
         </select>
       
     </div>
</div    

<div class="panel panel-default">      
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Pedido Que Estan En Canasta</h3>
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
                            @foreach($cart as $pedi)
                                <tr>

                                    <td>{{ $pedi->pedidos }}</td>
                                    <td>{{ $pedi->fecha_hora_pedido }}</td>
                                    <td>{{ $pedi->Cliente }}</td>
                                    <td>{{ $pedi->Nombre_Cliente }}</td>
                                    <td>{{ $pedi->Direccion_Cliente }}</td>
                                    <td>{{ $pedi->Total_a_Facturar }}</td>
                                  </tr>
                            @endforeach
                            </tbody>
         </table>
      
   
  </div>
  </div>    
 </div> 

       
     
      <p>
       {!! Form::submit('Generar Ticket', ['class'=>'btn btn-primary btn-lg active'] )  !!}
      <a href="{{ route('Canasta.show') }}" class="btn btn-primary btn-lg active" role="button">Regresar a Canasta </a>
      </P>
{!! Form::close() !!}         
    

</div>
</div>
</div>
@endsection