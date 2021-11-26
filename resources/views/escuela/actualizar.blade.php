<!-- ************** Formulario admin *************** -->
@extends('connect.ad')
@section('titulo_pagina', 'Persona')
@section('descripcion_pagina', 'Formulario actualizar persona')
<!-- *********************************************** -->
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">actualizar registro</h4>
                </div>
                <!-- <form action="{{$action}}" class="mt-5" enctype="multipart/form-data">  -->
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
                {!! Form::open(['url' => $action, 'class'=>'validation-wizard wizard-circle',
                'files'=>'true']) !!}
                    @include('escuela._form_escuela')

                </form>
            </div>
        </div>
    </div>
@stop