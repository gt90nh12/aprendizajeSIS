<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Log del sistema'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario listar de logs'); ?>
<!-- *********************************************** -->
<?php $__env->startSection('content'); ?>
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listar de registros</h4>
                
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Correo electrónico</th>
                                <th>Descripción</th>
                                <th>Fecha de registro</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Correo electrónico</th>
                                <th>Descripción</th>
                                <th>Fecha de registro</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(!empty($log_usuarios)): ?>
                            <?php $__currentLoopData = $log_usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($usuario->id, false); ?></td>
                                    <td><?php echo e($usuario->name, false); ?></td>
                                    <td><?php echo e($usuario->email, false); ?></td>
                                    <td><?php echo e($usuario->description, false); ?></td>
                                    <td><?php echo e($usuario->date_time, false); ?></td>
                                    <td></td>
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

<?php echo $__env->make('connect\administrarUsuario', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/connect/activity_log.blade.php ENDPATH**/ ?>