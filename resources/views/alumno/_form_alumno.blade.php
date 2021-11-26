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
                    <h5 class="form_descripcion">Genero <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="genero" id="select" class="form-control" required
                            data-validation-required-message="El genero es requerido">
                            <option value="">Seleccione genero</option>
                            <option value="varon">Masculino</option>
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
                        <input type="number" name="ci" class="form-control" required
                            data-validation-required-message="La cedula de identidad es requerido">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Fecha de nacimiento<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="date"  name="fecha_nacimiento" class="form-control" required
                            data-validation-required-message="La fecha de nacimiento es requerido" max="2009-01-01">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Número de referencia</h5>
                    <div class="controls">
                        <input type="number" name="celular" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Correo electrónico</h5>
                    <div class="controls">
                        <input type="email"  name="correo_electronico" class="form-control" required
                            data-validation-required-message="El correo electronico es requerido">
                        <input type="hidden" name="estado">
                    </div>
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
                        <input type="text" name="anio_escolaridad" class="form-control"  data-validation-required-message="El año de escolaridad es requerida.">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5 class="form_descripcion">Paralelo<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text"  name="paralelo" class="form-control" required
                            data-validation-required-message="El paralelo es requerido">
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
            <a href="{{ route('listar_escuela') }}" class="btn btn-dark">Cancelar</a>
        </div>
    </div>
</div>



