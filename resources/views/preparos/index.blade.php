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
  <h3 class="panel-title"><a> Ticket # </a>{{$ticket->ticket}}-<a> Preparador > </a>{{$ticket->preparador}}
  <a> Fecha Creacion > </a>{{$ticket->fecha_inicio}}</h3>
  
  </div>
  <div class="panel-body">
         @while($ticket_d_p->ticket=$ticket->ticket)
         <p>aqui</p>
         @endwhile
  </div>
@endforeach  
</div>








@endsection