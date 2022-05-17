<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Alumno'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario listar de alumno'); ?>
<!-- *********************************************** -->
<?php $__env->startSection('content'); ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Lista de registro</h4>
                
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Nombre</th>
                            <th>Año de escolaridad</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>Estudiante</th>
                        <th>Nombre</th>
                        <th>Año de escolaridad</th>
                        <th>Accion</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php if(!empty($alumnos)): ?>
                    <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img class="img-lista img-responsive" src="http://localhost/aprendizaje/public/img/perfil_usuario/<?php echo e($alumno->direccion_imagen, false); ?>"></td>
                        <td><?php echo e($alumno->nombre, false); ?> <?php echo e($alumno->apellido_paterno, false); ?> <?php echo e($alumno->apellido_materno, false); ?></td>
                        <td><?php echo e($alumno->anio_escolaridad, false); ?> - <?php echo e($alumno->paralelo, false); ?></td>
                        <td class="text-center">
                            <a href="<?php echo e(route('progreso_estudiante', $alumno->codigo_rude), false); ?>" class="btn btn-info mdi mdi-chart-areaspline"></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>    
        </div>
    </div>
</div>      
</div>
</div>
<!-- ============================================================== -->
<!-- End PAge Content -->
<!-- ============================================================== -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('archivos_script_form'); ?>
<!-- This is data table -->
<script src="<?php echo e(('assets/plugins/datatables/datatables.min.js'), false); ?>"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
    $(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
        


    });
    $('#example23').DataTable({
        language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
        dom: 'Bfrtip',
        buttons: [
        'excel', 'pdf'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="<?php echo e(('assets/plugins/styleswitcher/jQuery.style.switcher.js'), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect\director', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/perfil_director/alumnos.blade.php ENDPATH**/ ?>