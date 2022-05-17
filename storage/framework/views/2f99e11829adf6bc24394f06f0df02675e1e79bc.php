<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Calificación'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario calificación'); ?>
<!-- *********************************************** -->

<?php $__env->startSection('archivos_style_form'); ?>
<link href="<?php echo e(('assets/plugins/css-chart/css-chart.css'), false); ?>" rel="stylesheet">
<link href="<?php echo e(('assets/plugins/Magnific-Popup-master/dist/magnific-popup.css'), false); ?>" rel="stylesheet">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-12 center">
		<div class="card">
		<div class="imagenEstudiante">
			<img class="img-lista img-responsive" src="http://localhost/aprendizaje/public/img/perfil_usuario/<?php echo e($estudianterudeimagen, false); ?>">
			<div class="datos_estudiante">
				<h4 class="card-title"><?php echo e($nombreEstudiante, false); ?></h4>
				<p class="card-text"><?php echo e($anioEscolaridadEstudiante, false); ?></p>
			</div>
		</div>
			<hr class="division-juego-descripcion">			
			<ul class="timeline" id="juegotimeline">

			</ul>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('archivos_script_form'); ?>
<script>
	var historialEstudiante = <?php echo($historialEstudiante); ?>;	
	for(let i=0; i< historialEstudiante.length; i++){
		let historial = historialEstudiante[i];	
		console.log(historial.imagen);
		var nodoEstudiante = '<li><div class="timeline-badge danger"><img class="img-responsive" alt="user" src="http://localhost/aprendizaje/public/assets/imagenesSIS/'+ historial.imagen +'"> </div><div class="timeline-panel"><div class="timeline-heading"><h3 class="timeline-title">'+ historial.NombrePruebaTecnica +'</h3><h5 class="timeline-title">'+ historial.titulo +'</h5><p><small class="text-muted"><i class="far fa-clock"></i>'+ historial.fecha +'</p></div><div class="timeline-body"><p>'+ historial.descripcion +'</p></div></div></li>';
		document.getElementById("juegotimeline").innerHTML+=nodoEstudiante;
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect.ad', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/alumno/historial.blade.php ENDPATH**/ ?>