<!-- ************** Formulario admin *************** -->
@extends('connect.director')
@section('titulo_pagina', 'Alumno')
@section('descripcion_pagina', 'Progreso en aprendizaje')
<!-- *********************************************** -->

@section('archivos_style_form')
<link href="{{ ('assets/plugins/css-chart/css-chart.css') }}" rel="stylesheet">
<style type="text/css">
	#juegos-y-tecnicas{
		display: flex;
		width:100%;
		height:200px;
		padding:1%;
		overflow:scroll;
		overflow-y: hidden;
		text-align: center;
	}
	.juegos-y-tecnicas-espacio{
		/*border-left: 1px solid #6c757d;	*/
		width: 200px;
	}
	#juego-titulo{
		width: 140px;
	}
	/*------------------------------------ ICONOS ESTILOS APRENDIZAJE ------------------------------------*/
	.icono-aprendizaje-cuadro{
		display: flex;
		border-radius: 50%;
		align-items: center;
		height: 50px;
		width: 50px;
		display: flex;
		justify-content: center;
	}
	.fondo-calculo{
		background: #58D68D;
		border-left: 1px solid #186A3B ;
		border-right: 1px solid #186A3B ;
	}
	.fondo-memoria{
		background:#85C1E9;
		border-left: 1px solid #1B4F72;
		border-right: 1px solid #1B4F72;
	}
	.fondo-concentracion{
		background:#E74C3C;
		border-left: 1px solid #78281F;
		border-right: 1px solid #78281F;
	}
	.icono-aprendizaje-img{
		height: 40px;
		width: 40px;
	}
	/*----------------------------------- FIANLIZA ICONOS APRENDIZAJE ------------------------------------*/
	.icono-aprendizaje-estadistica{
		height: 200px;
	}
	.card-body{
		text-align: center;
	}
	.aliniacion-derecho{
		text-align: left;
	}
	.alinear-descripcion-encuesta{
		/*display: inline-block;
		font-family: futura-pt, 'Helvetica Neue', sans-serif;
		font-size: 0.8em;
		font-weight: 300;
		margin: 1px;
		text-align: center;*/

		display: block;
		text-align: center;
		font-style: oblique;
		/*margin: 20px;
		padding: 50px 0 50px;*/
	}
	.alto-medio{
		transform: rotate(180deg);
		height: 100%;
	}
	/*--------------------------------- ESTILOS DE TECNICAS DE APRENDIZAJE ----------------------------------*/
	.division-juego-descripcion{
		padding: 0px;
		margin: 0px;	
		margin-top: 1rem;
		/*	margin-bottom: 1rem;*/
		border: 0px;
		border-top-color: currentcolor;
		border-top-style: none;
		border-top-width: 0px;
		border-top: 3.5px solid #f2f7f8;
	}
	#navegacion-juegos{
		margin: 0px;
		padding: 0px;
		border: 0px;
		background: #f2f7f8;
		width:280px;
		height:350px;
		overflow:scroll;
		overflow-x: hidden;
	}
	#tarjeta-juegos{
		margin: 0px;
		padding: 0px;
		margin: 0.5em;
		border: 0px;
		width: 250px;
		height: 335px;
		padding-bottom: 15px;
	}
	.tarjeta-general{
		text-align: center;
	}
	#centrar-cuadro{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.imagenProgreso{
		height: 215px;
		width: 215px;
	}
</style>
@stop
@section('content')
<div class="row">
	@if(!empty($alumnos))
	@foreach($alumnos as $alumno)
	<div class="col-md-12 col-lg-4 col-xlg-3">
		<div class="card">
			<div class="card-body">
				<center class="mt-2"> <img class="img-circle img-responsive" src="http://localhost/aprendizaje/public/img/perfil_usuario/{{ $alumno->direccion_imagen}}">
					<h4 class="card-title mt-2">{{$alumno->nombre}} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}</h4>
					<h6 class="card-subtitle">Unidad Educativa San Martin de Porres Don Bosco</h6>
				</center>
			</div>
			<div>
				<hr> 
			</div>
			<div class="card-body"> <small class="text-muted">Año escolaridad </small>
				<h6>{{$alumno->anio_escolaridad}} - {{$alumno->paralelo}}</h6> <small class="text-muted p-t-30 db">RUDE</small>
				<h6>{{$alumno->codigo_rude}}</h6> <small class="text-muted p-t-30 db">Correo electronico</small>
				<h6>{{$alumno->email}}</h6>
			</div>

		</div>
	</div>
	<div class="col-md-12 col-lg-8 col-xlg-9">
		<div class="card">
			<ul class="nav nav-tabs profile-tab" role="tablist">
				<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Test estudiante</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Grafico General</a> </li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="home" role="tabpanel">
					<div class="card-body">
						<img class="icono-aprendizaje-estadistica" src="http://localhost/aprendizaje/public/assets/imagenesSIS/logo.JPEG">
						<ul class="product-review aliniacion-derecho">
							<p class="alinear-descripcion-encuesta">El alumno {{$alumno->nombre}} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}, realizo la prueba general de memoria, concentracion y calculo obteniendo los siguentes resultados.</p>
							<li>
								<span class="text-muted display-5">
									<div class="icono-aprendizaje-cuadro fondo-calculo">
										<img class="icono-aprendizaje-img" src="http://localhost/aprendizaje/public/assets/imagenesSIS/calculo.svg">
									</div>
								</span>
								<div class="dl ml-2">
									<h3 class="card-title">Memoria</h3>
									<h6 class="card-subtitle">{{$TestGeneralMemoria}} Puntaje</h6>
								</div>
								<div class="progress">
									<div class="progress-bar bg-success fondo-calculo" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: {{$TestGeneralMemoria}}%; height:6px;"></div>
								</div>
							</li>
							<li>
								<span class="text-muted display-5"><div class="icono-aprendizaje-cuadro fondo-memoria"><img class="icono-aprendizaje-img" src="http://localhost/aprendizaje/public/assets/imagenesSIS/memoria.svg"></div></span>
								<div class="dl ml-2">
									<h3 class="card-title">Concentración</h3>
									<h6 class="card-subtitle">{{$TestGeneralConcentracion}} puntaje</h6>
								</div>
								<div class="progress">
									<div class="progress-bar bg-info fondo-memoria" role="progressbar" style="width: {{$TestGeneralConcentracion}}%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
							<li>
								<span class="text-muted display-5"><div class="icono-aprendizaje-cuadro fondo-concentracion"><img class="icono-aprendizaje-img" src="http://localhost/aprendizaje/public/assets/imagenesSIS/concentracion.svg"></div></span>
								<div class="dl ml-2">
									<h3 class="card-title">Calculo</h3>
									<h6 class="card-subtitle">{{$TestGeneralCalculo}} puntaje</h6>
								</div>
								<div class="progress">
									<div class="progress-bar bg-danger fondo-concentracion" role="progressbar" style="width: {{$TestGeneralCalculo}}%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-pane" id="settings" role="tabpanel">
					<div class="card-body">
						<canvas id="myChart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endif
</div>
@stop
@section('archivos_script_form')
<script src="{{ ('assets/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
<script src="{{ ('assets/plugins/jquery.easy-pie-chart/easy-pie-chart.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	
	var labels = <?php echo($ejeYCalculo); ?>;
	var datos = <?php echo($ejeXCalculo); ?>;
	var labelsM = <?php echo($ejeYMemoria); ?>;
	var datosM = <?php echo($ejeXMemoria); ?>;
	var labelsC = <?php echo($ejeYConcentracion); ?>;
	var datosC = <?php echo($ejeXConcentracion); ?>;
	// const labelsX = [
	// 'Lunes',
	// 'Martes',
	// 'Miercoles',
	// 'Jueves',
	// 'Viernes',
	// 'Sabado',
	// ];
	const data = {
		labels: labelsM,
		datasets: [{
			label: 'Memoria',
			backgroundColor: 'rgb(255, 99, 132)',
			borderColor: 'rgb(255, 99, 132)',
			data: datosM,
		},
		{
			label: 'Concentracion',
			backgroundColor: 'rgb(22, 85, 232)',
			borderColor: 'rgb(22, 99, 132)',
			data: datosC,
		},
		{
			label: 'Calculo',
			backgroundColor: 'rgb(125, 85, 232)',
			borderColor: 'rgb(125, 80, 222)',
			data: datos,
		},
		]
	};
	const config = {
		type: 'line',
		data,
		options: {}
	};
	var myChart = new Chart(
		document.getElementById('myChart'),
		config
		);
	</script>
	@stop


