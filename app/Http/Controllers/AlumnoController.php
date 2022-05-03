<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Alumno;
use App\Persona;
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
            'correo_electronico'=>'required'
            
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
            'correo_electronico.required' => 'Debe ingresar el correo electrónico.',
            'correo_electronico.email' => 'El formato de su correo electrónico es invalido.'
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
                'correo_electronico'=> $request->input('correo_electronico'),
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
    public function progreso_estudiante($id){
        // echo $id;
        // $alumnos = DB::table('personas')
        // ->where('personas.id', '=', $id)
        // ->get();
        // echo($alumnos);
        // return view('alumno.listar')->with(compact('alumnos'));
        $ids=$id;
        $alumnos = DB::table('alumnos')
        ->where('alumnos.codigo_rude', '=', $id)
        ->join('personas', 'personas.id', '=', 'alumnos.id_persona')
        ->join('users', 'users.persona_id', '=', 'personas.ci')
        ->select('personas.id as identificador', 'users.direccion_imagen', 'personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'alumnos.id', 'alumnos.estado', 'alumnos.anio_escolaridad', 'alumnos.paralelo', 'alumnos.codigo_rude','users.email')
        ->get();


        //*************************************** RESULTADOS DE CALCULO ***************************************
        $contador=0;
        $y=array();
        $x=array();
        $factory = (new Factory())->withDatabaseUri('https://aprendizaje-57cdc-default-rtdb.firebaseio.com/');
        $database = $factory->createDatabase();
        $reference = $database->getReference("calificacion/calculo/$id");
        // $reference = $database->getReference('calificacion/calculo/15222245');
        $snapshot = $reference->getSnapshot();
        $value = $reference->getValue();
        if(empty($value))
        {
         $ejeX=json_encode($x);
         $ejeY=json_encode($y);
     }else{
        foreach($value as $nodo=>$juego){
            foreach($juego as $descripcion=>$dato){
                if($descripcion=="puntaje"){
                    $contador=$contador+1;
                    array_push($y, $contador);
                    array_push($x, $dato);
                }
            }
        }
        $ejeX=json_encode($x);
        $ejeY=json_encode($y);
    }
        //*********************************** FINALIZA RESULTADOS DE CALCULO *********************************\

        //*************************************** RESULTADOS DE MEMORIA ***************************************
    $contadorM=0;
    $yM=array();
    $xM=array();
    $factory = (new Factory())->withDatabaseUri('https://aprendizaje-57cdc-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();
    $reference = $database->getReference("calificacion/memoria/$id");
        // $reference = $database->getReference('calificacion/calculo/15222245');
    $snapshot = $reference->getSnapshot();
    $valueM = $reference->getValue();
    if(empty($valueM)){

    $ejeXM=json_encode($xM);
    $ejeYM=json_encode($yM);
    }else{
            foreach($valueM as $nodoM=>$juegoM){
        foreach($juegoM as $descripcion=>$datoM){
            if($descripcion=="puntaje"){
                $contadorM=$contadorM+1;
                array_push($yM, $contadorM);
                array_push($xM, $datoM);
            }
        }
    }
    $ejeXM=json_encode($xM);
    $ejeYM=json_encode($yM);
    }
        //*********************************** FINALIZA RESULTADOS DE MEMORIA *********************************\

        //************************************ RESULTADOS DE CONCENTRACION ************************************
    $contadorC=0;
    $yC=array();
    $xC=array();
    $factory = (new Factory())->withDatabaseUri('https://aprendizaje-57cdc-default-rtdb.firebaseio.com/');
    $database = $factory->createDatabase();
    $reference = $database->getReference("calificacion/concentracion/$id");
        // $reference = $database->getReference('calificacion/calculo/15222245');
    $snapshot = $reference->getSnapshot();
    $valueC = $reference->getValue();
    if(empty($valueM)){
    $ejeXC=json_encode($xC);
    $ejeYC=json_encode($yC);
    }else{
            foreach($valueC as $nodoC=>$juegoC){
        foreach($juegoC as $descripcion=>$datoC){
            if($descripcion=="puntaje"){
                $contadorC=$contadorC+1;
                array_push($yC, $contadorC);
                array_push($xC, $datoC);
            }
        }
    }
    $ejeXC=json_encode($xC);
    $ejeYC=json_encode($yC);
    }
        //******************************** FINALIZA RESULTADOS DE CONCENTRACION ******************************
    





    return view('alumno.progreso')->with(compact('alumnos','ids','ejeX','ejeXC','ejeXM','ejeY','ejeYC','ejeYM'));

        // $alumnos = DB::table('alumnos')
        // ->where('ci', '=', $id)
        // ->get();
        // return view('alumno.progreso')->with(compact('ejeX','ejeY'));
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
}
