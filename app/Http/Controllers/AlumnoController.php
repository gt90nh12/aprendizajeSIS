<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Alumno;
use App\Persona;
use App\Calificacione;
use Carbon\carbon;
use DB;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $alumnos = DB::table('alumnos')
        ->join('personas', 'personas.id', '=', 'alumnos.id_persona')
        ->join('users', 'users.persona_id', '=', 'personas.ci')
        ->select('personas.id as identificador', 'users.direccion_imagen', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'alumnos.id', 'alumnos.estado', 'alumnos.anio_escolaridad', 'alumnos.paralelo', 'alumnos.codigo_rude')
        ->get();
        return view('alumno.listar')->with(compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = Persona::all();
        return view('alumno.crear')->with(compact('persona'));
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
            // 'colegio'=>'required',
            'codigo_rude'=>'required',
            'anio_escolaridad'=>'required',
            'paralelo'=>'required',
            'turno'=>'required',
            'nombre'=>'required',
            'genero'=>'required',
            'ci'=>'numeric|required|min:7',
            'fecha_nacimiento'=>'required',
            'celular'=>'numeric|required|min:8',
            
        ];
        $messages =[
            // 'colegio.required' => 'El colegio requerido.',
            'codigo_rude.required' => 'El codigo de RUDE es necesario.',
            'anio_escolaridad.required' => 'Seleccione el año de escoralidad.',
            'paralelo.required' => 'Ingrese el paralelo.',
            'turno.required' => 'El turno es requerido.',
            'nombre.required' => 'Debe ingresar el nombre de la persona.',
            'genero.required' => 'Debe seleccionar el género de la persona.',
            'ci.numeric' => 'El número de cedula debe ser numérico.',
            'ci.required' => 'Debe ingresar el numero de cedula de identidad.',
            'ci.min:7' => 'El numero de celdula de identidad debe tener al menos 7 caracteres.',
            'fecha_nacimiento.required' => 'Debe ingresar la fecha de nacimiento.',
            'celular.numeric' => 'El número de celular debe ser numérico.',
            'celular.required' => 'Debe ingresar el número de celular.',
            'celular.min:8' => 'El numero de celular debe tener al menos 8 caracteres.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            $registroTablaPersona = Persona::count(); $idPersona=$registroTablaPersona+1;
            $persona=[
                'id'=>$idPersona,
                'nombre'=>$request->input('nombre'),
                'apellido_paterno'=>$request->input('apellido_paterno'),
                'apellido_materno'=>$request->input('apellido_materno'),
                'sexo'=>$request->input('genero'),
                'ci'=>$request->input('ci'),
                'fecha_nacimiento'=>$request->input('fecha_nacimiento'),
                'celular'=>$request->input('celular'),
                'correo_electronico'=> $request->input('direccionactual'),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
                'estado'=>false
            ];
            if(Persona::insert($persona)){
                $alumno = new alumno;
                $alumno->codigo_rude = e($request->input('codigo_rude'));
                $alumno->anio_escolaridad = e($request->input('anio_escolaridad'));
                $alumno->paralelo = e($request->input('paralelo'));
                $alumno->turno = e($request->input('turno'));
                $alumno->id_colegio = 1;
                $alumno->id_persona = $idPersona;
                $alumno->estado = false;
                if($alumno->save()):
                    return redirect()->route('listar_alumno');
                endif;
            };
            
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
    public function progreso_estudiante($rude){
        $calificaciones = DB::table('calificaciones')
        ->where('calificaciones.rude', '=', $rude)
        ->select('calificaciones.nombre_prueba_tecnica', 'calificaciones.id_prueba_tecnica', 'calificaciones.puntaje')
        ->get();
        $contadorConcentracion=0;
        $contadorMemoria=0;
        $contadorCalculo=0;
        $xMemoria=array();
        $yMemoria=array();
        $xConcentracion=array();
        $yConcentracion=array();
        $xCalculo=array();
        $yCalculo=array();
        foreach($calificaciones as $nodo){
            // print_r($nodo->id_prueba_tecnica);
            if($nodo->id_prueba_tecnica=="juegoMemoria"){
                $contadorMemoria=$contadorMemoria+1;
                $valorXMemoria=$nodo->puntaje;settype($valorXMemoria, 'float'); 
                array_push($yMemoria, $contadorMemoria);
                array_push($xMemoria, $valorXMemoria);
            }
            if($nodo->id_prueba_tecnica=="juegoCalculo"){
                $contadorCalculo=$contadorCalculo+1;
                $valorXCalculo=$nodo->puntaje;settype($valorXCalculo, 'float'); 
                array_push($yCalculo, $contadorCalculo);
                array_push($xCalculo, $valorXCalculo);
            }
            if($nodo->id_prueba_tecnica=="juegoConcentracion"){
                $contadorConcentracion=$contadorConcentracion+1;
                $valorXConcentracion=$nodo->puntaje;settype($valorXConcentracion, 'float'); 
                array_push($yConcentracion, $contadorConcentracion);
                array_push($xConcentracion, $valorXConcentracion);
            }
        }
        $ejeXMemoria=json_encode($xMemoria);
        $ejeYMemoria=json_encode($yMemoria);
        $ejeXCalculo=json_encode($xCalculo);
        $ejeYCalculo=json_encode($yCalculo);
        $ejeXConcentracion=json_encode($xConcentracion);
        $ejeYConcentracion=json_encode($yConcentracion);

        // print_r($ejeXMemoria);
        // print_r($ejeYMemoria);
        // echo "<br>";

        // print_r($ejeXCalculo);
        // print_r($ejeYCalculo);
        // echo "<br>";

        // print_r($ejeXConcentracion);
        // print_r($ejeYConcentracion);
        // echo "<br>";

      
        $alumnos = DB::table('alumnos')
        ->where('alumnos.codigo_rude', '=', $rude)
        ->join('personas', 'personas.id', '=', 'alumnos.id_persona')
        ->join('users', 'users.persona_id', '=', 'personas.ci')
        ->select('personas.id as identificador', 'users.direccion_imagen', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'alumnos.id', 'alumnos.estado', 'alumnos.anio_escolaridad', 'alumnos.paralelo', 'alumnos.codigo_rude','users.email')
        ->get();

        $testgeneral = DB::table('calificaciones')
        ->where('calificaciones.rude', '=', $rude)
        ->where('calificaciones.nombre_prueba_tecnica', '=', 'general')
        ->select('calificaciones.memoria', 'calificaciones.concentracion', 'calificaciones.calculo')
        ->get();
        $ResultadoTestGeneral=$testgeneral[0]; $TestGeneralMemoria = $ResultadoTestGeneral->memoria; $TestGeneralConcentracion = $ResultadoTestGeneral->concentracion;$TestGeneralCalculo= $ResultadoTestGeneral->calculo;

        return view('perfil_director.progreso')->with(compact('alumnos','TestGeneralMemoria','TestGeneralConcentracion','TestGeneralCalculo','ejeXMemoria','ejeYMemoria','ejeXCalculo','ejeYCalculo','ejeXConcentracion','ejeYConcentracion'));
    }

    public function historial_estudiante($rude){
        $factory = (new Factory())->withDatabaseUri('https://aprendizaje-57cdc-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $reference = $database->getReference("historial/tecnicaDeCadena/$rude");
        $snapshot = $reference->getSnapshot();
        $value = $reference->getValue();
        $historial =array();
        $nodo = array();
        foreach($value as $nodo=>$historia){
            foreach($historia as $descripcion=>$dato){
                if($descripcion=="puntaje"){
                    if ($dato<=59){
                        $nodo = array(  
                            "titulo" => "Puntuación baja",
                            "puntaje" => $historia['puntaje'],
                            "fecha" => $historia['fecha'],
                            "descripcion" => "La puntuacion obtenida es muy baja, se recomienda que el estudiante comience en el nivel basico.",
                            "imagen" => "bajo.svg"
                        );
                    }
                    if ($dato > 60 and $dato <= 69){
                        $nodo = array(  
                            "titulo" => "Puntuación medio baja",
                            "puntaje" => $historia['puntaje'],
                            "fecha" => $historia['fecha'],
                            "descripcion" => "La puntuacion obtenida, es demasiado bajo.",
                            "imagen" => "mediobajo.svg"
                        );
                    }
                    if ($dato > 70 and $dato <= 79){
                        $nodo = array(  
                            "titulo" => "Puntuación medio alta",
                            "puntaje" => $historia['puntaje'],
                            "fecha" => $historia['fecha'],
                            "descripcion" => "La puntuacion obtenida, es aceptable.",
                            "imagen" => "medioalto.svg"
                        );
                    }
                    if ($dato > 80 and $dato <= 89){
                        $nodo = array(  
                            "titulo" => "Puntuación alta",
                            "puntaje" => $historia['puntaje'],
                            "fecha" => $historia['fecha'],
                            "descripcion" => "Felicidades se obtuvo una  puntuacion alta, falta poco para pasar de nivel.",
                            "imagen" => "alto.svg"
                        );
                    }
                    if ($dato > 90 and $dato <= 100){
                        $nodo = array(  
                            "titulo" => "Puntuación alta",
                            "puntaje" => $historia['puntaje'],
                            "fecha" => $historia['fecha'],
                            "descripcion" => "Nivel superado exitosamente, la puntuacion obtenida permitira avanzar de nivel.",
                            "imagen" => "trofeo.png",
                            "nivel" => "siguenteNivel.png"
                        );
                    }
                    array_push($historial,$nodo);
                }
            }
        }
        $historialEstudiante=json_encode($historial);
        return view('alumno.historial')->with(compact('historialEstudiante'));
    }
    /*funciones para el perfil de director*/
    public function listaralumno(){
        $alumnos = DB::table('alumnos')
        ->join('personas', 'personas.id', '=', 'alumnos.id_persona')
        ->join('users', 'users.persona_id', '=', 'personas.ci')
        ->select('personas.id as identificador', 'users.direccion_imagen', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'alumnos.id', 'alumnos.estado', 'alumnos.anio_escolaridad', 'alumnos.paralelo', 'alumnos.codigo_rude')
        ->get();
        return view('perfil_director.alumnos')->with(compact('alumnos'));
    }
    public function listarestudiante(){
        $alumnos = DB::table('alumnos')
        ->join('personas', 'personas.id', '=', 'alumnos.id_persona')
        ->join('users', 'users.persona_id', '=', 'personas.ci')
        ->select('personas.id as identificador', 'users.direccion_imagen', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'alumnos.id', 'alumnos.estado', 'alumnos.anio_escolaridad', 'alumnos.paralelo', 'alumnos.codigo_rude')
        ->get();
        return view('alumno.listaEstudiante')->with(compact('alumnos'));
    }
}
