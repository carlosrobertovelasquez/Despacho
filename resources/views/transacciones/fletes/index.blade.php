@extends('layouts.app')

@section('htmlheader_title')

@endsection

@section('contentheader')
    @yield('contentheader_title', 'hola mundo')

@endsection


@section('main-content')


    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form class="navbar-form" role="search" action="{{route('fletes.index')}}" >
                            <div>
                                <a href="{{ route('flete.show') }}" class="btn btn-info">
                                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                    Agreagr a Flete => {{count(\Session::get('flete'))}} </a>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nombre Cliente" name="q">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                        </form>
                    </div>
                    @include('flash::message')
                </div>
                <div class="table table-striped">
                    <table class="table table-bordered" style="font-size:10px">
                        <thead>

                        <th>Factura</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Total</th>
                        <th>Cond_pago</th>
                        </thead>
                        <tbody>
                        @foreach($factura as $fac)
                            <tr>

                                <td>{{ $fac->FACTURA }}</td>
                                <td>{{Carbon\Carbon::parse($fac->FECHA)->format('d-m-Y') }}</td>
                                <td>{{ $fac->CLIENTE_ORIGEN }}</td>
                                <td>{{ $fac->EMBARCAR_A }}</td>
                                <td>{{ $fac->DIRECCION_FACTURA }}</td>
                                <td>{{ number_format( $fac->TOTAL_FACTURA,2,'.',',') }}</td>
                                <td>{{ $fac->CONDICION_PAGO }}</td>
                                <td>
                                    <a href="{{route('pedidos.show',$fac->FACTURA)}}" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                                    <a href="{{route('flete.add',$fac->FACTURA)}}"
                                       onclick="return confirm('Seguro que desea Agregar al Flete')"
                                       class="btn btn-warning">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    </a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {!! $factura->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>











@endsection