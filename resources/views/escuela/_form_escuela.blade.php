<div class="form-body">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h5 class="form_descripcion">Nombre <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="nombre" class="form-control" required
                        data-validation-required-message="El nombre del colegio requerido" value="{{ $escuela->nombre }}">
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h5 class="form_descripcion">Número contacto<span class="text-danger">*</span></h5>

                    <div class="col-md-6">

                        <h5 class="form_descripcion">Telefono<span class="text-danger">*</span></h5>
                        <input type="text" name="email" class="form-control" required data-validation-required-message="El email requerido" value="{{ $escuela->email }}">

                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Teléfono</h5>
                    <div class="controls">
                        <input type="text" name="telefono" class="form-control" value="{{ $escuela->telefono }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Celular <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="celular" class="form-control" value="{{ $escuela->celular }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Horarios</h5>
                    <div class="controls">
                        <input type="text" name="lunesviernes" class="form-control" placeholder="Lunes a Viernes" value="{{ $escuela->lunesviernes }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="transparente">.</h5>
                    <div class="controls">
                        <input type="text" name="sabado" class="form-control" placeholder="Sábado" value="{{ $escuela->sabado }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h5 class="form_descripcion">Dirección</h5>
                    <div class="controls">
                        <input type="text" name="direccion" class="form-control" required
                        data-validation-required-message="La direccion requerido" value="{{ $escuela->direccion }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h5 class="form_descripcion">Correo electrónico<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="email" class="form-control" required
                        data-validation-required-message="El email requerido" value="{{ $escuela->email }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Misión<span class="text-danger">*</span></h5>
                    <textarea name="mision" id="mision" rows="4" class="form-control required" required="" data-validation-required-message="El campo descripcion es requerido." aria-required="true">{{ $escuela->mision }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <h5 class="form_descripcion">Visión<span class="text-danger">*</span></h5>
                    <textarea name="vision" id="vision" rows="4" class="form-control required" required="" data-validation-required-message="El campo descripcion es requerido." aria-required="true">{{ $escuela->vision }}</textarea>
                </div>
            </div>
        </div>
        <div class="row">
           <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <h5 class="form_descripcion">Imagen de colegio</h5>
                        <div class="card">
                            <label for="input-file-now">
                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                    <i class="fas fa-exclamation"></i>
                                </button>
                                Solo archivos png
                            </label>
                            <input type="file" id="input-file-now" name="direccion_imagen" class="dropify"
                            data-allowed-file-extensions="png" data-default-file="http://localhost/aprendizaje/public/img/roles_usuario/{{ $escuela->imagen }}" />
                            <input type="text" name="imagen_nombre_colegio" value="{{ $escuela->imagen }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="form-group">
                        <h5 class="form_descripcion">Nivel</h5>
                        <div class="card">
                            <label for="input-file-now">
                                <button type="button" class="btn waves-effect waves-light btn-sm btn-info">
                                    <i class="fas fa-cog"></i>
                                </button>
                                Seleccionar el nivel: 
                            </label>
                            <div class="input-group">
                                <ul class="icheck-list">
                                    <li>
                                        @if     ($escuela->nivel_primario == true)
                                        <input tabindex="7" type="checkbox" class="check" id="minimal-radio-1"
                                        name="nivel_primario" checked>
                                        @else
                                        <input tabindex="7" type="checkbox" class="check" id="minimal-radio-1"
                                        name="nivel_primario">
                                        @endif  
                                        <label for="minimal-radio-1">Nivel primario</label>

                                    </select>
                                </li>
                                <li>
                                    @if     ($escuela->nivel_secundario == true)
                                    <input tabindex="7" type="checkbox" class="check" id="minimal-radio-1"
                                    name="nivel_secundario" checked>
                                    @else
                                    <input tabindex="7" type="checkbox" class="check" id="minimal-radio-1"
                                    name="nivel_secundario">
                                    @endif 
                                    <label for="minimal-radio-2">Nivel secundario</label>
                                </li>                                  
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <h5 class="form_descripcion">Historia colegio<span class="text-danger">*</span></h5>
            <textarea name="descripcion" id="descripcion" rows="6" class="form-control required" required="" data-validation-required-message="El campo descripcion es requerido." aria-required="true">{{ $escuela->descripcion }}</textarea>
        </div>
    </div>
</div>

<div class="form-actions">
    <div class="card-body">
        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i>Guardar</button>
        <a href="{{ route('unidad_educativa') }}" class="btn btn-dark">Cancelar</a>
    </div>
</div>
</div>


@section('archivos_script_form')
<!-- jQuery file upload -->
<script src='{{ ('assets/plugins/dropify/dist/js/dropify.min.js') }}'></script>
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
@stop
