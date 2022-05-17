<?php $__env->startSection('title', 'Iniciar sesión'); ?>
<?php $__env->startSection('content'); ?>
<!-- ============================================================== -->
    <!--  Iniciar sesion -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar"
        style="background-image:url(<?php echo e(('assets/images/background/gravedad.jpeg'), false); ?>);">
        <div class="login-box card">
            <div class="card-body">
            <?php echo Form::open(['url' => '/login_user']); ?>

                    <img src="<?php echo e(('assets/logo/logo_aprendizaje.jpeg'), false); ?>" id="logo_sistema" alt="Home" /></a>

                    <div class="form-group mt-5">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" placeholder="Usuario" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" placeholder="contraseña" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                  
                            <!-- <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i
                                    class="fa fa-lock mr-1"></i> Olvidé mi contraseña</a> </div> -->
                    </div>
                    <div class="form-group text-center mt-3">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Iniciar sesión</button>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <div class="col-sm-12 text-center">
                            <p>¿No tienes una cuenta? <a href="<?php echo e(url('/registro_usuario'), false); ?>"
                                    class="text-primary ml-1"><b>Regístrarse</b></a></p>
                        </div>
                         <!-- Seccino de errrores-->
                        <?php if(Session::has('message')): ?>
                            <div class="container">
                                <div class="alert alert-<?php echo e(Session::get('typealert'), false); ?>" style="display:none;">
                                    <?php echo e(Session::get('message'), false); ?>

                                    <?php if($errors->any()): ?>
                                        <ul>
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error, false); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                    <script>
                                        $('.alert').slideDown();
                                        setTimeout(function(){$('.alert').slideUp(); }, 10000);
                                    </script>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php echo Form::close(); ?>

           
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- Finaliza inicio de sesion -->
    <!-- ============================================================== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('connect.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/connect/login.blade.php ENDPATH**/ ?>