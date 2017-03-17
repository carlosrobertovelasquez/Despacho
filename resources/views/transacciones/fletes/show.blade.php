@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')

    <div class="container spark-screen">
    <div class="row">
    <div class="col-md-11 ">

    @if(count($flete))
        <div class="panel panel-default">

       
        <div class="panel-heading">
          <a href="{{ route('flete.fletedetalle') }}" class="btn btn-info">Generar Flete <span class="glyphicon glyphicon-check" aria-hidden="true"></span></a>

            <a href="{{route('flete.trash')}}" class="btn btn-danger"> Vaciar Canasta <i class="fa fa-trash"></i>   </a>

          <h4 align="center"> Cantidad de Facturas: {{count(\Session::get('flete'))}}</h4>
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
                <th>Selecion</th>
                </thead>
                <tbody>
                @foreach($flete as $pedi)
                <tr>
                <td>{{ $pedi->FACTURA }}</td>
                <td>{{ $pedi->FECHA }}</td>
                <td>{{ $pedi->CLIENTE }}</td>
                <td>{{ $pedi->EMBARCAR_A }}</td>
                <td>{{ $pedi->DIRECCION_FACTURA }}</td>
                <td>{{ number_format( $pedi->TOTAL_FACTURA,2,'.',',') }}</td>
                <td>
                <a href="{{route('flete.show',$pedi->FACTURA)}}" class="btn btn-warning"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
                <a href="{{route('flete.delete',$pedi->FACTURA)}}"
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
     <a href="{{ route('fletes.index') }}" class="btn btn-primary btn-lg active" role="button">Regresar</a>
     </p>
    </div>
    </div>
    </div>
    </div>
    



@endsection