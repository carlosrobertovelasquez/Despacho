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
                 
        <form class="form-inline">
                          
                  @foreach($ped as $ped)
                  <div class="form-group">
                  <label for="exampleInputName2">Cliente</label>
                  <input type="text" class="form-control" id="exampleInputName2" value={{$ped->PEDIDO }} disabled="true" ">
                 </div>
                                                      
                 <div class="form-group">
                  <label for="exampleInputEmail2">Email</label>
                 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
                </div>
                <button type="submit" class="btn btn-default">Send invitation</button>
           @endforeach
    </form>


        
                
                <br/>
                <div class="panel panel-info">
                <div class="panel-heading">
                <h3 class="panel-title">Detalle Articulo</h3>
                </div>
                <div class="panel-body">
                
                 <div class="table table-striped">
                        <table class="table table-bordered" style="font-size:10px">
                            <thead>

                            <th>Articulo</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Bonificada</th>
                            <th>Lote</th>
                            </thead>
                            <tbody>
                            
                            @foreach($pedlinea as $pedlinea)
                                <tr>

                                    <td>{{ $pedlinea->ARTICULO }}</td>
                                    <td>{{ $pedlinea->DESCRIPCION }}</td>
                                    <td>{{ $pedlinea->CANTIDAD_PEDIDA }}</td>
                                    <td>{{ $pedlinea->CANTIDAD_BONIFICAD }}</td>
                                    <td>{{ $pedlinea->LOTE }}</td>
                                   <td>
                             <a href="" class="btn btn-danger"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                             </a>
                            </td>




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