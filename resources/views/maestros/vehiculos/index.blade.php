@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('main-content')

 <div class="container spark-screen">
        <div class="row">
            <div class="col-md-16 col-md-offset-1">
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
				 		<th>Combustible</th>
				 		<th>Usuario Creacion</th>
				 		<th>Fecha Creacion</th>
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
				 			<td>{{ $vehi->create_user }}</td>
				 			<td>{{ $vehi->created_at }}</td>
				 			<td><a href="" class="btn btn-danger"></a> <a href="" class="btn btn-warning"></a></td>

				 		</tr>
				 		@endforeach
				 	</tbody>
			</table>
			{!! $vehiculos->render() !!}
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>


@endsection