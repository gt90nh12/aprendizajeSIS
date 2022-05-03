<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Archivo;
use App\Prueba;
use App\Persona;
use Carbon\carbon;
use DB;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pruebas = DB::table('pruebas')
        // ->join('users', 'users.id', '=' ,'pruebas.usuario_id')
        // ->select('pruebas.id', 'pruebas.prueba','pruebas.tipo_pregunta','pruebas.pregunta','pruebas.respuesta','pruebas.puntaje','pruebas.estado as estadoPRU','users.estado','users.name')
        // ->get();
        $pruebas = $escuelas = Prueba::all();
        return view('prueba.listar')->with(compact('pruebas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prueba.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*--------------------- usuario id  -------------------*/
            $usuario_id=auth()->user()->id;
        /* --------------------------------------------------- */
        $rules=[
            
            'anio_escolaridad' => 'required',
            'escolaridad_paralelo' => 'required',
            'prueba'      =>  'required',
            'tipo_pregunta'  =>  'required',
            'pregunta'  =>  'required',
            'puntaje'  =>  'numeric|required',
            'tiempo_respuesta'  =>  'required',
            'orden'  =>  'numeric|required',
        ];
 
        $messages =[
            'anio_escolaridad.required' => 'Seleccione año escolaridad.',
            'escolaridad_paralelo.required' => 'Seleccione paralelo.',
            'prueba.required' => 'Seleccione la prueba.',
            'tipo_pregunta.required' => 'Seleccione el tipo de pregunta.',
            'pregunta.required' => 'La pregunta es requerida.',
            'puntaje.required' => 'El puntaje de la pregunta es necesario.',
            'puntaje.numeric' => 'El puntaje debe ser numérico.',
            'tiempo_respuesta.required' => 'El tiempo de respuesta para la pregunta es requerido.',
            'orden.required'  =>  'El orden de la pregunta es necesario.',
            'orden.numeric' => 'El orden de presentación de la pregunta debe ser numérico.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            //variables
            $armarRespuesta=[];
            $respuestaArray=[];
            $registroTablaPrueba = prueba::count(); 
            $pruebaId=$registroTablaPrueba+1;
            $nombreImagen="";
            $nombreImagenAlmacenada="";
            $nombreImagenPregunta="";
            $tipoPregunta = e($request->input('tipo_pregunta'));

            if ($tipoPregunta == "cerrada"){
                if (e($request->input("imagen_pregunta")) != ""){
                    $nombreImagenPregunta = $this->imagenStore("imagen_pregunta", $pruebaId);
                }
                $numeroRespuesta=e($request->input("respuestaCerradaNumero"));
                for($i=0; $i<$numeroRespuesta; $i++){
                    $nombreImagen="imagen_respuesta_cerrada$i";
                    if ($_FILES["imagen_respuesta_cerrada$i"]["name"] != ""){
                        $nombreImagenAlmacenada = $this->imagenStore($nombreImagen, $pruebaId);echo "hay imagen";
                    }else{
                        $nombreImagenAlmacenada = "no hay imagen"; echo "no hay imagen";
                    }
                    $respuestaArray = array (
                        "respuesta"=>e($request->input("respuesta$i")),
                        "correcto"=>e($request->input("opcionRespuesta$i")),
                        "imagen"=>$nombreImagenAlmacenada,
                    );
                    array_push($armarRespuesta, $respuestaArray);
                }
                $respuesta = json_encode($armarRespuesta);
                var_dump($respuesta);
            }elseif($tipoPregunta == "multiple"){
                //Variables
                $preguntaCorrecta = "";
                $contador=0;
                // Obtenemos datos de la vista
                $array1 = $_POST["opcion"]; 
                $array2 = $_POST["puntajemultiple"];
            
                //Saco el numero de elementos
                $longitud = count($array1);
                
                //Recorro todos los elementos
                for($i=0; $i<$longitud; $i++){
                    $contador=$i+1;
                    $preguntaCorrecta = e($request->input("checkbox$contador"));  
                    if($preguntaCorrecta){
                        $respuestaArray =   array(
                                                    "descripcion" => $array1[$i],
                                                    "puntaje"   => $array2[$i],
                                                    "respuesta"  => "verdadero"
                                                );
                        array_push($armarRespuesta, $respuestaArray);
                    }else{
                        $respuestaArray =   array(
                                                    "descripcion" => $array1[$i],
                                                    "puntaje"   => $array2[$i],
                                                    "respuesta"  => "falso"
                                                );
                        array_push($armarRespuesta, $respuestaArray);
                    }
                }
                $respuesta = json_encode($armarRespuesta);
                var_dump($respuesta);
                
                //Almacenamos la imagen si es que el usuario lo selecciono
                if (e($request->input("imagen_pregunta")) != ""){
                    $nombreImagenPregunta = $this->imagenStore("imagen_pregunta", $pruebaId);
                }else{
                    $nombreImagenPregunta="no hay imagen";
                }
            }elseif($tipoPregunta == "abierta"){
                if (e($request->input("imagen_pregunta")) != ""){
                    $nombreImagenPregunta = $this->imagenStore("imagen_pregunta", $pruebaId);
                }else{
                    $nombreImagenPregunta="no hay imagen";
                }
                $respuesta = json_encode(e($request->input('respuetaabierta')));
            }
            if(e($request->input('SeccionPrueba')) != ""){$seccionpruebaestudiante = e($request->input('SeccionPrueba'));}else{$seccionpruebaestudiante = e($request->input('prueba'));}
            $registroTablaPrueba = Prueba::count(); $idPruebaTabla=$registroTablaPrueba+1;
            $prueba = new prueba;
            $prueba->id = $idPruebaTabla;
            $prueba->anio_escolaridad = e($request->input('anio_escolaridad'));
            $prueba->escolaridad_paralelo = e($request->input('escolaridad_paralelo'));
            $prueba->prueba = e($request->input('prueba'));
            $prueba->tipo_pregunta = e($request->input('tipo_pregunta'));
            $prueba->pregunta = e($request->input('pregunta'));
            $prueba->imagen = $nombreImagenPregunta;
            $prueba->respuesta = $respuesta;
            $prueba->puntaje = e($request->input('puntaje'));
            $prueba->tiempo_respuesta = e($request->input('tiempo_respuesta'));
            $prueba->orden = e($request->input('orden'));
            $prueba->usuario_id = $usuario_id;
            $prueba->estado = 0;
            $prueba->seccion = $seccionpruebaestudiante;
            if($prueba->save()):
                return back()->withErrors($validator)->with('message','La preguta de la prueba a sido registrada.')->with('typealert', 'success');
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
        $estado_prueba = Prueba::find($id);
        $estadoActual = $estado_prueba->estado;
        
        if ($estadoActual==true){
            $pruebaEstado                       = prueba::find($id);
            $pruebaEstado->estado               = false;
            $pruebaEstado->save();
            return redirect()->route('listar_prueba');
        }elseif ($estadoActual==false) {
            $pruebaEstado                       = prueba::find($id);
            $pruebaEstado->estado               = true;
            $pruebaEstado->save();
            return redirect()->route('listar_prueba');
        }else{
            return redirect()->route('listar_prueba');
        }
    }
    
    /**
     * Almacenar imagenes
     */
    public function imagenStore($nameImage, $idPrueba)
    {
        move_uploaded_file($_FILES["$nameImage"]["tmp_name"],'./../storage/img/prueba_general/'.$_FILES["$nameImage"]["name"]);
        $archivo = new archivo;
        $archivo->nombre = $_FILES["$nameImage"]["name"];
        $archivo->tipo =   $_FILES["$nameImage"]["type"];
        $archivo->pertenece = $idPrueba;
        if ($archivo->save()){
            $nombreImagenSistema = $_FILES["$nameImage"]["name"];
            return $nombreImagenSistema;
        }else{
            $nombreImagenSistema = "no se almaceno la imagen";
            return $nombreImagenSistema;
        };
    }

    /**
    * Listar todas las pruebas
    */
    public function pruebaAlumno($prueba){
        /*------------------------ usuario id  ----------------------*/
            $usuario_id=auth()->user()->persona_id;
        /* ------------------------******--------------------------- */
        $personaAlumno=DB::table('personas')
                ->select('nombre','apellido_paterno','apellido_materno')
                ->where('personas.ci', '=', $usuario_id)
                ->get();
        $nombreAlumno = $personaAlumno[0]->nombre." ".$personaAlumno[0]->apellido_paterno." ".$personaAlumno[0]->apellido_materno;
        // Obtenemos el id de persona  =  para obtener los datos del alumno
            $persona_id=DB::table('personas')
                ->select('personas.id','nombre')
                ->where('personas.ci', '=', $usuario_id)
                ->first()->id;
        // Obtenemos el año de escolaridad del alumno y el paralelo para mostrarle su test
            $alumno_datos=DB::table('alumnos')
                ->select('codigo_rude','anio_escolaridad','paralelo')
                ->where('id_persona', '=', $persona_id)
                ->get();
            $anio_escolaridad = $alumno_datos[0]->anio_escolaridad;
            $paralelo = $alumno_datos[0]->paralelo;
            $estudianterude = $alumno_datos[0]->codigo_rude;
        // Prueba estudiante
        $pruebasPreguntaEstudiante = DB::table('pruebas')
        ->select('id','prueba','tipo_pregunta','pregunta','respuesta','orden','imagen','seccion')
        ->orderBy('orden', 'ASC')
        ->where('anio_escolaridad', '=', $anio_escolaridad)
        ->where('escolaridad_paralelo', '=', $paralelo)
        ->where('prueba','=',$prueba)
        ->get();
        // Prueba calificacion
        $nombrePrueba = $pruebasPreguntaEstudiante[0]->prueba;
        $pruebaCalificacion = DB::table('pruebas')->where('anio_escolaridad', '=', $anio_escolaridad)->where('escolaridad_paralelo', '=', $paralelo)->where('prueba','=',$prueba)->sum('puntaje');
        // Prueba tiempo  
        $pruebaTiempo = DB::table('pruebas')->where('anio_escolaridad', '=', $anio_escolaridad)->where('escolaridad_paralelo', '=', $paralelo)->where('prueba','=',$prueba)->sum('tiempo_respuesta');
        // Prueba numero de preguntas
        $numero_preguntas_prueba = count($pruebasPreguntaEstudiante);
        if($prueba == "general"){
            return view('prueba.pruebaGeneralEstudiante')->with(compact('nombreAlumno','pruebasPreguntaEstudiante',"numero_preguntas_prueba","pruebaCalificacion","pruebaTiempo","estudianterude","nombrePrueba"));
        }else{
            return view('prueba.pruebaEstudiante')->with(compact('nombreAlumno','pruebasPreguntaEstudiante',"numero_preguntas_prueba","pruebaCalificacion","pruebaTiempo","estudianterude","nombrePrueba"));
        }
        // print_r($pruebasPreguntaEstudiante);
    }

  
}
