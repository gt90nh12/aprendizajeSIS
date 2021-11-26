<style>
    .cuadro-espacio{
        padding-left: 2em;
        padding-right: 2em;
    }
</style>
<div class="form-body">
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Cédula de identidad</h5>
                    <div class="card">
                        <select name="persona_id" id="select" class="form-control" required
                        data-validation-required-message="Seleccione una persona">
                        <option value="" class="placeholderselect" disabled selected>Seleccione una numero de CI.
                        </option>
                        <?php if($personas): ?>
                        <?php $__currentLoopData = $personas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $persona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value=<?php echo e($persona->ci); ?>><?php echo e($persona->ci); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <h5 class="form_descripcion">RDA</h5>
            <div class="card">
                <input type="text" name="rda" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Años de experiencia</h5>
                <div class="card">
                    <input type="number" name="experiencia" class="form-control" required>                    
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <h5 class="form_descripcion">Especialidad</h5>
            <div class="card">
                <input type="text" name="especialidad" class="form-control" required>                    
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Resumen</h5>
                <div class="card">
                    <textarea name="resumen" id="resumen" rows="6" class="form-control required" required="" data-validation-required-message="El campo descripcion es requerido." aria-required="true"></textarea>                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <h5 class="form_descripcion">Reconocimento</h5>
                <div class="card">
                    <textarea name="reconocimiento" id="reconocimiento" rows="6" class="form-control required" required="" data-validation-required-message="El campo descripcion es requerido." aria-required="true"></textarea>                    </div>
                </div>
            </div>
        </div>
        <div class="row cuadro-espacio">
            <div class="col-md-6">
                <div class="form-group">
                  <h5 class="form_descripcion">Formación académica <span class="btn btn-success" onclick="adicionar_formacion()"> + </span></h5>
                  <div class="" id="formacion_academica">
                    <div class="form-group">
                        <h5 class="form_descripcion">Fecha de titulación</h5>
                        <input type="date" name="fecha_academica[]" class="form-control" required>
                        <h5 class="form_descripcion">Descripción de estudio</h5>
                        <input type="text" name="descripcion_academica[]" class="form-control" required>
                        <h5 class="form_descripcion">Casa de estudio</h5>
                        <input type="text" name="casa_academica[]" class="form-control" required>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6"> 
            <div class="form-group">
                <h5 class="form_descripcion">Experiencia laboral <span class="btn btn-success" onclick="agregar_experiencia()"> + </span></h5>
                <div class="card" id="experiencia_laboral">
                    <div class="form-group">
                        <h5 class="form_descripcion">Fecha de emisión</h5>
                        <input type="date" name="fecha_experiencia[]" class="form-control" required>
                        <h5 class="form_descripcion">Descripción de experiencia</h5>
                        <input type="text" name="descripcion_experiencia[]" class="form-control" required>
                        <h5 class="form_descripcion">Unidad educativa</h5>
                        <input type="text" name="informacion_experiencia[]" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>          
    </div>
    <div class="row cuadro-espacio">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
              <h5 class="form_descripcion">Cursos y seminarios <span class="btn btn-success" onclick="adicionar_curso()"> + </span></h5>
              <div class="card" id="cursos_seminarios">
                <div class="form-group">
                    <h5 class="form_descripcion">Fecha de culminación de curso/seminario</h5>
                    <input type="date" name="fecha_seminarios[]" class="form-control" required>
                    <h5 class="form_descripcion">Descripción de seminarios</h5>
                    <input type="text" name="descripcion_seminarios[]" class="form-control" required>
                    <h5 class="form_descripcion">Casa de estudio</h5>
                    <input type="text" name="informacion_seminarios[]" class="form-control" required>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
           <h5 class="form_descripcion">Certificados<span class="btn btn-success" onclick="adicionar_estudios()"> + </span></h5>
           <div class="card" id="otros_estudios">
            <div class="form-group">
                <h5 class="form_descripcion">Fecha realizada</h5>
                <input type="date" name="fecha_estudio[]" class="form-control" required>
                <h5 class="form_descripcion">Descripción de estudios</h5>
                <input type="text" name="descripcion_estudio[]" class="form-control" required>
                <h5 class="form_descripcion">De:</h5>
                <input type="text" name="informacion_estudio[]" class="form-control" required>
            </div>                   
        </div>
    </div>            
</div>
</div> 
<div class="row cuadro-espacio">
    <div class="col-lg-6 col-md-6">
        <div class="form-group">
            <h5 class="form_descripcion">Tic educación</h5>
            <div class="card">
                <label for="input-file-now">
                    Debe seleccionar el tic de educación <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                        <i class="fas fa-cog"></i>
                    </button>
                </label>
                <div class="input-group">
                    <ul class="icheck-list">
                        <li>
                            <input tabindex="7" type="checkbox" class="check" id="minimal-radio-1"
                            name="otros_estudios[]" value="microsoft office">
                            <label for="minimal-radio-1">Microsft Office</label>
                        </li>
                        <li>
                            <input tabindex="8" type="checkbox" class="check" id="minimal-radio-2"
                            name="otros_estudios[]" value="pizarra digital" checked>
                            <label for="minimal-radio-2">Pizarra digital</label>
                        </li>
                        <li>
                            <input tabindex="8" type="checkbox" class="check" id="minimal-radio-3"
                            name="otros_estudios[]" value="videos interactivos" checked>              
                            <label for="minimal-radio-3">Videos interactivos</label>
                        </li>
                        <li>
                            <input tabindex="8" type="checkbox" class="check" id="minimal-radio-4"
                            name="otros_estudios[]" value="otros estudios" checked>
                            <label for="minimal-radio-4">Otros estudios</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">

    </div>
</div>
</div>

<div class="form-actions">
    <div class="card-body">
        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
        <a href="<?php echo e(route('listar_docente')); ?>" class="btn btn-dark">Cancelar</a>
    </div>
</div>
</div>
</div>

<?php $__env->startSection('archivos_script_form'); ?> 
<!-- jQuery file upload -->
<script src='<?php echo e(('assets/plugins/dropify/dist/js/dropify.min.js')); ?>'></script> 
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
    var room = 1;
    function adicionar_formacion() {
        room++;
        var objTo = document.getElementById('formacion_academica')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="form-group"><label>Informacion academica <span class="btn btn-danger" type="button" onclick="eliminar_formacion(' + room + ');"> - </span></label><h5 class="form_descripcion">Año de estudio</h5><input type="date" name="fecha_academica[]" class="form-control" required><h5 class="form_descripcion">Descripcion de estudio</h5><input type="text" name="descripcion_academica[]" class="form-control" required><h5 class="form_descripcion">Casa de estudio</h5><input type="text" name="casa_academica[]" class="form-control" required></div>';
        objTo.appendChild(divtest)
    }
    function agregar_experiencia() {
        room++;
        var objTo = document.getElementById('experiencia_laboral')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="form-group"><label>Informacion de experiencia laboral <span class="btn btn-danger" type="button" onclick="eliminar_experiencia(' + room + ');"> - </span></label><h5 class="form_descripcion">Año de experiencia</h5><input type="date" name="fecha_experencia[]" class="form-control" required><h5 class="form_descripcion">Descripcion de experiencia</h5><input type="text" name="descripcion_experencia[]" class="form-control" required><h5 class="form_descripcion">Experiencia profesional</h5><input type="text" name="informacion_experiencia[]" class="form-control" required></div>';
        objTo.appendChild(divtest)
    }
    function adicionar_curso() {
        room++;
        var objTo = document.getElementById('cursos_seminarios')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="form-group"><label>Informacion de cursos y seminarios <span class="btn btn-danger" type="button" onclick="eliminar_experiencia(' + room + ');"> - </span></label><h5 class="form_descripcion">Año de seminarios</h5><input type="date" name="fecha_seminarios[]" class="form-control" required><h5 class="form_descripcion">Descripcion de seminarios</h5><input type="text" name="descripcion_seminarios[]" class="form-control" required><h5 class="form_descripcion">Cursos y seminarios</h5><input type="text" name="informacion_seminarios[]" class="form-control" required></div>';
        objTo.appendChild(divtest)
    }
    function adicionar_estudios() {
        room++;
        var objTo = document.getElementById('otros_estudios')
        var divtest = document.createElement("div");
        divtest.setAttribute("class", "form-group removeclass" + room);
        var rdiv = 'removeclass' + room;
        divtest.innerHTML = '<div class="form-group"><label>Informacion de otros estudios <span class="btn btn-danger" type="button" onclick="eliminar_experiencia(' + room + ');"> - </span></label><h5 class="form_descripcion">Año de estudios</h5><input type="date" name="fecha_estudio[]" class="form-control" required><h5 class="form_descripcion">Descripcion de estudios</h5><input type="text" name="descripcion_estudio[]" class="form-control" required><h5 class="form_descripcion">Otros estudios</h5><input type="text" name="informacion_estudio[]" class="form-control" required></div>';
        objTo.appendChild(divtest)
    }
    function eliminar_formacion(rid) {
        $('.removeclass' + rid).remove();
    }
    function eliminar_experiencia(rid) {
        $('.removeclass' + rid).remove();
    }
    function eliminar_curso(rid) {
        $('.removeclass' + rid).remove();
    }
    function eliminar_estudios(rid) {
        $('.removeclass' + rid).remove();
    }

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\laragon\www\aprendizaje\resources\views/docente/_form_docente.blade.php ENDPATH**/ ?>