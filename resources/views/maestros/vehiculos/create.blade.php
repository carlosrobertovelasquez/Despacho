
@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-16 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Vehiculos</div>
                    <div class="panel-body">
                    {!! Form::open(['route'=> 'vehiculos.store','method'=>'POST']) !!}
                    
                    <div class="form-group">
                     {!! Form::label('placa','Placa') !!} 

                     {!! Form::text('placa',null,['class'=>'form-control','placeholder'=>'Placa Requerida','required']) !!}   
                    </div>
                    
                    <div class="form-group">
                     {!! Form::label('modelo','Modelo') !!} 
                     {!! Form::text('modelo',null,['class'=>'form-control','placeholder'=>'Modelo Requerida','required']) !!}   
                    </div>

                    <div class="form-group">
                     {!! Form::label('estado','Estado') !!} 
                     {!! Form::select('estado',[''=>'Seleciones un Estado','A'=>'Activo','I'=>'Inactivo'],null,['class'=>'form-control']) !!}
                     
                    </div>

                    <div class="form-group">
                     {!! Form::label('kinicial','Kilometraje Inicial') !!} 
                     {!! Form::text('kinicial',null,['class'=>'form-control','placeholder'=>'Kilometraje Requerido','required']) !!}   
                    </div>

                    <div class="form-group">
                     {!! Form::label('kfinal','Kilometraje Final') !!} 
                     {!! Form::text('kfinal',null,['class'=>'form-control','placeholder'=>'Kilometraje Requerido','required']) !!}   
                    </div>

                    <div class="form-group">
                     {!! Form::label('ano','Año') !!} 
                     {!! Form::text('ano',null,['class'=>'form-control','placeholder'=>'Año Requerido','required']) !!}   
                    </div>

                    <div class="form-group">
                     {!! Form::label('propio','Propio') !!} 
                     {!! Form::text('propio',null,['class'=>'form-control','placeholder'=>'Propio Requerido','required']) !!}   
                    </div>
                    
                    <div class="form-group">
                     {!! Form::label('combustible','Combustible') !!} 
                     {!! Form::select('combustible',[''=>'Seleciones Tipo Combustible','D'=>'Diesel','G'=>'Gasolina'],null,['class'=>'form-control']) !!}
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