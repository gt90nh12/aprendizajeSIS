<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'HistorialAlumno'); ?>
<?php $__env->startSection('descripcion_pagina', 'Tecnica de la cadena'); ?>
<!-- *********************************************** -->

<?php $__env->startSection('archivos_style_form'); ?>
<link href="<?php echo e(('assets/plugins/css-chart/css-chart.css'), false); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">	
				
				<hr class="division-juego-descripcion">			
				<ul class="timeline" id="juegotimeline">
					
				</ul>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('archivos_script_form'); ?>
<script>
	// var timelinehistorial = document.getElementById('juegotimeline');
	var historialEstudiante = <?php echo($historialEstudiante); ?>;	
	console.log(historialEstudiante);
	for(let i=0; i< historialEstudiante.length; i++){
		let historial = historialEstudiante[i];
		console.log(historial.puntaje);
		if(i % 2 == 0) {
			if(historial.puntaje>90){
				var nodoEstudiante = '<li><div class="timeline-badge warning"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/trofeo.svg"></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">'+ historial.titulo +'</h4></div><div class="timeline-body"><p><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/'+ historial.nivel +'"></p><p>'+ historial.descripcion+'</p></div></div></li>';
				document.getElementById("juegotimeline").innerHTML+=nodoEstudiante;
			}else{
				var nodoEstudiante = '<li><div class="timeline-badge danger"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/'+ historial.imagen +'"> </div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">'+ historial.titulo +'</h4><p><small class="text-muted"><i class="far fa-clock"></i>'+ historial.fecha +'</p></div><div class="timeline-body"><p>'+ historial.descripcion +'</p></div></div></li>';
				document.getElementById("juegotimeline").innerHTML+=nodoEstudiante;
			// timelinehistorial.innerHTML=nodoEstudiante;
		}
	}else{
		if(historial.puntaje>90){
			var nodoEstudiante = '<li class="timeline-inverted"><div class="timeline-badge warning"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/trofeo.svg"></div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">'+ historial.titulo +'</h4></div><div class="timeline-body"><p><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/'+ historial.nivel +'"></p><p>'+ historial.descripcion+'</p></div></div></li>';
			document.getElementById("juegotimeline").innerHTML+=nodoEstudiante;
		}else{
			var nodoEstudiante = '<li class="timeline-inverted"><div class="timeline-badge danger"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/'+ historial.imagen +'"> </div><div class="timeline-panel"><div class="timeline-heading"><h4 class="timeline-title">'+ historial.titulo +'</h4><p><small class="text-muted"><i class="far fa-clock"></i>'+ historial.fecha +'</p></div><div class="timeline-body"><p>'+ historial.descripcion +'</p></div></div></li>';
			document.getElementById("juegotimeline").innerHTML+=nodoEstudiante;
			// timelinehistorial.innerHTML=nodoEstudiante;
		}
	}

}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect.alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/alumno/historial.blade.php ENDPATH**/ ?>