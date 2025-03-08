@extends('app')
@section('content')
<div class="container">
<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
       			<div class='panel-heading'>EDITAR PAQUETE</div>
       			<div class='panel-body'>
            		@include('paquetes.partials.FormEditar')
            	</div>
            	<div class="panel-footer"> 
						<a href="{{ URL::to('/paquetes') }}" type="button" class="btn btn-raised btn-info"><i class="material-icons">important_devices</i> PAQUETES</a>
				</div>
				
			</div>
		</div>
	</div>
</div>

@endsection
