<div class="form-body">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Imagen usuario</h5>
                    <div class="card">
                        <label for="input-file-now">
                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                <i class="fas fa-exclamation"></i>
                            </button>
                            OJO Solo archivos png
                        </label>
                        <input type="file" id="input-file-now" name="direccion_imagen" class="dropify"
                            data-allowed-file-extensions="png" required />
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Perfil usuario</h5>
                    <div class="card">
                        <label for="input-file-now">
                            <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                <i class="fas fa-cog"></i>
                            </button>
                            Debe seleccionar un perfil 
                        </label>
                        <div class="input-group">
                            <ul class="icheck-list">
                                <li>
                                    <input tabindex="7" type="radio" class="check" id="minimal-radio-1"
                                        name="rol" value="2">
                                    <label for="minimal-radio-2">Director</label>
                                </li>
                                <li>
                                    <input tabindex="8" type="radio" class="check" id="minimal-radio-2"
                                        name="rol" value="2" checked>
                                    <label for="minimal-radio-3">Profesor</label>
                                </li>
                                <li>
                                    <input type="radio" class="check" id="minimal-radio-disabled" name="rol" value="4">
                                    <label for="minimal-radio-disabled">Estudiante</label>
                                </li>
<!--                                 <li>
                                    <input type="radio" class="check" id="minimal-radio-disabled-checked" value="5" checked
                                        disabled>
                                    <label for="minimal-radio-disabled-checked">Padre de &amp; familia</label>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Numero de c??dula de identidad</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="ti-id-badge "></i>
                            </span>
                        </div>
                        <select name="persona_id" id="select" class="form-control" required
                            data-validation-required-message="Seleccione una persona">
                            <option value="" class="placeholderselect" disabled selected>Seleccione una numero de CI.
                            </option>
                            <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value=<?php echo e($persona->ci, false); ?>><?php echo e($persona->ci, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo electronico</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="ti-email "></i>
                            </span>
                        </div>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="mdi mdi-account"></i>
                            </span>
                        </div>
                        <input type="text" name='name' class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Contrase??a</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="mdi mdi-key-variant"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="card-body">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
            <a href="<?php echo e(route('listar_usuario'), false); ?>" class="btn btn-dark">Cancelar</a>
        </div>
    </div>
</div>

<?php $__env->startSection('archivos_script_form'); ?>
<!-- jQuery file upload -->
<script src='<?php echo e(('assets/plugins/dropify/dist/js/dropify.min.js'), false); ?>'></script>
<script>
    $(document).ready(function () {
        $('.dropify').dropify({
            messages: {
                default: 'Arrastre un archivo o haga click',
                replace: 'Arrastre un archivo para reemplazar',
                remove: 'eliminar',
                error: 'Lo sentimos, el archivo es demasiado grande.'
            }
        });
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function (event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function (event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function (event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function (e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon\www\aprendizaje\resources\views/usuario/_form_usuario.blade.php ENDPATH**/ ?>