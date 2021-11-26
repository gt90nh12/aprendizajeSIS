<?php $__env->startSection('title', 'Crear usuario'); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 class="mb-0 text-white">Nuevo registro</h4>
                            </div>
                            <form action="#" novalidate>
                                <!-- <div class="card-body">
                                    <h4 class="card-title">Person Info</h4>
                                </div>
                                <hr> -->
                                <div class="form-body">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Nombre</label>
                                                    <input type="text" id="firstName" class="form-control" required data-validation-required-message="This field is required">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Apellido paterno</label>
                                                    <input type="text" id="lastName" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Apellido materno</label>
                                                    <input type="text" id="lastName" class="form-control">
                                                </div>
                                            </div>  
                                            <div class="col-md-6">
                                                <div class="form-group has-success">
                                                    <label class="control-label">Genero</label>
                                                    <select class="form-control custom-select">
                                                        <option value="">Masculino</option>
                                                        <option value="">Femenino</option>
                                                    </select>
                                                    <small class="form-control-feedback"> Select your gender </small> </div>
                                            </div>  
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Carnet de Identidad</label>
                                                    <input type="number" id="ci" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Fecha de nacimiento</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Numero de celular</label>
                                                    <input type="number" id="celular" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Correo electronico</label>
                                                    <input type="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="card-title mt-5">Dirección</h4>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label>Calle</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ciudad</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Estado</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Post Code</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Country</label>
                                                    <select class="form-control custom-select">
                                                        <option>--Select your Country--</option>
                                                        <option>India</option>
                                                        <option>Sri Lanka</option>
                                                        <option>USA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                            <button type="button" class="btn btn-dark">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../connect.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/connect/estudiantes/crear.blade.php ENDPATH**/ ?>