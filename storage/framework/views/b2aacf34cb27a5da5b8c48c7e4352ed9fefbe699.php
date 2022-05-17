<?php $__env->startSection('content'); ?>
<!-- <div class="col-lg-4 col-md-12"> -->
	<div class="card">
		<div class="card-body">
			<div class="d-flex flex-row">
				<!-- <div class=""><img src="../assets/images/users/1.jpg" alt="user" class="img-circle" width="100"></div> -->
				<div class="pl-3">
					<h3 class="font-medium"><?php echo e($nombreUE, false); ?></h3>
					<h6>Unidad Educativa</h6>
					<!-- <button class="btn btn-success"><i class="ti-plus"></i> Follow</button> -->
				</div>
			</div>
			<div class="text-center">
				<img  src="http://localhost/aprendizaje/public/img/roles_usuario/<?php echo e($imagenUE, false); ?>">
			</div>	
			<div class="row mt-5">
				<div class="col border-right">
					<h2 class="font-light"><i class="fas fa-map-marker-alt"></i> Dirección</h2>
					<h6><?php echo e($direccionUE, false); ?></h6></div>
					<div class="col border-right">
						<h2 class="font-light"><i class="fas fa-phone"></i> Teléfono</h2>
						<h6><?php echo e($telefonoUE, false); ?> - <?php echo e($celularUE, false); ?></h6></div>
						<div class="col">
							<h2 class="font-light"><i class="fas fa-stopwatch"></i> Horarios</h2>
							<h6>Lunes a Viernes <?php echo e($HorarioUEViernes, false); ?></h6>
							<h6>Sabado <?php echo e($HorarioUESabado, false); ?></h6>
						</div>
						</div>
					</div>
					<div>
						<hr>
					</div>
					<!-- <div class="card-body" style="overflow: visible;">
						<div class="slimScrollDiv" style="position: relative; overflow: visible hidden; width: auto; height: 80px;"><p class="text-center aboutscroll" style="overflow: hidden; width: auto; height: 80px;">
							Lorem ipsum dolor sit ametetur adipisicing elit, sed do eiusmod tempor incididunt adipisicing elit, sed do eiusmod tempor incididunLorem ipsum dolor sit ametetur adipisicing elit, sed do eiusmod tempor incididuntt
						</p><div class="slimScrollBar" style="background: rgb(220, 220, 220) none repeat scroll 0% 0%; width: 5px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 53.3333px;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; right: 1px;"></div></div>
						<ul class="list-icons d-flex flex-item text-center pt-2">
							<li class="col"><a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Website"><i class="fa fa-globe font-20"></i></a></li>
							<li class="col"><a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="twitter"><i class="fab fa-twitter font-20"></i></a></li>
							<li class="col"><a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fab fa-facebook-square font-20"></i></a></li>
							<li class="col"><a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Youtube"><i class="fab fa-youtube font-20"></i></a></li>
							<li class="col"><a href="javascript:void(0)" data-toggle="tooltip" title="" data-original-title="Linkd-in"><i class="fab fa-linkedin font-20"></i></a></li>
						</ul>
					</div> -->
				</div>
				<!-- </div> -->

				<?php $__env->stopSection(); ?>

				<?php $__env->startSection('archivos_script_form'); ?>
				<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect\director', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/perfil_director/unidad_educativa.blade.php ENDPATH**/ ?>