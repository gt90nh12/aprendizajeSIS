<div class="form-body">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Nombre <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nombre" class="form-control" required
                            data-validation-required-message="El nombre es requerido" value="<?php echo e($persona->nombre, false); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Paterno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_paterno" class="form-control" value="<?php echo e($persona->apellido_paterno, false); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Materno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_materno" class="form-control" value="<?php echo e($persona->apellido_materno, false); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Sexo <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="genero" id="select" class="form-control" required
                            data-validation-required-message="El Sexo es requerido">
                            <option value="">Seleccione Sexo</option>
                            <?php if($persona->sexo == "fememnino"): ?>
                                <option value="varon">Masculino</option>
                                <option value="mujer" selected>Femenino</option>
                            <?php elseif($persona->sexo == "masculino"): ?>
                                <option value="varon"selected>Masculino</option>
                                <option value="mujer">Femenino</option>
                            <?php else: ?>
                                <option value="varon">Masculino</option>
                                <option value="mujer">Femenino</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Cédula de identidad <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="number" name="ci" class="form-control" required
                            data-validation-required-message="La cedula de identidad es requerido" value="<?php echo e($persona->ci, false); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Fecha de nacimiento<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date"  name="fecha_nacimiento" class="form-control" required
                            data-validation-required-message="La fecha de nacimiento es requerido" value="<?php echo e($persona->fecha_nacimiento, false); ?>" max="2003-01-01">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Número de celular</h5>
                    <div class="controls">
                        <input type="number" name="celular" class="form-control" value="<?php echo e($persona->celular, false); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Dirección<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="email"  name="correo_electronico" class="form-control" required
                            data-validation-required-message="El correo electronico es requerido" value="<?php echo e($persona->correo_electronico, false); ?>">
                        <input type="hidden" name="estado" value="<?php echo e($persona->estado, false); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="card-body">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
            <a href="<?php echo e(route('listar_persona'), false); ?>" class="btn btn-dark">Cancelar</a>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\aprendizaje\resources\views/persona/_form_persona.blade.php ENDPATH**/ ?>