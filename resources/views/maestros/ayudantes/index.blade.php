@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('main-content')

 <div class="container spark-screen">
        <div class="row">
            <div class="col-md-11 ">
                <div class="panel panel-default">
                    <div class="panel-heading"> <a href="{{ route('ayudantes.create') }}" class="btn btn-info">Registar Nuevo Preparador</a>
                    @include('flash::message')
                 </div>
                   
                <div class="table table-striped">

			 <table class="table table table-striped">
 					<thead>
 						<th>DUI</th>
 						<th>Cod.Empleado</th>
 						<th>Nombre</th>
				 		<th>Estado</th>
				 		
				 	</thead>
				 	<tbody>
					 @foreach($preparadores as $preparadores)
				 		<tr>
				 			<td>{{ $preparadores->dui }}</td>
				 			<td>{{ $preparadores->cod_empleado }}</td>
							 <td>{{strtoupper($preparadores->nombre)}}</td>
							 <td>{{ $preparadores->estado }}</td>
				 			<td>
							 <a href="{{route('ayudantes.edit',$preparadores->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
							 <a href="{{route('ayudantes.destroy',$preparadores->id)}}" 
							         onclick="return confirm('Seguro que desea Eliminar')" 
									 class="btn btn-warning"> 
									 <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
						      </a>
							</td>

				 		</tr>
				 		@endforeach
				 	</tbody>
				 	</tbody>
			</table>
            <div class="text-center">
			</div>	 
	

@endsection