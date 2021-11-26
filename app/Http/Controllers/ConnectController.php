<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator, Hash, Auth;
use App\User;
use App\Role;
use App\Persona;
use DB;
use Carbon\carbon;


class ConnectController extends Controller
{   
    public function getLogin(){
        return view('connect.login');
    }
    public function postLogin(Request $request){
        $rules=[
            'name'      =>  'required',
            'password'  =>  'required|min:8',
        ];
        $messages =[
            'name.required' => 'Su correo electronico es requerido.',
            'password.required'  =>  'Por favor ingrese una contraseña.',
            'password.min'  =>  'La contraseña debe tener al menos 8 caracteres.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            
            if (Auth::attempt(['name' => $request->input('name'), 'password'=>$request->input('password')])){
                $rol=DB::table('users')
                    ->select('roles.nobre')
                    ->where('users.name', '=', $request->input('name'))
                    ->join('roles','users.role','roles.id')
                    ->first()->nobre;
                if($rol==="Administrador"){
                    return view('connect.ad');
                }   
                if($rol==="Estudiante"){
                    return view('connect.alumno');
                }   
            }else{
                return back()->withErrors($validator)->with('message','Correo electronico o contraseña incorrectos.')->with('typealert', 'danger');
            }
        endif;

    } 

    public function getRegistro_usuario(){  
        return view('adminperfil.registro_usuario');
    }

    public function postAlmacenar_usuario(REquest $request){
        $rules=[
            'name'      =>  'required',
            'email'      =>  'required|email|unique:users,email',
            'password'  =>  'required|min:8',
            'rol'  =>  'required',
            'direccion_imagen'  =>  'required',
            'persona_id'  =>  'required',
        ];
 
        $messages =[
            'name.required' => 'El usuario es requerido.',
            'correo.required' => 'Su correo electronico es requerido.',
            'correo.email'  =>  'El formato de su correo electronico es invalido.',
            'correo.unique'  =>  'Ya existe un usuario registrado con este correo electronico.',
            'password.required'  =>  'Por favor ingrese una contraseña.',
            'password.min'  =>  'La contraseña debe tener al menos 8 caracteres.',
            'rol.required'  =>  'Es necesario seleccionar un perfil para el usuario.',
            'direccion_imagen.required'  =>  'Es necesario la imagen del usuario.',
            'persona_id.required'  =>  'Es seleccionar una persona.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            /*------------------- id usuario -----------------*/
            $registroTablaUsers = user::count(); $id=$registroTablaUsers+1;
            /*--------------- almacenar imagen ---------------*/
            $formato = array('.png', '.jpeg', '.jpg','.PNG', '.JPEG', '.JPG');//extenciones validas
            $imagenUsuario = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
            $extencion = substr($imagenUsuario, strrpos($imagenUsuario, '.'));//Extencion de la imagen 
            if(!in_array($extencion, $formato)) {
                $data['documento_general']='El tipo de archivo no esta permitido.';
                $nombreArchivo = $_FILES['direccion_imagen']['name'];
            }else {
                $ruta="./../public/img/perfil_usuario/".$_FILES['direccion_imagen']['name'];
                $nombreArchivo = $_FILES['direccion_imagen']['name'];
                move_uploaded_file($_FILES['direccion_imagen']['tmp_name'], $ruta);
            }
            $user = new user;
            $user->id = $id;
            $user->name = e($request->input('name'));
            $user->role = e($request->input('rol'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            $user->estado = false;
            $user->direccion_imagen = $nombreArchivo;
            $user->persona_id = e($request->input('persona_id'));
            if($user->save()):
                return back()->withErrors($validator)->with('message','Usuario registrado')->with('typealert', 'success');
            endif;
        endif;
    }
    public function getRegistro_Usuario_Adm(){
        $usuarios = User::all();
        $personas = Persona::all();
        return view('usuario.crear')->with(compact('usuarios','personas'));
    }
    
    public function getListar_Usuario(){
        $usuarios = User::all();
        return view('usuario.listar')->with(compact('usuarios'));
    }
    public function actualizarDatosUsuario($id){
        $usuario = User::find($id);
        $personas = Persona::all();
        return view('usuario.actualizar')->with(compact('usuario', 'personas'));
    }

    public function modificarDatosUsuarios(Request $request){
        $id=intval($request->input('id'));
        $imagenUsuario = ($_FILES['imagen']['name']);//Nombre de la imagen
     
        $rules=[
            'name'      =>  'required',
            'email'      =>  'required|email',
            'rol'  =>  'required',
        ];
 
        $messages =[
            'name.required' => 'El usuario es requerido.',
            'email.required' => 'Su correo electronico es requerido.',
            'email.email'  =>  'El formato de su correo electronico es invalido.',
            'rol.required'  =>  'Es necesario seleccionar un perfil para el usuario.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
        else:
            /*--------------- almacenar imagen ---------------*/
            if($imagenUsuario != ""){
                $formato = array('.png');//extenciones validas
                $imagenUsuario = ($_FILES['imagen']['name']);//Nombre de la imagen
                $extencion = substr($imagenUsuario, strrpos($imagenUsuario, '.'));//Extencion de la imagen 
                if(!in_array($extencion, $formato)) {
                    $data['documento_general']='El tipo de archivo no esta permitido.';
                }else {
                    $ruta="./../public/img/perfil_usuario/".$_FILES['imagen']['name'];
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
                }
                $user = user::find($id);
                $user->name = $request->input('name');
                $user->role = $request->input('rol');
                $user->email = $request->input('email');
                $user->direccion_imagen = $imagenUsuario;
                if($user->save()):
                    return back()->withErrors($validator)->with('message','Se actualizo los datos del usuario')->with('typealert', 'success');
                endif;
            }else {
                $user = user::find($id);
                $user->name = $request->input('name');
                $user->role = $request->input('rol');
                $user->email = $request->input('email');    
                if($user->save()):
                    return back()->withErrors($validator)->with('message','Se actualizo los datos del usuario')->with('typealert', 'success');
                endif;
            }
        endif;
    }

    public function estadoDatosUsuarios($id){
        $usuario = User::find($id);
        $estado = $usuario->estado;
        if ($estado==true){
            $usuario                       = User::find($id);
            $usuario->estado               = false;
            $usuario->save();
            return redirect()->route('listar_usuario');
        }elseif ($estado==false) {
            $usuario                       = User::find($id);
            $usuario->estado               = true;
            $usuario->save();
            return redirect()->route('listar_usuario');
        }else{
            return redirect()->route('listar_usuario');
        }
    }
    public function registroAdministrador(Request $request){
        $rules = [
            'nombre'=>'required',
            'genero'=>'required',
            'ci'=>'numeric|required|min:7',
            'fecha_nacimiento'=>'required',
            'celular'=>'numeric|required|min:8',
            'correo_electronico'=>'required'
        ];
        $messages = [
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
            // Persona::insert($persona);
            // return redirect()->route('listar_persona');
            if(Persona::insert($persona)):
                $rules=[
                    'name'      =>  'required',
                    'password'  =>  'required|min:8',
                    'rol'  =>  'required',
                    'direccion_imagen'  =>  'required',
                ];
         
                $messages =[
                    'name.required' => 'El usuario es requerido.', 
                    'password.required'  =>  'Por favor ingrese una contraseña.',
                    'password.min'  =>  'La contraseña debe tener al menos 8 caracteres.',
                    'rol.required'  =>  'Es necesario seleccionar un perfil para el usuario.',
                    'direccion_imagen.required'  =>  'Es necesario la imagen del usuario.',
                ];
        
                $validator = Validator::make($request->all(), $rules, $messages);
                if($validator->fails()):
                    echo("formulario no esta validado");
                    // return back()->withErrors($validator)->with('message','Se ha producido un error de validacion')->with('typealert', 'danger');
                else:
                    /*------------------- id usuario -----------------*/
                    $registroTablaUsers = user::count(); $id=$registroTablaUsers+1;
                    /*--------------- almacenar imagen ---------------*/
                    $formato = array('.png', '.jpeg');//extenciones validas
                    $imagenUsuario = ($_FILES['direccion_imagen']['name']);//Nombre de la imagen
                    $extencion = substr($imagenUsuario, strrpos($imagenUsuario, '.'));//Extencion de la imagen 
                    if(!in_array($extencion, $formato)) {
                        $data['documento_general']='El tipo de archivo no esta permitido.';
                        $nombreArchivo = ($_FILES['direccion_imagen']['name']);
                    }else {
                        $ruta="./../public/img/perfil_usuario/".$_FILES['direccion_imagen']['name'];
                        $nombreArchivo = $_FILES['direccion_imagen']['name'];
                        move_uploaded_file($_FILES['direccion_imagen']['tmp_name'], $ruta);
                    }
                    $user = new user;
                    $user->id = $id;
                    $user->name = e($request->input('name'));
                    $user->role = e($request->input('rol'));
                    $user->email = e($request->input('correo_electronico'));
                    $user->password = Hash::make($request->input('password'));
                    $user->estado = false;
                    $user->direccion_imagen = $nombreArchivo;
                    $user->persona_id = e($request->input('ci'));
                    // var_dump($user);
                    if($user->save()):
                        return view('connect.login');
                    endif;
                endif;
            endif;
        endif;

       
    }
    public function logout(Request $request){
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        Auth::logout();
        return redirect(route('login'));
    }
}
