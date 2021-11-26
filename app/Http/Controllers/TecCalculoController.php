<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Archivo;
use App\TecCalculo;
use Carbon\carbon;
use DB;

class TecCalculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecCalculo = DB::table('tec_calculos')
        ->join('users', 'users.id', '=' ,'tec_calculos.usuario_id')
        ->select('tec_calculos.id','tec_calculos.titulo','tec_calculos.descripcion','tec_calculos.nivel','tec_calculos.puntaje','tec_calculos.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('tec_calculo.listar')->with(compact('tecCalculo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tec_calculo.create');
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
            'tabla_pregunta'  =>  'required',

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
        // echo ('no esta validado');
        else: 
            $validator = Validator::make($request->all(), $rules, $messages);
            /*------------- (id) tabla concentracions ------------*/
            // $registroTablaTecConcentracion = tecConcentracion::count(); $id=$registroTablaTecConcentracion+1;
            /*--------------------- usuario id  -------------------*/
            $usuario_id=auth()->user()->id;
            $curso_id=1;
            $tabla_respuesta= "hola";
            $respuesta_json=json_encode($tabla_respuesta);

            /*---- json de la matriz de calculo---*/
            $matrizEmparejamientoArray=[];
            // $celdaPregunta=[];
            $celdaRespuesta="";
            $celdaPregunta="";
            $pregunta = $request->input('pregunta');
            $respuesta = $request->input('respuesta');
            $longitud = count($pregunta);
            for($i=0; $i<$longitud; $i++){
               $celdaPregunta=$pregunta[$i];
               $celdaRespuesta=$respuesta[$i];

            //    $celdaPreguntaArray="";
            //    echo "$celdaPregunta";
            //    $celdaPreguntaArray=array("$celdaPregunta"=>"$i");
               array_push($matrizEmparejamientoArray,$celdaPregunta);
               array_push($matrizEmparejamientoArray,$celdaRespuesta);


            }
            $matrizEmparejamiento = json_encode($matrizEmparejamientoArray);
            // print_r($matrizEmparejamientoArray);
            /*------------------ almacenar video ------------------*/
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
            // /*------------------- json artistas ------------------*/
            //$artistasCantante    =   json_encode($_POST["artistas"]); var_dump($artistasCantante);
            /*------------------- json palabras ------------------*/
            // $palabraLetraCancion =   json_encode($_POST["palabras"]); var_dump($palabraLetraCancion);
            /*--------------- almacenar en la tabla --------------*/
            $tecCalculo = new tecCalculo;
            $tecCalculo->titulo = e($request->input('titulo'));
            $tecCalculo->imagen = $nombreArchivo;
            $tecCalculo->descripcion = e($request->input('descripcion'));
            $tecCalculo->nivel = e($request->input('nivel'));
            $tecCalculo->puntaje = e($request->input('puntaje'));
            $tecCalculo->tiempo = e($request->input('tiempo'));
            $tecCalculo->curso_id = $curso_id;
            $tecCalculo->fecha_inicio = e($request->input('fecha_inicio'));
            $tecCalculo->fecha_fin = e($request->input('fecha_fin'));
            $tecCalculo->usuario_id = $usuario_id;
            $tecCalculo->tabla_pregunta = e($request->input('tabla_pregunta'));
            $tecCalculo->tabla_respuesta =$matrizEmparejamiento;
            $tecCalculo->estado=1;
            if($tecCalculo->save()):
                return back()->withErrors($validator)->with('message','Tecnica del calculo ha sido registrado')->with('typealert', 'success');
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
        $tecCalculo = TecCalculo::find($id);
        $action = route('modificar_editar_tec_calculo', ['id' => $id]);
        return view('tec_calculo.actualizar')->with(compact('action', 'tecCalculo'));
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
        $estado_tec_calculo = TecCalculo::find($id);
        $estadoActual = $estado_tec_calculo->estado;
        
        if ($estadoActual==true){
            $tecCalculoEstado                       = TecCalculo::find($id);
            $tecCalculoEstado->estado               = false;
            $tecCalculoEstado->save();
            return redirect()->route('listar_tec_calculo');
        }elseif ($estadoActual==false) {
            $tecCalculoEstado                       = TecCalculo::find($id);
            $tecCalculoEstado->estado               = true;
            $tecCalculoEstado->save();
            return redirect()->route('listar_tec_calculo');
        }else{
            return redirect()->route('listar_tec_calculo');
        }
    }

    public function tecnicaCalculos(){
        $tecCalculo = DB::table('tec_calculos')
        ->join('users', 'users.id', '=' ,'tec_calculos.usuario_id')
        ->select('tec_calculos.id','tec_calculos.titulo','tec_calculos.descripcion','tec_calculos.nivel','tec_calculos.puntaje','tec_calculos.estado as estadoTEC','users.estado','users.name')
        ->get();
        return view('tec_calculo.listar_juego_emparejamiento')->with(compact('tecCalculo'));
    }
    public function gameEmparejamiento(){
         return view('tec_calculo.juego_emparejamiento'); 
    }
}
