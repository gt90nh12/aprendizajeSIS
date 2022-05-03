<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Calificacione;
use Carbon\carbon;
use DB;

class CalificaionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function segundos_tiempo($tiempo_en_segundos) {
     $horas = floor($tiempo_en_segundos / 3600);
     $minutos = floor(($tiempo_en_segundos - ($horas * 3600)) / 60);
     $segundos = $tiempo_en_segundos - ($horas * 3600) - ($minutos * 60);
     return $horas . ':' . $minutos . ":" . $segundos;
 }
 public function store(Request $request)
 {
    $rules=[
        'rude'=>'required',
        'id_prueba_tecnica'=>'required',
        'puntaje'=>'required', 
    ];
    $messages =[
        'rude.required' => 'El codigo de RUDE es necesario.',
        'id_prueba_tecnica.required' => 'El identificado de la tecnica es requerido.',
        'puntaje.required' => 'El puntaje es requerido.',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);
    if($validator->fails()):
        return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
    else:
        $tiempo_juego_estudiante = e($request->input('tiempo'));
        $tiempo_juego = $this->segundos_tiempo($tiempo_juego_estudiante);
        $calificacion = new calificacione;
        $calificacion->nombre_prueba_tecnica = e($request->input('nombre_prueba_tecnica'));
        $calificacion->id_prueba_tecnica = e($request->input('id_prueba_tecnica'));
        $calificacion->tiempo = $tiempo_juego;
        $calificacion->puntaje = e($request->input('puntaje'));
        $calificacion->rude = e($request->input('rude'));
        $calificacion->comentario = 'ninguno';
        $calificacion->memoria = e($request->input('memoria_calificacion'));
        $calificacion->concentracion = e($request->input('concentracion_calificacion'));
        $calificacion->calculo = e($request->input('calculo_calificacion'));
        if($calificacion->save()):
                // return redirect()->route('listar_calificacion');
            return back();
        endif;   
    endif;
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}
