@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">
            
         @if(count($cart))
                <div class="panel panel-default">
       
                    <div class="panel-heading"> 
                    <a href="{{ route('Canasta.detalle') }}" class="btn btn-info">Generar Ticket <span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>               
                    <a href="{{route('Canasta.trash')}}" class="btn btn-danger"> Vaciar Canasta <i class="fa fa-trash"></i>   </a>
                    

                    </div>

                  

                    <div class="table table-striped">
                          <table class="table table-bordered" style="font-size:10px">
                            <thead>

                            <th>Pedido</th>
                            <th>Fecha_Pedido</th>
                            <th>Cliente</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            </thead>
                            <tbody>
                            @foreach($cart as $pedi)
                                <tr>

                                    <td>{{ $pedi->pedidos }}</td>
                                    <td>{{ $pedi->fecha_hora_pedido }}</td>
                                    <td>{{ $pedi->Cliente }}</td>
                                    <td>{{ $pedi->Nombre_Cliente }}</td>
                                    <td>{{ $pedi->Direccion_Cliente }}</td>
                                    <td>
                                        <a href="{{route('pedidos.show',$pedi->pedidos)}}" class="btn btn-warning"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                        <a href="{{route('Canasta.delete',$pedi->pedidos)}}"
                                           onclick="return confirm('Seguro que desea Eliminar')"
                                           class="btn btn-danger">
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                      


                  



                   
                        @else
                        <h3><span class="label label warning" style="color:#369;" > No hay Pedidos En la Canasta </span> </h3>
                        @endif

                        <div class="text-center">
                            <p>
                                <a href="{{ route('pedidos.index') }}" class="btn btn-primary btn-lg active" role="button">Regresar</a>
                         
                            </p>

                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection