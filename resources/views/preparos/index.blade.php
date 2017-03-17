@extends('layouts.app')

@section('htmlheader_title')
  
@endsection

@section('contentheader')
    @yield('contentheader_title', 'hola mundo')
    
@endsection


@section('main-content')

  
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Ticket</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->



        <section class="content">
            <!-- Small boxes (Stat box) -->

            <div class="row">
                @foreach($ticket as $ticket)
                <div class="col-lg-3 col-xs-6">
                    <!-- small box
                     verde rojo amarillo
                    <div class="small-box bg-green">
                    <div class="small-box bg-red">
                    <div class="small-box bg-yellow">
                    

        Carbon::createFromFormat('Y-m-d H:i:s', $var)->diffForHumans();
        
        -->
                    <div class="small-box bg-green">
                        <div class="pull-right">
                            <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($ticket->fecha_inicio)->diffForHumans()}}
                        </div>
                        <div class="inner">
                            <h1>Ticket :{{$ticket->ticket}}</h1>
                            <h2 class="center-block">Preparador </h2>
                            <p>{{$ticket->preparador}}</p>
                            <p>Cliente:{{$ticket->cliente}}</p>
                            <p>Nombre :{{$ticket->nombre}}</p>
                            <p>Pedido : {{$ticket->pedido}}</p>
                                  

                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <div>
                           
                            <a href="{{route('preparos.pdf',$ticket->ticket)}}" class="btn btn-raised btn-primary"> Imprimir</a>

                            @if($ticket->estado=='01')
                                     <a href="{{route('preparos.update',$ticket->ticket)}}" class="btn btn-raised btn-warning">Ir a Preparar</a>

                            @elseif($ticket->estado=='02')
                                <a href="{{route('preparos.edit',$ticket->ticket)}}" class="btn btn-raised btn-danger">Preparando</a>

                            @elseif($ticket->estado=='03')
                                
                           
                                  <a href="{{route('preparos.revisar',$ticket->ticket)}}" class="btn btn-raised btn-info">Revisar</a>

                            @endif
                           

                        </div>

                    </div>

                </div><!-- ./col -->
                @endforeach
            </div><!-- /.row -->




        </section><!-- /.content -->

@endsection