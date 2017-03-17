@extends('layouts.app')

@section('htmlheader_title')
  
@endsection

@section('contentheader')
    @yield('contentheader_title', 'hola mundo')
    
@endsection


@section('main-content')


 <div class="container spark-screen">
        <div class="row">
           <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Impresion de Viñeta</div>
                    <div class="panel-body">
                    @foreach($vineta as $vineta)
                    {!! Form::open(['route'=> ['preparos.impresionvineta',$vineta->ticket], 'method'=>'GET']) !!}
                      

                    <div class="form-group">
                     {!!  Form::label('cliente','Cliente:') !!} 
                     {!!  Form::label('cliente',$vineta->cliente) !!} 
                     </div> 
                     <div class="form-group">
                      {!! Form::label('cliente',$vineta->nombre) !!} 
                      </div> 
                      <div class="form-group">
                     {!! Form::label('cliente',$vineta->direccion) !!} 
                      </div> 
                      <div class="form-group">
                        {!! Form::label('dui','PEDIDO') !!} 
                     {!! Form::label('cliente',$vineta->pedido) !!} 
                     </div> 
                     <div class="form-group">
                       {!! Form::label('dui','BULTOS : ') !!} 
                       {!! Form::number('vultos',$vineta->vultos, ['class'=>'form-control','placeholder'=>'Digitar Vultos','required']) !!}   
                        
                     </div>
                                  
                    
                    
                     <div class="form-group">
                         {!! form::submit('Imprimir',['class'=>'btn btn-primary']) !!}
                         <a href=" {{url('transacciones/preparos')}}" ><span class="btn btn-primary" aria-hidden="true">Regresar</span></a>

                     </div>
                     
                    
                    

                    {!! Form::close() !!}
                   @endforeach

                    </div>
                     
                </div>
            </div>
        </div>
    </div>








@endsection