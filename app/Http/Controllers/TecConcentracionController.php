<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Archivo;
use App\JuegoVideo;
use Carbon\carbon;
use DB;

class TecConcentracionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juegoVideo = DB::table('juego_videos')
        ->join('users', 'users.id', '=' ,'juego_videos.usuario_id')
        ->select('juego_videos.id','juego_videos.titulo','juego_videos.descripcion','juego_videos.nivel','juego_videos.puntaje','juego_videos.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('tec_concentracion.listar')->with(compact('juegoVideo'));

    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tec_concentracion.create');
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
            'fecha_fin'  =>  'required'
        ];
 
        $messages =[
            'titulo.required' => 'El titulo es requerido.',
            'descripcion.required' => 'La descripción es requerido.',
            'nivel.required'  =>  'El nivel del juego es requerido.',
            'puntaje.required'  =>  'Es puntaje del juego es requerido.',
            'tiempo.required'  =>  'El tiempo de juego es requerido.',
            'fecha_inicio.required'  =>  'La fecha de inicio de juego es requerido.',
            'fecha_fin.required'  =>  'La fecha de finalización de juego es requerido.'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            
            $arraypreguntas=[];
            $pregunta=$request->input('pregunta');
            $puntaje=$request->input('puntaje');
            $numeropreguntas=count($pregunta);
                for($i=0; $i<$numeropreguntas; $i++){
                    $contador=$i+1;

                    /*---Varaibles de respuesta---*/
                    $nombrerespuesta="respuesta".$contador;
                    $respuesta=$request->input($nombrerespuesta);
                    $respuesta=(array)$respuesta;
                    $numerorespuestas = count($respuesta);
                    // echo($nombrerespuesta);
                    $tiporespuesta=$request->input("opcionRespuesta$contador");
                    $imagenrespuesta=$request->input("imagen_respuesta_cerrada$i");
                    // print_r($imagenrespuesta);
                    // print_r($tiporespuesta);
                    
                    $tipopregunta=$request->input("tipo_pregunta$contador");
                    // echo($tipopregunta);
                    if($tipopregunta == "abierta"){
                        $armarRespuesta=$request->input("respuestaabierta$contador");
                    } 
                    else if($tipopregunta=="cerrada"){
                        $armarRespuesta=[];
                        // echo($tipopregunta);
                        for($j=0;$j<$numerorespuestas;$j++){
                            $respuestaArray=[];
                            $armarRespuesta=[];
                            if ($tipopregunta == "cerrada"){
                                for($l=0; $l<$numerorespuestas; $l++){
                                    // if ($_FILES["imagen_respuesta_cerrada$l"]["name"] != ""){
                                        if ($imagenrespuesta[$l] != ""){

                                        // $nombreImagen="imagen_respuesta_cerrada$l";
                                        // $nombreImagenAlmacenada = $this->imagenStore($nombreImagen, $pruebaId);echo "hay imagen";
                                    }else{
                                        $nombreImagenAlmacenada = "no hay imagen";
                                    }
                                    $respuestaArray = array (
                                        "respuesta"=>$respuesta[$l],
                                        "correcto"=>$tiporespuesta[$l],
                                        "imagen"=>$nombreImagenAlmacenada,
                                    );
                                    array_push($armarRespuesta, $respuestaArray);
                                }
                                // $respuesta = json_encode($armarRespuesta);
                                // var_dump($respuesta);
                            }

                        }
                        
                    }
                    else{
                        $armarRespuesta="ninguna respuesta para la pregunta";
                    }                   
                   
                    $respuestaArray = array (
                        "pregunta" =>$pregunta[$i],
                        "repuesta" =>$armarRespuesta,
                        "puntaje" =>$puntaje[$i],
                    );
                    array_push($arraypreguntas, $respuestaArray);
                }
                $jsonPreguntas=(json_encode($arraypreguntas));

            $validator = Validator::make($request->all(), $rules, $messages);
            /*------------- (id) tabla concentracions ------------*/
            $registroTablaJuegoVideo= juegoVideo::count(); $id=$registroTablaJuegoVideo+1;
            /*--------------------- usuario id  -------------------*/
            $usuario_id=auth()->user()->id;
            /*------------------ almacenar imagen del juego ------------------*/

            $formato = array('.jpg', '.png');//extenciones validas
            $imagen_juego = ($_FILES['imagen_juego']['name']);//Nombre de la imagen
            $extencion = substr($imagen_juego, strrpos($imagen_juego, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
            $data['documento_general']='El tipo de archivo no esta permitido.';
            }else {
            $ruta="./../storage/img/portada_juegos/".$_FILES['imagen_juego']['name'];
            $nombreArchivo = $_FILES['imagen_juego']['name'];
            move_uploaded_file($_FILES['imagen_juego']['tmp_name'], $ruta);
            echo "Se movio el archivo";
            }
            /*------------------ almacenar video ------------------*/
            $formato = array('.mp4', '.mp3');//extenciones validas
                $nombre_video = ($_FILES['cancion']['name']);//Nombre de la imagen
                $extencion = substr($nombre_video, strrpos($nombre_video, '.'));//Extencion de la imagen 
                if(!in_array($extencion, $formato)) {
                    $data['documento_general']='El tipo de archivo no esta permitido.';
                }else {
                    $ruta="./../storage/videos/tecnica_concentracion/".$_FILES['cancion']['name'];
                    $nombreArchivo = $_FILES['cancion']['name'];
                    move_uploaded_file($_FILES['cancion']['tmp_name'], $ruta);
                    echo "Se movio el archivo";
                }
            
            /*--------------- almacenar en la tabla --------------*/
            $juegoVideo     = new JuegoVideo ;
            $juegoVideo->titulo = e($request->input('titulo'));
            $juegoVideo->imagen = $imagen_juego;
            $juegoVideo->descripcion = e($request->input('descripcion'));
            $juegoVideo->nivel = e($request->input('nivel'));
            $juegoVideo->puntaje = e($request->input('puntaje'));
            $juegoVideo->tiempo = e($request->input('tiempo'));
            $juegoVideo->archivo_id = $nombre_video;
            $juegoVideo->preguntas = $jsonPreguntas;
            $juegoVideo->usuario_id = $usuario_id;
            $juegoVideo->fecha_inicio = e($request->input('fecha_inicio'));
            $juegoVideo->fecha_fin = e($request->input('fecha_fin'));
            $juegoVideo->estado=1;
            if($juegoVideo->save()):
                return back()->withErrors($validator)->with('message','El juego se almacenado exitosamente')->with('typealert', 'success');
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
        $tecConcentracion = TecConcentracion::find($id);
        $action = route('modificar_tec_concentracion', ['id' => $id]);
        return view('tec_concentracion.actualizar')->with(compact('action', 'tecConcentracion'));
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
        /*--------------------- usuario id  -------------------*/
        $usuario_id=auth()->user()->id;
        
        /*------------ Validar video de la cancion ------------*/
        $archivoConCambio = $_FILES['cancion'];
        $archivoSinCambio = e($request->input('archivo_id'));
        if ($archivoConCambio != ""){
            $nombre_cancion = ($_FILES['cancion']['name']);//Nombre del archivo nuevo
            $formato = array('.mp4', '.mp3');//extenciones validas
            $extencion = substr($nombre_cancion, strrpos($nombre_cancion, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
            }else {
                $ruta="./../storage/videos/tecnica_concentracion/".$_FILES['cancion']['name'];
                $nombreArchivo = $_FILES['cancion']['name'];
                move_uploaded_file($_FILES['cancion']['tmp_name'], $ruta);
            }
            echo "no se selecciono ningun archivo";
        }elseif($archivoSinCambio != ""){
            $nombre_cancion = $archivoSinCambio;
            echo "el archivo no sufrira ningun cambio";
        }else{
            echo "es necesario Seleccionar una cancion";
        }
       
        /*------------------- json artistas ------------------*/
        $artistasCantante    =   json_encode($_POST["artistas"]); var_dump($artistasCantante);
        /*------------------- json palabras ------------------*/
        $palabraLetraCancion =   json_encode($_POST["palabras"]); var_dump($palabraLetraCancion);
        /*--------------- almacenar en la tabla --------------*/
        $tecConcentracion = TecConcentracion::find($id); //Identificador del registro 
        $tecConcentracion->titulo       = e($request->input('titulo'));
        $tecConcentracion->descripcion  = e($request->input('descripcion'));
        $tecConcentracion->nivel        = e($request->input('nivel'));
        $tecConcentracion->puntaje      = e($request->input('puntaje'));
        $tecConcentracion->tiempo       = e($request->input('tiempo'));
        $tecConcentracion->archivo_id   = $nombre_cancion;
        $tecConcentracion->cantante     = e($request->input('cantante'));;
        $tecConcentracion->artistas     = $palabraLetraCancion;
        $tecConcentracion->letra        = e($request->input('letra'));;
        $tecConcentracion->palabras     = $artistasCantante;
        $tecConcentracion->usuario_id   = $usuario_id;
        $tecConcentracion->fecha_inicio = e($request->input('fecha_inicio'));
        $tecConcentracion->fecha_fin    = e($request->input('fecha_fin'));
        $tecConcentracion->updated_at   = Carbon::now();
        $tecConcentracion->save();
        return redirect()->route('listar_tec_concentracion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado_tconcentracion = TecConcentracion::find($id);
        $estadoActual = $estado_tconcentracion->estado;
        
        if ($estadoActual==true){
            $tecConcentracionEstado                       = TecConcentracion::find($id);
            $tecConcentracionEstado->estado               = false;
            $tecConcentracionEstado->save();
            return redirect()->route('listar_tec_concentracion');
        }elseif ($estadoActual==false) {
            $tecConcentracionEstado                       = TecConcentracion::find($id);
            $tecConcentracionEstado->estado               = true;
            $tecConcentracionEstado->save();
            return redirect()->route('listar_tec_concentracion');
        }else{
            return redirect()->route('listar_tec_concentracion');
        }
    }

    public function tecnicaConcentracion(){
        $juegoVideo = DB::table('juego_videos')
        ->join('users', 'users.id', '=' ,'juego_videos.usuario_id')
        ->select('juego_videos.id','juego_videos.titulo','juego_videos.descripcion','juego_videos.nivel','juego_videos.puntaje','juego_videos.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('tec_concentracion.listar_juegos_concentracion')->with(compact('juegoVideo'));
    }
    public function gameVideo(){
        return view('tec_concentracion.juego_video');
    }
}
