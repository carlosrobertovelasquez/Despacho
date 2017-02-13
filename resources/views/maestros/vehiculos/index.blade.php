@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('main-content')

 <div class="container spark-screen">
        <div class="row">
            <div class="col-md-16 ">
                <div class="panel panel-default">
                    <div class="panel-heading"> <a href="{{ route('vehiculos.create') }}" class="btn btn-info">Registar Nuevo Vehiculo</a>
                    @include('flash::message')
                 </div>
                   
                <div class="panel-body">

			 <table class="table table-striped">
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
				 		@foreach($vehiculos as $vehi)
				 		<tr>
				 			<td>{{ $vehi->placa }}</td>
				 			<td>{{ $vehi->modelo }}</td>
				 			<td>{{ $vehi->estado }}</td>
				 			<td>{{ $vehi->kinicial }}</td>
				 			<td>{{ $vehi->kfinal }}</td>
				 			<td>{{ $vehi->ano }}</td>
				 			<td>{{ $vehi->propio }}</td>
				 			<td>{{ $vehi->combustible }}</td>
				 			<td>
							 <a href="{{route('vehiculos.edit',$vehi->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
							 <a href="{{route('vehiculos.destroy',$vehi->id)}}" 
							         onclick="return confirm('Seguro que desea Eliminar')" 
									 class="btn btn-warning"> 
									 <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
						      </a>
							</td>

				 		</tr>
				 		@endforeach
				 	</tbody>
			</table>
            <div class="text-center">
			{!! $vehiculos->render() !!}
			</div>	 
	

@endsection