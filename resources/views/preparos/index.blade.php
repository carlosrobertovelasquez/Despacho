@extends('layouts.app')

@section('htmlheader_title')
  
@endsection

@section('contentheader')
    @yield('contentheader_title', 'hola mundo')
    
@endsection


@section('main-content')


<h1> Listado de Ticketsdd<h/>



    <div class="panel panel-info">
        @foreach ($ticket as $ticket)
            <div class="panel-heading">
                <h3 class="panel-title"><a> Ticket # </a>{{$ticket->ticket}}-<a> Preparador > </a>{{$ticket->preparador}}</h3>
            </div>
            <div class="panel-body">

           

            </div>







        @endforeach





    </div>










@endsection