@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('main-content')

  



    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
     <form class="navbar-form" role="search">            
                    <div>
                     <a href="{{ route('Canasta.show') }}" class="btn btn-info">
                     <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> 
                      Ver Canasta => {{count(\Session::get('cart'))}} </a>

                                     


                
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nombre Cliente" name="q">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>






                     </div>
                    
                     <!--Buscar de Tagas-->
                    
                



                        @include('flash::message')
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
                            @foreach($pedidos as $pedi)
                                <tr>

                                    <td>{{ $pedi->pedidos }}</td>
                                    <td>{{ $pedi->fecha_hora_pedido }}</td>
                                    <td>{{ $pedi->Cliente }}</td>
                                    <td>{{ $pedi->Nombre_Cliente }}</td>
                                    <td>{{ $pedi->Direccion_Cliente }}</td>
                                   <td>
                                        <a href="{{route('pedidos.show',$pedi->pedidos)}}" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                        <a href="{{route('Canasta.add',$pedi->pedidos)}}"
                                           onclick="return confirm('Seguro que desea Agregar a la Canasta')"
                                           class="btn btn-warning">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                            {!! $pedidos->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>















@endsection