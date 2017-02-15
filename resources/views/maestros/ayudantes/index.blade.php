@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('main-content')

 <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">
                <div class="panel panel-default">
                    <div class="panel-heading"> <a href="{{ route('vehiculos.create') }}" class="btn btn-info">Registar Nuevo Preparador</a>
                    @include('flash::message')
                 </div>
                   
                <div class="table table-striped">

			 <table class="table table table-striped">
 					<thead>
 						<th>Placa</th>
 						<th>Modelo</th>
 						<th>Estado</th>
				 		<th>KInicial</th>
				 		<th>KFinal</th>
				 		<th>Año</th>
				 		<th>Propio</th>
				 		<th>Comb.</th>
				 		<th>Accion</th>
				 	</thead>
				 	<tbody>
				 	</tbody>
			</table>
            <div class="text-center">
			</div>	 
	

@endsection