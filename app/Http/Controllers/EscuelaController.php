<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\Archivo;
use App\Escuela;
use Carbon\carbon;
use DB;

class EscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $escuelas = Escuela::all();
        return view('escuela.listar')->with(compact('escuelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $escuela = new Escuela();
        $action = route('almacenar_escuela');
        return view('escuela.crear')->with(compact('action','escuela'));
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
            'nombre'      =>  'required',
            'direccion' => 'required',
            'email'=> 'required',
            'descripcion'      =>  'required',
            'direccion_imagen'  =>  'required',
        ];
        $messages =[
            'nombre.required' => 'El rol de usuario es requerido.',
            'direccion.required' => 'El rol de direccion es requerido.',
            'email.required' => 'El rol de email es requerido.',
            'descripcion.required' => 'La descripción del rol es requerido.',
            'direccion_imagen.required' => 'La imagen que representa al rol de usuario es requerido.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            /*------------------- id usuario -----------------*/
            //$registroTablaroles = role::count(); $id=$registroTablaroles+1;
            /*--------------- almacenar imagen ---------------*/
           $formato = array('.png', '.jpeg');//extenciones validas
            $imagenUsuario = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
            $extencion = substr($imagenUsuario, strrpos($imagenUsuario, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
            }else {
                $ruta="./../public/img/roles_usuario/".$_FILES['direccion_imagen']['name'];
                $nombreArchivo = $_FILES['direccion_imagen']['name'];
                move_uploaded_file($_FILES['direccion_imagen']['tmp_name'], $ruta);
            }
            $primaria=e($request->input('nivel_primario'));
            if ($primaria == ""){$primaria= false;}
            $secundaria=e($request->input('nivel_secundario'));
            if ($secundaria == ""){$secundaria= false;}
            $escuela = new escuela;
            $escuela->nombre = e($request->input('nombre'));
            $escuela->direccion = e($request->input('direccion'));
            $escuela->imagen = $nombreArchivo;
            $escuela->email = e($request->input('email'));
            $escuela->nivel_primario= $primaria;
            $escuela->nivel_secundario= $secundaria;
            $escuela->descripcion = e($request->input('descripcion'));
            $escuela->estado = false;
            if($escuela->save()):
                return redirect()->route('listar_escuela');
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
        $escuela = Escuela::find($id);
        $action = route('modificar_escuela', ['id' => $id]);
        return view('escuela.actualizar')->with(compact('action', 'escuela'));
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
            $direccion_imagen = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
         
            $rules=[
                'nombre'      =>  'required',
                'direccion' => 'required',
                'email'=> 'required',
                'descripcion'      =>  'required',
                'direccion_imagen'  =>  'required',
            ];
            $messages =[
                'nombre.required' => 'El rol de usuario es requerido.',
                'direccion.required' => 'El rol de direccion es requerido.',
                'email.required' => 'El rol de email es requerido.',
                'descripcion.required' => 'La descripción del rol es requerido.',
                'direccion_imagen.required' => 'La imagen del logo del colegio es requerido.',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()):
                return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
            else:
                /*--------------- almacenar imagen ---------------*/
                if($direccion_imagen != ""){
                    $formato = array('.png');//extenciones validas
                    $imagenEscuela = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
                    $extencion = substr($imagenEscuela, strrpos($imagenEscuela, '.'));//Extencion de la imagen 
                    if(!in_array($extencion, $formato)) {
                        $data['documento_general']='El tipo de archivo no esta permitido.';
                    }else {
                        $ruta="./../public/img/roles_usuario/".$_FILES['direccion_imagen']['name'];
                        move_uploaded_file($_FILES['direccion_imagen']['tmp_name'], $ruta);
                    }
                    $primaria=e($request->input('nivel_primario'));
                     if ($primaria == ""){$primaria= false;}
                     $secundaria=e($request->input('nivel_secundario'));
                    if ($secundaria == ""){$secundaria= false;}
                    $escuela = escuela::find($id);
                    $escuela->nombre = e($request->input('nombre'));
                    $escuela->direccion = e($request->input('direccion'));
                    $escuela->imagen = $imagenEscuela;
                    $escuela->email = e($request->input('email'));
                    $escuela->nivel_primario= $primaria;
                    $escuela->nivel_secundario= $secundaria;
                    $escuela->descripcion = e($request->input('descripcion'));
                    $escuela->estado = false;
                    if($escuela->save()):
                        // return back()->withErrors($validator)->with('message','Se actualizo los datos del usuario')->with('typealert', 'success');
                        return redirect()->route('listar_escuela');
                    endif;
                }else {
                    $primaria=e($request->input('nivel_primario'));
                    if ($primaria == ""){$primaria= false;}
                    $secundaria=e($request->input('nivel_secundario'));
                   if ($secundaria == ""){$secundaria= false;}
                   $escuela = escuela::find($id);
                   $escuela->nombre = e($request->input('nombre'));
                   $escuela->direccion = e($request->input('direccion'));
                   $escuela->imagen = $imagenEscuela;
                   $escuela->email = e($request->input('email'));
                   $escuela->nivel_primario= $primaria;
                   $escuela->nivel_secundario= $secundaria;
                   $escuela->descripcion = e($request->input('descripcion'));
                   $escuela->estado = false;
                   if($escuela->save()):
                    //    return back()->withErrors($validator)->with('message','Se actualizo los datos del usuario')->with('typealert', 'success');
                   return redirect()->route('listar_escuela');                  
                endif;
                }
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
        $escuela = Escuela::find($id);
        $estado = $escuela->estado;
        if ($estado==true){
            $escuela                       = Escuela::find($id);
            $escuela->estado               = false;
            $escuela->save();
            return redirect()->route('listar_escuela');
        }elseif ($estado==false) {
            $escuela                       = Escuela::find($id);
            $escuela->estado               = true;
            $escuela->save();
            return redirect()->route('listar_escuela');
        }else{
            return redirect()->route('listar_escuela');
        }
    }
}
