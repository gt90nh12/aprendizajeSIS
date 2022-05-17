<!-- ************** Formulario admin *************** -->
@extends('connect.ad')
@section('titulo_pagina', 'Calificación')
@section('descripcion_pagina', 'Formulario calificación')
<!-- *********************************************** -->

@section('archivos_style_form')
<link href="{{ ('assets/plugins/css-chart/css-chart.css') }}" rel="stylesheet">
<link href="{{ ('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">
<style>
	.imagenEstudiante{
		padding: 0px;
		border: 0px;
		margin: 0px;
	}
	.datos_estudiante{
		background: #fff;
	}
</style>
@stop

@section('content')
<div class="row">
	<div class="col-12 center">
		<div class="card">
		<div class="imagenEstudiante">
			<img class="img-lista img-responsive" src="http://localhost/aprendizaje/public/img/perfil_usuario/{{ $estudianterudeimagen }}">
			<div class="datos_estudiante">
				<h4 class="card-title">{{$nombreEstudiante}}</h4>
				<p class="card-text">{{$anioEscolaridadEstudiante}}</p>
			</div>
		</div>
			<hr class="division-juego-descripcion">			
			<ul class="timeline" id="juegotimeline">

			</ul>
		</div>
	</div>
</div>
@stop

@section('archivos_script_form')
<script>
	var historialEstudiante = <?php echo($historialEstudiante); ?>;	
	for(let i=0; i< historialEstudiante.length; i++){
		let historial = historialEstudiante[i];	
		console.log(historial.imagen);
		var nodoEstudiante = '<li><div class="timeline-badge danger"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/'+ historial.imagen +'"> </div><div class="timeline-panel"><div class="timeline-heading"><h3 class="timeline-title">'+ historial.NombrePruebaTecnica +'</h3><h5 class="timeline-title">'+ historial.titulo +'</h5><p><small class="text-muted"><i class="far fa-clock"></i>'+ historial.fecha +'</p></div><div class="timeline-body"><p>'+ historial.descripcion +'</p></div></div></li>';
		document.getElementById("juegotimeline").innerHTML+=nodoEstudiante;
	}
</script>
@stop
