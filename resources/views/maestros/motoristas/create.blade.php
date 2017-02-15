@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection


@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear Motorista</div>
                    <div class="panel-body">
                    {!! Form::open(['route'=> 'motoristas.store','method'=>'POST']) !!}
                    
                    <div class="form-group">
                     {!! Form::label('dui','DUI') !!} 
                     {!! Form::text('dui',null,['class'=>'form-control','placeholder'=>'DUI Requerida','required']) !!}   
                    </div>
                    
                    <div class="form-group">
                     {!! Form::label('Nombre','Nombre') !!} 
                     {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre Requerido','required']) !!}   
                    </div>

                    <div class="form-group">
                     {!! Form::label('licencia','No.Licencia') !!} 
                     {!! Form::text('licencia',null,['class'=>'form-control','placeholder'=>'LIcencia Requerida','required']) !!}   
                    </div>
                   
                    <div class="form-group">
                     {!! Form::label('tipo_lic','Tipo Licencia') !!} 
                     {!! Form::select('tipo_lic',[''=>'Seleciones un Tipo','L'=>'Liviana','P'=>'Pesada'],null,['class'=>'form-control']) !!}
                     
                    </div>
                                          
                    <div class="form-group">
                     {!! Form::label('estado','Estado') !!} 
                     {!! Form::select('estado',[''=>'Seleciones ','A'=>'Activo','I'=>'Inactivo','S'=>'Vacaciones',],null,['class'=>'form-control']) !!}
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