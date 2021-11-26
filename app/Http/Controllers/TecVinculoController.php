<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Vinculo;
use Carbon\carbon;
use DB;

class TecVinculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecVinculo = DB::table('vinculos')
        ->join('users', 'users.id', '=' ,'vinculos.usuario_id')
        ->select('vinculos.id','vinculos.titulo','vinculos.descripcion','vinculos.nivel','vinculos.puntaje','vinculos.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('vinculo.listar')->with(compact('tecVinculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vinculo.create');
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
            'titulo'      =>  'required',
            'descripcion'  =>  'required',
            'nivel'  =>  'required',
            'puntaje'  =>  'required',
            'tiempo'  =>  'required',
            'fecha_inicio'  =>  'required',
            'fecha_fin'  =>  'required',
            'descripcion_cuento'  =>  'required',
        ];
        $messages =[
            'titulo.required' => 'El titulo es requerido.',
            'descripcion.required' => 'La descripción es requerido.',
            'nivel.required'  =>  'El nivel del juego es requerido.',
            'puntaje.required'  =>  'Es puntaje del juego es requerido.',
            'tiempo.required'  =>  'El tiempo de juego es requerido.',
            'fecha_inicio.required'  =>  'La fecha de inicio de juego es requerido.',
            'fecha_fin.required'  =>  'La fecha de finalización de juego es requerido.',
            'descripcion_cuento'  =>  'Ingrese la descripción.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else: 
            $validator = Validator::make($request->all(), $rules, $messages);
            $usuario_id=auth()->user()->id;
            $curso_id=1;
            $imagenesVinculoArray=[];
            $celdaImagen="";
            $celdaImagenPosicion="";
            $matrizVinculo=json_encode(
                array(
                    1 => array(
                        'English' => array(
                            'One',
                            'January'
                        ),
                        'French' => array(
                            'Une',
                            'Janvier'
                        )
                    )
                )
            );
            $imagen = $request->input('imagen');
            $posicion = $request->input('posicion');
            $longitud = count($posicion);
            print_r($imagen);
            // for($i=0; $i<$longitud; $i++){
            //    $celdaImagen=$imagen[$i];
            //    $celdaImagenPosicion=$posicion[$i];
            //    array_push($imagenesVinculoArray,$celdaImagen);
            //    array_push($imagenesVinculoArray,$celdaImagenPosicion);
            // }
            // $matrizVinculo = json_encode($imagenesVinculoArray); 
            $formato = array('.jpg', '.png');
            $imagen_juego = ($_FILES['imagen_juego']['name']);
            $extencion = substr($imagen_juego, strrpos($imagen_juego, '.'));
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
            }else {
                $ruta="./../storage/img/portada_juegos/".$_FILES['imagen_juego']['name'];
                $nombreArchivo = $_FILES['imagen_juego']['name'];
                move_uploaded_file($_FILES['imagen_juego']['tmp_name'], $ruta);
                echo "Se movio el archivo";
            }
            $tecVinculo = new Vinculo;
            $tecVinculo->titulo = e($request->input('titulo'));
            $tecVinculo->imagen = $nombreArchivo;
            $tecVinculo->descripcion = e($request->input('descripcion'));
            $tecVinculo->nivel = e($request->input('nivel'));
            $tecVinculo->puntaje = e($request->input('puntaje'));
            $tecVinculo->tiempo = e($request->input('tiempo'));
            $tecVinculo->curso_id = $curso_id;
            $tecVinculo->fecha_inicio = e($request->input('fecha_inicio'));
            $tecVinculo->fecha_fin = e($request->input('fecha_fin'));
            $tecVinculo->usuario_id = $usuario_id;
            $tecVinculo->descripcion_cuento = e($request->input('descripcion_cuento'));
            $tecVinculo->respuesta_cuento = $matrizVinculo;
            $tecVinculo->estado=1;
            if($tecVinculo->save()):
                return back()->withErrors($validator)->with('message','Tecnica del vinculo ha sido registrado')->with('typealert', 'success');
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

    public function tecnicaVinculo(){
        $tecVinculo = DB::table('vinculos')
        ->join('users', 'users.id', '=' ,'vinculos.usuario_id')
        ->select('vinculos.id','vinculos.titulo','vinculos.descripcion','vinculos.nivel','vinculos.puntaje','vinculos.estado as estadoTEC','users.estado','users.name')
        ->get();        return view('vinculo.listaJuego')->with(compact('tecVinculo'));    
    }

    public function game()
    {
        return view('vinculo.juego_vinculo');
    }
}
