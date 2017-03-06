@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')

    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">


                <div class="table table-striped">
                    <table class="table table-bordered" style="font-size:10px">
                        <thead>

                        <th>Ticket</th>
                        <th>Pedido</th>
                        <th>Estado</th>
                        <th>Cliente</th>
                        <th>Nombre</th>
                        <th>Preparador</th>
                        </thead>
                        <tbody>
                        @foreach($ticket as $ticket)
                            <tr>

                                <td>{{ $ticket->ticket }}</td>
                                <td>{{ $ticket->pedido }}</td>
                                <td>{{ $ticket->estado }}</td>
                                <td>{{ $ticket->cliente }}</td>
                                <td>{{ $ticket->nombre}}</td>
                                <td>{{ $ticket->preparador }}</td>
                                <td>
                                    <a href="{{route('preparos.pdf',$ticket->ticket)}}" class="btn btn-danger"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>

                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection