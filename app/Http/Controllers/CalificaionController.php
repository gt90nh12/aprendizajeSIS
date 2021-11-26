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
    public function store(Request $request)
    {
        $rules=[
            'rude'=>'required',
            'tipo_tecnica'=>'required',
            'nombre_tecnica'=>'required',
            'puntaje'=>'required',
            'fecha'=>'required',
            'comentario'=>'required',    
        ];
        $messages =[
            'rude.required' => 'El codigo de RUDE es necesario.',
            'tipo_tecnica.required' => 'El tipo de tecnica es requerido.',
            'nombre_tecnica.required' => 'El nombre de tecnica es requerido.',
            'puntaje.required' => 'El puntaje es requerido.',
            'fecha.required' => 'La fecha es requerida.',
            'comentario.numeric' => 'El comentario es requerido.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            $calificacion = new calificacione;
            $calificacion->tipo_tecnica = e($request->input('tipo_tecnica'));
            $calificacion->nombre_tecnica = e($request->input('nombre_tecnica'));
            $calificacion->puntaje = e($request->input('puntaje'));
            $calificacion->fecha = date("m.d.y"); 
            $calificacion->hora = date("H:i:s");
            $calificacion->rude = e($request->input('rude'));
            $calificacion->comentario = e($request->input('comentario'));
            if($calificacion->save()):
                // return redirect()->route('listar_calificacion');
                // echo "Se almaceno correctamente";
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
