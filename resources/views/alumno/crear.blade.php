<!-- ************** Formulario admin *************** -->
@extends('connect.ad')
@section('titulo_pagina', 'Alumno')
@section('descripcion_pagina', 'Formulario registrar alumno')
<!-- *********************************************** -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Crear alumno</h4>
                </div>
                 <!-- Seccino de errrores-->
                 @if(Session::has('message'))
                        <div class="container">
                            <div class="alert alert-{{ Session::get('typealert') }}" style="display:none;">
                                {{ Session::get('message')}}
                                @if ($errors->any())
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                <script>
                                    $('.alert').slideDown();
                                    setTimeout(function(){$('.alert').slideUp(); }, 10000);
                                </script>
                            </div>
                        </div>
                    @endif
                
                <form method="post" action="{{route('almacenar_alumno')}}" class="mt-5" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    @include('alumno._form_alumno')
                </form>
            </div>
        </div>
    </div>
@stop



