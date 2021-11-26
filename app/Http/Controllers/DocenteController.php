<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Archivo;
use App\Docente;
use App\Persona;
use Carbon\carbon;
use DB;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = DB::table('docentes')
        ->join('personas', 'personas.ci', '=', 'docentes.id_persona')
        ->select('personas.nombre', 'personas.apellido_paterno', 'personas.apellido_materno', 'docentes.experiencia', 'docentes.especialidad', 'docentes.rda', 'docentes.id', 'docentes.estado')
        ->get();
        return view('docente.listar')->with(compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $docente = new Docente();
        $action = route('almacenar_docente');
        $personas = Persona::all();
        return view('docente.crear')->with(compact('action','docente','personas'));
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
            'rda'      =>  'required',
            'especialidad'      =>  'required',
            'resumen'      =>  'required',
            'reconocimiento' => 'required',
            'experiencia' => 'required',
        ];
        $messages =[
            'rda.required' => 'El RDA es requerido.',
            'especialidad.required' => 'Debe ingresar la especialidad del profesor..',
            'resumen.required' => 'La descripcion del perfil del profesor es requerido.',
            'reconocimiento.required' => 'Los reconocimiento del profesor es requerido.',
            'experiencia.required' => 'La experiencia del profesor es requerido.',

        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:

        $descripcionacademica = $_POST["descripcion_academica"];
        $fechaacademica = $_POST["fecha_academica"];
        $casaacademica = $_POST["casa_academica"];
        $longitud = count($descripcionacademica);
        $dato = array();
        $informacionacademica = array();
        for($i=0; $i<$longitud; $i++)
        {
            echo $descripcionacademica[$i];
            echo $fechaacademica[$i];
            echo $casaacademica[$i];
            echo "<br>";
            $dato= array('descripcion' => $descripcionacademica[$i],'fecha' => $fechaacademica[$i],'casa' => $casaacademica[$i] );
            array_push($informacionacademica, $dato);
        }
        $jsoninformacionacademica = json_encode($informacionacademica);

        $descripcionexperiencia = $_POST["descripcion_experiencia"];
        $fechaexperiencia = $_POST["fecha_experiencia"];
        $informacionexperiencia = $_POST["informacion_experiencia"];
        $longitud = count($descripcionexperiencia);
        $datoexperiencia = array();
        $experiencialaboral = array();
        for($i=0; $i<$longitud; $i++)
        {
            echo $descripcionexperiencia[$i];
            echo $fechaexperiencia[$i];
            echo $informacionexperiencia[$i];
            echo "<br>";
            $datoexperiencia= array('descripcion' => $descripcionexperiencia[$i],'fecha' => $fechaexperiencia[$i],'informacion' => $informacionexperiencia[$i] );
            array_push($experiencialaboral, $datoexperiencia);
        }
        $jsonexperiencialaboral = json_encode($experiencialaboral);

        $descripcionseminarios= $_POST["descripcion_seminarios"];
        $fechaseminarios = $_POST["fecha_seminarios"];
        $informacionseminarios = $_POST["informacion_seminarios"];
        $longitud = count($descripcionseminarios);
        $datoseminarios = array();
        $cursoseminarios = array();
        for($i=0; $i<$longitud; $i++)
        {
            echo $descripcionseminarios[$i];
            echo $fechaseminarios[$i];
            echo $informacionseminarios[$i];
            echo "<br>";
            $datoseminarios= array('descripcion' => $descripcionseminarios[$i],'fecha' => $fechaseminarios[$i],'informacion' => $informacionseminarios[$i] );
            array_push($cursoseminarios, $datoseminarios);
        }
        $jsoncurosyseminarios = json_encode($cursoseminarios);

        $descripcionestudio= $_POST["descripcion_estudio"];
        $fechaestudio = $_POST["fecha_estudio"];
        $informacionestudio = $_POST["informacion_estudio"];
        $longitud = count($descripcionestudio);
        $datosestudio = array();
        $otrosestudios = array();
        for($i=0; $i<$longitud; $i++)
        {
            echo $descripcionestudio[$i];
            echo $fechaestudio[$i];
            echo $informacionestudio[$i];
            echo "<br>";
            $datosestudio= array('descripcion' => $descripcionestudio[$i],'fecha' => $fechaestudio[$i],'informacion' => $informacionestudio[$i] );
            array_push($otrosestudios, $datosestudio);
        }
        $jsonotrosestudios = json_encode($otrosestudios);

       $educaciondocente = $_POST["otros_estudios"];
       $jsoneducaciondocente = json_encode ($educaciondocente);
    //    var_dump ($jsoneducaciondocente);
    /*--------------------- usuario id  -------------------*/
        $usuario_id=auth()->user()->id;
    /*--------------------- alamacenar en la tabla  -------------------*/

            $Docente = new docente;
            $Docente->id_persona = e($request->input('persona_id'));
            $Docente->rda = e($request->input('rda'));
            $Docente->especialidad = e($request->input('especialidad'));
            $Docente->resumen = e($request->input('resumen'));
            $Docente->reconocimiento = e($request->input('reconocimiento'));
            $Docente->formacion_academica = $jsoninformacionacademica;
            $Docente->experiencia_laboral = $jsonexperiencialaboral;
            $Docente->cursos_seminarios = $jsoncurosyseminarios;
            $Docente->otros_estudios = $jsonotrosestudios;
            $Docente->tic_educacion = $jsoneducaciondocente;
            $Docente->experiencia = e($request->input('experiencia'));
            
            $Docente->estado=1;
            if($Docente->save()):
                return back()->withErrors($validator)->with('message','Se registrado la información del docente')->with('typealert', 'success');
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
        $docente = Docente::find($id);
        $action = route('modificar_docente', ['id' => $id]);
        return view('docente.actualizar')->with(compact('action', 'docente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idv)
    {
            $id=$idv;
            $imagen_docente = ($_FILES['imagen_docente']['name']);//Nombre de la imagen

            $rules=[
                'resumen'      =>  'required',
                'formacion_academica' => 'required',
                'experiencia_laboral'=> 'required',
                'cursos_seminarios'      =>  'required',
                'tic_educacion'      =>  'required',
                'reconocimiento'      =>  'required',
                'otros_estudios'      =>  'required',
            ];
            $messages =[
                'resumen.required' => 'La descripcion del perfil del docente es requerido.',
                'formacion_academica.required' => 'La formacion academica del docente es requerido.',
                'experiencia_laboral.required' => 'El rol de experiencia_laboral es requerido.',
                'cursos_seminarios.required' => 'El del rol de cursos_seminarios es requerido.',
                'tic_educacion.required' => 'El del rol de tic de educacion es requerido.',
                'reconocimiento.required' => 'El del rol de reconocimiento es requerido.',
                'otros_estudios.required' => 'El del rol de otros estudios es requerido.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()):
                return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
            else:
                /*------------------- id usuario -----------------*/
                //$registroTablaroles = role::count(); $id=$registroTablaroles+1;
                /*--------------- almacenar imagen ---------------*/
               $formato = array('.png', '.jpeg');//extenciones validas
                $imagenDocente = ($_FILES['imagen_docente']['name']);//Nombre de la imagen
                $extencion = substr($imagenDocente, strrpos($imagenDocente, '.'));//Extencion de la imagen 
                if(!in_array($extencion, $formato)) {
                    $data['documento_general']='El tipo de archivo no esta permitido.';
                }else {
                    $ruta="./../public/img/roles_usuario/".$_FILES['imagen_docente']['name'];
                    $nombreArchivo = $_FILES['imagen_docente']['name'];
                    move_uploaded_file($_FILES['imagen_docente']['tmp_name'], $ruta);
                }
                $docente = new docente;
                $docente->resumen = e($request->input('resumen'));
                $docente->formacion_academica = e($request->input('formacion_academica'));
                $docente->imagen = $nombreArchivo;
                $docente->experiencia_laboral = e($request->input('experiencia_laboral'));
                $docente->cursos_seminarios = e($request->input('cursos_seminarios'));
                $docente->tic_educacion = e($request->input('tic_educacion'));
                $docente->reconocimiento = e($request->input('reconocimiento'));
                $docente->otros_estudios = e($request->input('otros_estudios'));
                $docente->estado = false;
                if($docente->save()):
                    return redirect()->route('listar_docente');
                    endif;
            endif;    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);
        $estado = $docente->estado;
        if ($estado==true){
            $docente                       = Docente::find($id);
            $docente->estado               = false;
            $docente->save();
            return redirect()->route('listar_docente');
        }elseif ($estado==false) {
            $docente                       = Docente::find($id);
            $docente->estado               = true;
            $docente->save();               
            return redirect()->route('listar_docente');
        }else{
            return redirect()->route('listar_docente');
        }
    }
}
