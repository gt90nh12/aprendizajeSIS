<!-- ************** Formulario admin *************** -->

<?php $__env->startSection('titulo_pagina', 'Tecnica de la Concentración'); ?>
<?php $__env->startSection('descripcion_pagina', 'Formulario listar tecnica de la concentración'); ?>
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
                                <th>Título</th>
                                <th>Nivel</th>
                                <th>Puntaje</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Título</th>
                                <th>Nivel</th>
                                <th>Puntaje</th>
                                <th>Acción</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php if(!empty($juegoVideo)): ?>
                            <?php $__currentLoopData = $juegoVideo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $juego): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($juego->titulo, false); ?></td>
                                    <td><?php echo e($juego->nivel, false); ?></td>
                                    <td><?php echo e($juego->puntaje, false); ?></td>
                                    <td>
                                    <a href="<?php echo e(route('juego_video',$juego->id), false); ?>" class="btn btn-info mdi mdi-cube-outline"> </a> 
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
    
    <script>
        
        (function(f){"function"===typeof define&&define.amd?define(["jquery","datatables.net","datatables.net-buttons"],function(e){return f(e,window,document)}):"object"===typeof exports?module.exports=function(e,c){e||(e=window);if(!c||!c.fn.dataTable)c=require("datatables.net")(e,c).$;c.fn.dataTable.Buttons||require("datatables.net-buttons")(e,c);return f(c,e,e.document)}:f(jQuery,window,document)})(function(f,e,c){var i=f.fn.dataTable,h=c.createElement("a");i.ext.buttons.print={className:"buttons-print",
        text:function(b){return b.i18n("buttons.print","Imprimir")},action:function(b,c,i,d){var a=c.buttons.exportData(d.exportOptions),k=function(b,a){for(var c="<tr>",d=0,e=b.length;d<e;d++)c+="<"+a+">"+b[d]+"</"+a+">";return c+"</tr>"},b='<table class="'+c.table().node().className+'">';d.header&&(b+="<thead>"+k(a.header,"th")+"</thead>");for(var b=b+"<tbody>",l=0,m=a.body.length;l<m;l++)b+=k(a.body[l],"td");b+="</tbody>";d.footer&&a.footer&&(b+="<tfoot>"+k(a.footer,"th")+"</tfoot>");var g=e.open("",""), a=d.title;"function"===typeof a&&(a=a());-1!==a.indexOf("*")&&(a=a.replace("*",f("title").text()));g.document.close();var j="<title>"+a+"</title>";f("style, link").each(function(){var c=j,b=f(this).clone()[0],a;"link"===b.nodeName.toLowerCase()&&(h.href=b.href,a=h.host,-1===a.indexOf("/")&&0!==h.pathname.indexOf("/")&&(a+="/"),b.href=h.protocol+"//"+a+h.pathname+h.search);j=c+b.outerHTML});try{g.document.head.innerHTML=j}catch(n){f(g.document.head).html(j)}g.document.body.innerHTML="<h1>"+a+"</h1><div>"+("function"===typeof d.message?d.message(c,i,d):d.message)+"</div>"+b;d.customize&&d.customize(g);setTimeout(function(){d.autoPrint&&(g.print(),g.close())},250)},title:"*",message:"",exportOptions:{},header:!0,footer:!1,autoPrint:!0,customize:null};return i.Buttons});
        
    
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(('assets/plugins/styleswitcher/jQuery.style.switcher.js'), false); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('connect\alumno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\aprendizaje\resources\views/tec_concentracion/listar_juegos_concentracion.blade.php ENDPATH**/ ?>