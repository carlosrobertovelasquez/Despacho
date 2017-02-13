@extends('layouts.app')

@section('htmlheader_title')
	Inicio
@endsection


@section('main-content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-16 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Motorista</div>

					<div class="panel-body">
						{{ trans('adminlte_lang::message.logged') }}
						<p>hola mundo</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
