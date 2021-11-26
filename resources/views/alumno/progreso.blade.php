<!-- ************** Formulario admin *************** -->
@extends('connect.ad')
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
</style>
@stop

@section('content')
<div class="row">
	<div class="col-md-12 col-lg-4 col-xlg-3">
		<div class="card">
			@if(!empty($alumnos))
			@foreach($alumnos as $alumno)
			<div class="card-body">

				<center class="mt-4"> <img src="http://localhost/aprendizaje/public/img/perfil_usuario/{{ $alumno->direccion_imagen}}">
					<h4 class="card-title mt-2">{{$alumno->nombre}} {{ $alumno->apellido_paterno}} {{ $alumno->apellido_materno}}</h4>
					<h6 class="card-subtitle">Unidad Educativa San Martin de Porres Don Bosco</h6>
					<!-- <div class="row text-center justify-content-md-center">
						<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
						<div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
					</div> -->
				</center>
			</div>
			<div>
				<hr> 
			</div>
			<div class="card-body"> <small class="text-muted">Año escolaridad </small>
				<h6>{{$alumno->anio_escolaridad}} - {{$alumno->paralelo}}</h6> <small class="text-muted p-t-30 db">RUDE</small>
				<h6>{{$alumno->codigo_rude}}</h6> <small class="text-muted p-t-30 db">Correo electronico</small>
				<h6>{{$alumno->email}}</h6>
				<!-- <div class="map-box">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470029.1604841957!2d72.29955005258641!3d23.019996818380896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e848aba5bd449%3A0x4fcedd11614f6516!2sAhmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1493204785508" style="border:0" allowfullscreen="" width="100%" height="150" frameborder="0"></iframe>
				</div>  -->
				<small class="text-muted p-t-30 db">Aprendizaje</small>
				<br>
				<button class="btn btn-circle btn-secondary"><i class="fab fa-facebook"></i></button>
				<button class="btn btn-circle btn-secondary"><i class="fab fa-twitter"></i></button>
				<button class="btn btn-circle btn-secondary"><i class="fab fa-youtube"></i></button>
			</div>
			@endforeach
			@endif
		</div>
	</div>
	<div class="col-md-12 col-lg-8 col-xlg-9">
		<div class="card">
			<ul class="nav nav-tabs profile-tab" role="tablist">
				<li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Test estudiante</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Tecnicas de aprendizaje</a> </li>
				<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Grafico General</a> </li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="home" role="tabpanel">
					<div class="card-body">
						<img class="icono-aprendizaje-estadistica" src="http://localhost/aprendizaje/public/assets/imagenesSIS/logo.JPEG">
						<ul class="product-review aliniacion-derecho">
							<p class="alinear-descripcion-encuesta">El alumno Franki Suares Chambi, realizo la prueba general de memoria, concentracion y calculo obteniendo los siguentes resultados.</p>
							<li>
								<span class="text-muted display-5">
									<div class="icono-aprendizaje-cuadro fondo-calculo">
										<img class="icono-aprendizaje-img" src="http://localhost/aprendizaje/public/assets/imagenesSIS/calculo.svg">
									</div>
								</span>
								<div class="dl ml-2">
									<h3 class="card-title">Calculo</h3>
									<h6 class="card-subtitle">78 Reviews</h6>
								</div>
								<div class="progress">
									<div class="progress-bar bg-success fondo-calculo" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 95%; height:6px;"></div>
								</div>
							</li>
							<li>
								<span class="text-muted display-5"><div class="icono-aprendizaje-cuadro fondo-memoria"><img class="icono-aprendizaje-img" src="http://localhost/aprendizaje/public/assets/imagenesSIS/memoria.svg"></div></span>
								<div class="dl ml-2">
									<h3 class="card-title">Memoria</h3>
									<h6 class="card-subtitle">15 %</h6>
								</div>
								<div class="progress">
									<div class="progress-bar bg-info fondo-memoria" role="progressbar" style="width: 15%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
							<li>
								<span class="text-muted display-5"><div class="icono-aprendizaje-cuadro fondo-concentracion"><img class="icono-aprendizaje-img" src="http://localhost/aprendizaje/public/assets/imagenesSIS/concentracion.svg"></div></span>
								<div class="dl ml-2">
									<h3 class="card-title">Concentración</h3>
									<h6 class="card-subtitle">457 Reviews</h6>
								</div>
								<div class="progress">
									<div class="progress-bar bg-danger fondo-concentracion" role="progressbar" style="width: 35%; height:6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-pane tarjeta-general" id="profile" role="tabpanel">
					<div class="card-body">	
						<div id="centrar-cuadro">
							<div class="row el-element-overlay" id="navegacion-juegos">
								<div class="card" id="tarjeta-juegos">
									<div class="el-card-item">
										<div class="el-card-avatar el-overlay-1"> <img src="#" alt="user">
											<div class="el-overlay">
												<ul class="el-info">
													<li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
													<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="el-card-content">
											<h3 class="box-title">Tecnica de la cadena</h3> <small>Memoria</small>
											<br> 
										</div>
									</div>
								</div>
								<div class="card" id="tarjeta-juegos">
									<div class="el-card-item">
										<div class="el-card-avatar el-overlay-1"> <img src="../assets/images/users/2.jpg" alt="user">
											<div class="el-overlay">
												<ul class="el-info">
													<li><a class="btn default btn-outline image-popup-vertical-fit" href="{{ route('historial_estudiante', $alumno->codigo_rude) }}"><i class="icon-magnifier"></i></a></li>
													<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="el-card-content">
											<h3 class="box-title">Emparejamiento</h3> <small>Calculo</small>
											<br> 
										</div>
									</div>
								</div>
								<div class="card" id="tarjeta-juegos">
									<div class="el-card-item">
										<div class="el-card-avatar el-overlay-1"> <img src="../assets/images/users/3.jpg" alt="user">
											<div class="el-overlay">
												<ul class="el-info">
													<li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
													<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="el-card-content">
											<h3 class="box-title">Video</h3> <small>e</small>
											<br> 
										</div>
									</div>
								</div>
								<div class="card" id="tarjeta-juegos">
									<div class="el-card-item">
										<div class="el-card-avatar el-overlay-1"> <img src="../assets/images/users/4.jpg" alt="user">
											<div class="el-overlay">
												<ul class="el-info">
													<li><a class="btn default btn-outline image-popup-vertical-fit" href="../plugins/images/users/1.jpg"><i class="icon-magnifier"></i></a></li>
													<li><a class="btn default btn-outline" href="javascript:void(0);"><i class="icon-link"></i></a></li>
												</ul>
											</div>
										</div>
										<div class="el-card-content">
											<h3 class="box-title">Genelia Deshmukh</h3> <small>Managing Director</small>
											<br> 
										</div>
									</div>
								</div>
							</div>	
						</div>
						<hr class="division-juego-descripcion">			
						<ul class="timeline">
							<li>
								<div class="timeline-badge danger"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/triste.svg"> </div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Genelia</h4>
										<p><small class="text-muted"><i class="far fa-clock"></i> 11 hours ago via Twitter</small> </p>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</div>
							</li>
							<li class="timeline-inverted">
								<div class="timeline-badge warning">
									<img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/mediobajo.svg"> 
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Ritesh Deshmukh</h4>
									</div>
									<div class="timeline-body">
										<p><img class="img-responsive" alt="user" src="../assets/images/users/3.jpg"></p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge info">
									<img class="img-responsive alto-medio" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/medioalto.svg">
								</div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Lorem ipsum dolor</h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet</p>
									</div>
								</div>
							</li>
							<li class="timeline-inverted">
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Lorem ipsum dolor</h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet.!</p>
									</div>
								</div>
							</li>
							<li>
								<div class="timeline-badge info"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/alto.svg"> </div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Lorem ipsum dolor</h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet.</p>
										<hr>
										<div class="btn-group">
											<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-gear"></i> <span class="caret"></span> </button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">Action</a>
												<a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#">Separated link</a>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="timeline-inverted">
								<div class="timeline-badge success"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/calificacion.svg"></div>
								<div class="timeline-panel">
									<div class="timeline-heading">
										<h4 class="timeline-title">Lorem ipsum dolor</h4>
									</div>
									<div class="timeline-body">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deserunt obcaecati.</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="tab-pane" id="settings" role="tabpanel">
					<div class="card-body">
						<canvas id="myChart"></canvas>
					</div>
					<div id="juegos-y-tecnicas">
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="20%" class="css-bar css-bar-20 "></div>
							<p id="juego-titulo">Emparejamiento</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Tecnica de la cadena</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Juego de la memoria</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Juego de la memoria</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Juego de la memoria</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Juego de la memoria</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Juego de la memoria</p>
						</div>
						<div class="juegos-y-tecnicas-espacio">
							<div data-label="30%" class="css-bar css-bar-30  css-bar-success"></div>
							<p id="juego-titulo">Juego de la memoria</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

@stop

@section('archivos_script_form')
<script src="{{ ('assets/plugins/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js')}}"></script>
<script src="{{ ('assets/plugins/jquery.easy-pie-chart/easy-pie-chart.init.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	
	var labels = <?php echo($ejeY); ?>;
	var datos = <?php echo($ejeX); ?>;
	var labelsM = <?php echo($ejeYM); ?>;
	var datosM = <?php echo($ejeXM); ?>;
	var labelsC0 = <?php echo($ejeYC); ?>;
	var datosC = <?php echo($ejeXC); ?>;
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
