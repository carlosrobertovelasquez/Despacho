@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')
     

     @if(count($errors)>0)
       <div class="alert alert-danger" role="alert"> 
       <ul>
       @foreach($errors->all() as $error)
         <li>{{$error}}</li>
       @endforeach
       </ul>
       </div>   
    @endif
     


    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Preparadores</div>
                    <div class="panel-body">
                    {!! Form::open(['route'=> 'ayudantes.store','method'=>'POST']) !!}
                    
                    <div class="form-group">
                     {!! Form::label('dui','DUI') !!} 

                     {!! Form::text('dui',null,['class'=>'form-control','placeholder'=>'Dui Requerido','required']) !!}   
                    </div>
                    
                    <div class="form-group">
                     {!! Form::label('cod_empleado','Cod.Empleado') !!} 
                     {!! Form::text('cod_empleado',null,['class'=>'form-control','placeholder'=>'Codigo Requerido','required']) !!}   
                    </div>

                    <div class="form-group">
                     {!! Form::label('nombre','Nombre Completo') !!} 
                     {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre Completo','required']) !!}   
                    </div>              
                    <div class="form-group">
                     {!! Form::label('estado','Estado') !!} 
                     {!! Form::select('estado',[''=>'Seleciones un Estado','A'=>'Activo','I'=>'Inactivo'],null,['class'=>'form-control']) !!}
                     
                    </div>
                    
                     <div class="form-group">
                         {!! form::submit('Registar',['class'=>'btn btn-primary']) !!}
                     </div>
                    {!! Form::close() !!}


                    </div>
                     
                </div>
            </div>
        </div>
    </div>
@endsection