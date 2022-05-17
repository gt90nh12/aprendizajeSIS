<div class="form-body">
    <div class="card-body">
        <h4 class="card-title">Información Personal</h4>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Nombre <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nombre" class="form-control" required
                        data-validation-required-message="El nombre es requerido">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Paterno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_paterno" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Apellido Materno</h5>
                    <div class="controls">
                        <input type="text" name="apellido_materno" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Sexo <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="genero" id="select" class="form-control" required
                        data-validation-required-message="El genero es requerido">
                        <option value="">Seleccione sexo</option>
                        <option value="masculino">Masculino</option>
                        <option value="mujer">Femenino</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Cédula de Identidad</h5>
                <div class="controls">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="number" name="ci" class="form-control" required data-validation-required-message="La cedula de identidad es requerido">
                        </div>
                        <div class="col-md-6">
                            <select name="expedido" id="select" class="form-control" required data-validation-required-message="El genero es requerido">
                                <option value="">Expedido</option>
                                <option value="CH">Chuquisaca</option>
                                <option value="LP">La Paz</option>
                                <option value="CB">Cochabanba</option>
                                <option value="OR">Oruro</option>
                                <option value="PT">Potosi</option>
                                <option value="TJ">Tarija</option>
                                <option value="SC">Santa Cruz</option>
                                <option value="BE">Beni</option>
                                <option value="PD">Pando</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Fecha de nacimiento<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="date"  name="fecha_nacimiento" class="form-control" required
                    data-validation-required-message="La fecha de nacimiento es requerido" max="2010-12-31">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Certificado de nacimiento</h5>
                <div class="controls">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="number" name="oficina" class="form-control" placeholder="Oficina N°">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="libro" class="form-control" placeholder="Libro N°">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="Partida" class="form-control" placeholder="Partida N°">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="Folio" class="form-control" placeholder=" Folio N°">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Número de contacto</h5>
                <div class="controls">
                    <input type="number" name="celular" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h5 class="form_descripcion">Dirección actual de la o el estudiante (Información para el uso de la Unidad Educativa)</h5>
            <div class="controls">
                <textarea name="direccionactual" rows="2" class="form-control required" required data-validation-required-message="El campo dirección es requerido."></textarea>
                <input type="hidden" name="estado">
            </div>
        </div>
    </div>
    <h4 class="card-title">Información Estudiante</h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Unidad Educativa</h5>
                <p>Unidad Educativa San Martin de Porres Don Bosco</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <h5 class="form_descripcion">Código Rude<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text"  name="codigo_rude" class="form-control" required
                    data-validation-required-message="El código de rude es requerido">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h5 class="form_descripcion">Año de escolaridad<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="anio_escolaridad" class="form-control" required="" data-validation-required-message="Seleccione año escolaridad">
                        <option value="" class="placeholderselect" disabled="" selected="">Seleccione año de escolaridad.
                        </option>
                        <option value="PRIMERO">PRIMERO</option>
                        <option value="SEGUNDO">SEGUNDO</option>
                        <option value="TERCERO">TERCERO</option>
                        <option value="CUARTO">CUARTO</option>
                        <option value="QUINTO">QUINTO</option>
                        <option value="SEXTO">SEXTO</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <h5 class="form_descripcion">Paralelo<span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="paralelo" class="form-control" required="" data-validation-required-message="El paralelo es requerido">
                        <option value="" class="placeholderselect" disabled="" selected="">Seleccione paralelo.
                        </option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="C">C</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <h5 class="form_descripcion">Nivel<span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text"  name="turno" class="form-control" required
                    data-validation-required-message="El turno es requerido">
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="card-body">
            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
            <a href="<?php echo e(route('listar_escuela'), false); ?>" class="btn btn-dark">Cancelar</a>
        </div>
    </div>
</div>



<?php /**PATH C:\laragon\www\aprendizaje\resources\views/alumno/_form_alumno.blade.php ENDPATH**/ ?>