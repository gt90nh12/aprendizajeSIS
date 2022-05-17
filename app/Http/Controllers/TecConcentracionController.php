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
            'anio_escolaridad'  =>  'required',
            'escolaridad_paralelo'  =>  'required',
            'nivel'  =>  'required',
            'puntaje'  =>  'required',
            'tiempo'  =>  'required',
            'fecha_inicio'  =>  'required',
            'fecha_fin'  =>  'required'
        ];

        $messages =[
            'titulo.required' => 'El titulo es requerido.',
            'descripcion.required' => 'La descripción es requerido.',
            'anio_escolaridad.required' => 'El año de escolaridad es requerido.',
            'escolaridad_paralelo.required' => 'El paralelo es requerido.',
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
            $numeropreguntas=$request->input('juegoNumeroPreguntas');;
            for($i=0; $i<$numeropreguntas; $i++){
                $contador=$i+1;
                $pregunta=$request->input("pregunta$contador");
                $puntajeRespuesta=$request->input("puntajeRespuesta$contador");
                if($pregunta != ''){
                    echo ("Existe pregunta para la iteracion: ".$contador);
                    if($request->input("tipo_pregunta$contador") == "abierta"){
                        $armarRespuesta=$request->input("respuestaabierta$contador");
                    } 
                    else if($request->input("tipo_pregunta$contador") =="cerrada"){
                        $armarRespuesta=[];
                        $respuestaArray=[];
                        $armarRespuesta=[];
                        $respuesta=$request->input("respuesta$contador");
                        // $respuesta=(array)$respuesta;
                        $tiporespuesta=$request->input("opcionRespuesta$contador");             
                        $numerorespuestas = count($respuesta);
                        for($recorrerOpcionesRespuesta=0; $recorrerOpcionesRespuesta<$numerorespuestas; $recorrerOpcionesRespuesta++){
                            $respuestaArray = array (
                                "respuesta"=>$respuesta[$recorrerOpcionesRespuesta],
                                "correcto"=>$tiporespuesta[$recorrerOpcionesRespuesta],
                            );
                            array_push($armarRespuesta, $respuestaArray);
                        }
                    }
                    else{
                        $armarRespuesta="ninguna respuesta para la pregunta";
                    }                   
                    $respuestaArray = array (
                        "tipo_pregunta"=>$request->input("tipo_pregunta$contador"),
                        "pregunta" =>$pregunta[0],
                        "repuesta" =>$armarRespuesta,
                        "puntaje" =>$puntajeRespuesta[0],
                    );
                    array_push($arraypreguntas, $respuestaArray);
                }else{
                    echo ("NO existe pregunta para la iteracion: ".$contador);
                }
            }
            $jsonPreguntas=(json_encode($arraypreguntas)); print_r($jsonPreguntas);
            /*------------- (id) tabla concentracions ------------*/
            $registroTablaJuegoVideo= juegoVideo::count(); $id=$registroTablaJuegoVideo+1;
            /*--------------------- usuario id  -------------------*/
            $usuario_id=auth()->user()->id;
            /*------------------ almacenar imagen del juego ------------------*/
            $nombreImagenJuego = "imagen_juego";
            $rutaPortadaJuego = "./../storage/img/portada_juegos/";
            $imagen_juego = $this->AlmacenarArchivos($nombreImagenJuego, $rutaPortadaJuego);
            /*------------------ almacenar video ------------------*/
            $cacionJuego = "cancion";
            $rutaCancionJuego = "./../storage/videos/tecnica_concentracion/";
            $nombre_video = $this->AlmacenarArchivos($cacionJuego, $rutaCancionJuego);
            /*--------------- almacenar en la tabla --------------*/
            if($imagen_juego != "" && $nombre_video != ""){
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
                $juegoVideo->anio_escolaridad = e($request->input('anio_escolaridad'));
                $juegoVideo->escolaridad_paralelo = e($request->input('escolaridad_paralelo'));
                $juegoVideo->fecha_inicio = e($request->input('fecha_inicio'));
                $juegoVideo->fecha_fin = e($request->input('fecha_fin'));
                $juegoVideo->estado=1;
                if($juegoVideo->save()):
                    return back()->withErrors($validator)->with('message','El juego se almacenado exitosamente')->with('typealert', 'success');
                endif;    
            }else{
                return back()->withErrors($validator)->with('message','El juego no se almacenado, debido a que no se guardo los archivos de portada o video de juego.')->with('typealert', 'danger');
            }
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

    public function AlmacenarArchivos ($nombreArchivoHtml, $rutaArchivoStorage)
    {
        $formato = array('.jpg', '.png', '.jpeg', '.JPG', '.PNG', '.JPEG','.mp4', '.mp3');//extenciones validas
            $imagen_juego = ($_FILES["$nombreArchivoHtml"]['name']);//Nombre de la imagen
            $extencion = substr($imagen_juego, strrpos($imagen_juego, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
                return false;
            }else {
                $ruta=$rutaArchivoStorage.$_FILES["$nombreArchivoHtml"]['name'];
                $nombreArchivo = $_FILES["$nombreArchivoHtml"]['name'];
                move_uploaded_file($_FILES["$nombreArchivoHtml"]['tmp_name'], $ruta);
                return ($nombreArchivo);
            }
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
        /*--------------------- Datos alumno  ---------------------*/
        $usuario_id=auth()->user()->id;
        $InformacionEstudiante = DB::table('personas')
        ->join('alumnos', 'personas.id', '=' ,'alumnos.id_persona')
        ->select('alumnos.codigo_rude','alumnos.anio_escolaridad','alumnos.paralelo')
        ->where('personas.id','=',$usuario_id)
        ->get();
        $DatosAlumno=$InformacionEstudiante[0];
        $RudeEstudiante = intval($DatosAlumno->codigo_rude);
        $AnioEscolaridadEstudiante = $DatosAlumno->anio_escolaridad;
        $ParaleloEstudiante = $DatosAlumno->paralelo;
        // echo($RudeEstudiante.$AnioEscolaridadEstudiante.$ParaleloEstudiante);
        /*---------------------------------------------------------*/
        /*--------    Listar Tecnicas de concentracion     --------*/
        $juegoVideo = DB::table('juego_videos')
        ->where('anio_escolaridad', '=', $AnioEscolaridadEstudiante)
        ->where('escolaridad_paralelo', '=', $ParaleloEstudiante)
        ->get();
        // print_r($juegoVideo);
        /*---------------------------------------------------------*/
        return view('tec_concentracion.listar_juegos_concentracion')->with(compact('juegoVideo','RudeEstudiante','AnioEscolaridadEstudiante','ParaleloEstudiante'));
    }
    public function game($idTecnicaConcentracion){
        /*------------------------------------------ Datos alumno ------------------------------------------*/
        $usuario_id=auth()->user()->id;
        $InformacionEstudiante = DB::table('personas')
        ->join('alumnos', 'personas.id', '=' ,'alumnos.id_persona')
        ->where('personas.id','=',$usuario_id)
        ->select('alumnos.codigo_rude')
        ->get();
        $DatosAlumno=$InformacionEstudiante[0];
        $numero_rude = intval($DatosAlumno->codigo_rude);
        /*--------------------------------------------------------------------------------------------------*/
        /*------------------------------------------------ Obtener tecnica de la cadena  ------------------------------------------------*/
        $InformacionJuego = DB::table('juego_videos')->where('id', '=' ,$idTecnicaConcentracion)->get();
        $DatosJuego = $InformacionJuego[0];
        /*-------------------------------------------------------------------------------------------------------------------------------*/
        return view('tec_concentracion.juego_video')->with(compact('DatosJuego','numero_rude'));
    }
    public function gameVideo(){
        return view('tec_concentracion.juego_video');
    }
}
