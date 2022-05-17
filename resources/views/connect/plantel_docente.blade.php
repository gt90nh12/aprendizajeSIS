<!-- ************** Formulario admin *************** -->
@extends('connect.ad')
@section('titulo_pagina', 'Plantel docente')
@section('descripcion_pagina', 'Formulario plantel docente')
<!-- *********************************************** -->
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-6 col-xlg-4 text-left">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-lg-3 text-center">
                    <a href="app-contact-detail.html"><img src="../assets/images/users/1.jpg" alt="user" class="img-circle img-responsive"></a>
                </div>
                <div class="col-md-8 col-lg-9">
                    <h4 class="mb-0">Johnathan Doe</h4> 
                    <small>Web Designer</small>
                    <address>
                        795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                        <br/>
                        <br/>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-xlg-4">
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-lg-3 text-center">
                    <a href="app-contact-detail.html"><img src="../assets/images/users/2.jpg" alt="user" class="img-circle img-responsive"></a>
                </div>
                <div class="col-md-8 col-lg-9">
                    <h4 class="mb-0">Johnathan Doe</h4> 
                    <small>Web Designer</small>
                    <address>
                        795 Folsom Ave, Suite 600 San Francisco, CADGE 94107
                        <br/>
                        <br/>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                    </address>
                </div>
            </div>
        </div>
    </div>
</div>
@stop