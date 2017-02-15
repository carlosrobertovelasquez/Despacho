@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('main-content')

 <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">
                <div class="panel panel-default">
                    <div class="panel-heading"> <a href="{{ route('motoristas.create') }}" class="btn btn-info">Registar Nuevo Motorista</a>
                    @include('flash::message')
                 </div>
                   
                <div class="table table-striped">

			 <table class="table table table-striped">
 					<thead>
 						<th>DUI</th>
 						<th>Nombre</th>
 						<th>Licencia</th>
				 		<th>Tipo</th>
				 		<th>Estado</th>
				 	</thead>
				 	<tbody>
					 @foreach($motorista as $moto)
				 		<tr>
				 			<td>{{ $moto->dui }}</td>
				 			<td>{{ $moto->nombre }}</td>
				 			<td>{{ $moto->licencia }}</td>
				 			<td>{{ $moto->tipo_lic }}</td>
				 			<td>{{ $moto->estado }}</td>
				 			<td>
							 <a href="{{route('vehiculos.edit',$moto->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
							 <a href="{{route('vehiculos.destroy',$moto->id)}}" 
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
			</div>	 
	

@endsection