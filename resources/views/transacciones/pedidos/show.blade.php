@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')

 <div class="container spark-screen">
        <div class="row">
            {{ csrf_field() }}
            <div class="col-md-11 ">
                <div class="panel panel-default">
                    <div class="panel-heading">Pedidos</div>
                    <div class="panel-body">
      <div class="panel-body">
        <form class="form-horizontal">

                  @foreach($ped as $ped)
                  <div class="form-group">
                  <label for="exampleInputName2">Cliente -> {{$ped->PEDIDO }}   Nombre -> {{$ped->NOMBRE_CLIENTE}}  </label>
                 </div>

                 <div class="form-group">
                  <label for="exampleInputEmail2">Direccion : {{$ped->DIRECCION_FACTURA}} </label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail2">Vendedor : ({{$ped->VENDEDOR}}) {{$ped->NOMBRE}}  </label>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail2">Observaciones : {{$ped->OBSERVACIONES}} </label>
                </div>



           @endforeach
    </form>
         </div>


        
                
                <br/>
                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Detalle Articulo</h3>
                </div>
                <div class="panel-body">
                
                 <div class="table table-striped">


                        <table class="table table-bordered  " style="font-size:12px ;color:black ">
                            <thead>

                            <th>Articulo</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Bonificada</th>
                            <th>Total</th>
                            <th>Lote</th>
                            </thead>
                            <tbody>
                            
                            @foreach($pedlinea as $pedlinea)
                                <tr>

                                    <td>{{  $pedlinea->ARTICULO }}</td>
                                    <td>{{ $pedlinea->DESCRIPCION }}</td>
                                    <td>{{ number_format($pedlinea->CANTIDAD_A_FACTURA,2) }}</td>
                                    <td>{{ number_format($pedlinea->CANTIDAD_BONIFICAD ,2)}}</td>
                                    <td>{{ number_format(($pedlinea->CANTIDAD_BONIFICAD)+($pedlinea->CANTIDAD_A_FACTURA),2)}}</td>
                                    <td>{{ $pedlinea->LOTE }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                       <div class="text-center">
                          <p>
                          <a href="{{ route('pedidos.index') }}" class="btn btn-primary btn-lg active" role="button">Regresar</a>
                          <a href="#" class="btn btn-primary btn-lg active" role="button">Imprimir</a>
                          </p>

                        </div>

                
                </div>
                </div>



       







                


                        

                
                   
                    
                                     


                    </div>
                    
                     
                </div>
            </div>
        </div>
    </div>

@endsection