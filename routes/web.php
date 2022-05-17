<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Router Auth or auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login_user', 'ConnectController@postLogin')->name('login_user');
Route::get('/registro_usuario', 'ConnectController@getRegistro_usuario')->name('registro_usuario');
Route::post('/almacenar_usuario', 'ConnectController@postAlmacenar_usuario')->name('almacenar_usuario');
Route::get('/listar_usuario', 'ConnectController@getListar_Usuario')->name('listar_usuario');
Route::get('/registro_usuario_admin', 'ConnectController@getRegistro_Usuario_Adm')->name('registro_usuario_admin');
Route::get('/actualizar_registro_usuario{id}', 'ConnectController@actualizarDatosUsuario')->name('actualizar_registro_usuario');
Route::post('/modificar_datos_usuario', 'ConnectController@modificarDatosUsuarios')->name('modificar_datos_usuario');
Route::get('/estado_datos_usuario{id}', 'ConnectController@estadoDatosUsuarios')->name('estado_datos_usuario');
Route::post('/registro_administrador', 'ConnectController@registroAdministrador')->name('registro_administrador');
Route::get('/cerrar_session', 'ConnectController@logout')->name('cerrar_session');
Route::get('/log_user', 'ConnectController@activityLoginLogOut')->name('log_user');

//Router admin
Route::get('/ad', 'AdministradorController@index')->name('ad');

//Router estudiante
Route::get('/crear_estudiante', 'EstudianteController@index')->name('crear_estudiante');
Route::get('/almacenar_estudiante', 'EstudianteController@create')->name('almacenar_estudiante');

//Router persona
Route::get('/listar_persona', 'PersonaController@index')->name('listar_persona');
Route::get('/almacenar_persona', 'PersonaController@create')->name('almacenar_persona');
Route::get('/registrar_persona', 'PersonaController@store')->name('registrar_persona');
Route::get('/editar_persona{id}', 'PersonaController@edit')->name('editar_persona');
Route::get('/modificar_registro{id}', 'PersonaController@update')->name('modificar_registro');
Route::get('/estado_registro{id}', 'PersonaController@destroy')->name('estado_registro');

//rol usuario sistema
Route::get('/listar_role', 'RoleController@index')->name('listar_role');
Route::get('/roles_usuario', 'RoleController@index')->name('roles_usuario');
Route::post('/crear_rol_usuario', 'RoleController@store')->name('crear_rol_usuario');
Route::post('/modificar_rol_usuario', 'RoleController@update')->name('modificar_rol_usuario');
Route::get('/estado_role{id}', 'RoleController@destroy')->name('estado_role');

/*-------------------------------- TECNICA DE LA MEMORIA  --------------------------------*/
//Crear tecnica
Route::get('/listar_tec_cadena','TecCadenaController@index')->name('listar_tec_cadena');
Route::get('/crear_tec_cadena','TecCadenaController@create')->name('crear_tec_cadena');
Route::post('/almacenar_tec_cadena','TecCadenaController@store')->name('almacenar_tec_cadena');
Route::get('/mostrar_tec_cadena{id}','TecCadenaController@show')->name('mostrar_tec_cadena');
Route::get('/estado_tcadena{id}', 'TecCadenaController@destroy')->name('estado_tcadena');
Route::get('/listar_tecnicas', 'TecCadenaController@tecnicaCadenas')->name('listar_tecnicas');
Route::get('/juego_cadena{id}', 'TecCadenaController@game')->name('juego_cadena');
Route::get('/calificacion_estudiante{id}', 'TecCadenaController@qualification')->name('calificacion_estudiante');

/*-------------------------------- TECNICA DE LA CONCENTRACION  --------------------------------*/
Route::get('/listar_tec_concentracion','TecConcentracionController@index')->name('listar_tec_concentracion');
Route::get('/crear_tec_concentracion','TecConcentracionController@create')->name('crear_tec_concentracion');
Route::post('/almacenar_tec_concentracion','TecConcentracionController@store')->name('almacenar_tec_concentracion');
Route::get('/mostrar_tec_concentracion{id}','TecConcentracionController@edit')->name('mostrar_tec_concentracion');
// Route::post('/modificar_tec_concentracion{id}', 'TecConcentracionController@update')->name('modificar_tec_concentracion');
Route::get('/estado_tconcentracion{id}', 'TecConcentracionController@destroy')->name('estado_tconcentracion');
Route::get('/listar_tecnicas_cocentracion', 'TecConcentracionController@tecnicaConcentracion')->name('listar_tecnicas_cocentracion');
Route::get('/juego_video{GameTecnicaId}', 'TecConcentracionController@game')->name('juego_video');

/*-------------------------------- TECNICA CALCULO  --------------------------------*/
Route::get('/listar_tec_calculo','TecCalculoController@index')->name('listar_tec_calculo');
Route::get('/crear_tec_calculo','TecCalculoController@create')->name('crear_tec_calculo');
Route::post('/almacenar_tec_calculo','TecCalculoController@store')->name('almacenar_tec_calculo');
Route::get('/mostrar_tec_calculo{id}', 'TecCalculoController@edit')->name('mostrar_tec_calculo');
// Route::post('/modificar_escuela{id}', 'EscuelaController@update')->name('modificar_escuela');
Route::get('/estado_tec_calculo{id}', 'TecCalculoController@destroy')->name('estado_tec_calculo');
Route::get('/listar_tecnicas_calculo', 'TecCalculoController@tecnicaCalculos')->name('listar_tecnicas_calculo');
Route::get('/juego_emparejamiento{GameTecnicaId}', 'TecCalculoController@gameEmparejamiento')->name('juego_emparejamiento');

/*-------------------------------------- PRUEBA GENERAL  ---------------------------------------*/
Route::get('/listar_prueba','PruebaController@index')->name('listar_prueba');
Route::get('/crear_prueba','PruebaController@create')->name('crear_prueba');
Route::post('/almacenar_prueba','PruebaController@store')->name('almacenar_prueba');
Route::get('/estado_prueba{id}', 'PruebaController@destroy')->name('estado_prueba');
Route::get('/prueba_estudiante{prueba}','PruebaController@pruebaAlumno')->name('prueba_estudiante');

/*-------------------------------- ESCUELA  --------------------------------*/
Route::get('/listar_escuela','EscuelaController@index')->name('listar_escuela');
Route::get('/crear_escuela','EscuelaController@create')->name('crear_escuela');
Route::post('/almacenar_escuela','EscuelaController@store')->name('almacenar_escuela');
Route::get('/editar_escuela{id}', 'EscuelaController@edit')->name('editar_escuela');
Route::post('/modificar_escuela{id}', 'EscuelaController@update')->name('modificar_escuela');
Route::get('/estado_escuela{id}', 'EscuelaController@destroy')->name('estado_escuela');

/*-------------------------------- DOCENTE  --------------------------------*/
Route::get('/listar_docente','DocenteController@index')->name('listar_docente');
Route::get('/crear_docente','DocenteController@create')->name('crear_docente');
Route::post('/almacenar_docente','DocenteController@store')->name('almacenar_docente');
Route::get('/mostrar_docente{id}', 'DocenteController@edit')->name('mostrar_docente');
// Route::post('/modificar_escuela{id}', 'EscuelaController@update')->name('modificar_escuela');
Route::get('/estado_docente{id}', 'DocenteController@destroy')->name('estado_docente');

/*-------------------------------- ALUMNO --------------------------------*/
Route::get('/listar_alumno','AlumnoController@index')->name('listar_alumno');
Route::get('/crear_alumno','AlumnoController@create')->name('crear_alumno');
Route::post('/almacenar_alumno','AlumnoController@store')->name('almacenar_alumno');
Route::get('/mostrar_alumno{id}', 'AlumnoController@edit')->name('mostrar_alumno');
// Route::post('/modificar_escuela{id}', 'EscuelaController@update')->name('modificar_escuela');
Route::get('/estado_alumno{id}', 'AlumnoController@destroy')->name('estado_alumno');
Route::get('/historial_estudiante{rude}', 'AlumnoController@historial_estudiante')->name('historial_estudiante');
Route::get('/listar_estudiante','AlumnoController@listarestudiante')->name('listar_estudiante');

/*----------------------------------------------- CALIFICACIÓN ------------------------------------------------*/
Route::post('/almacenar_calificacion','CalificaionController@store')->name('almacenar_calificacion');

/*-------------------------------------------  TECNICA DEL VINCULO --------------------------------------------*/
Route::get('/listar_tec_vinculo','TecVinculoController@index')->name('listar_tec_vinculo');
Route::get('/crear_tec_vinculo','TecVinculoController@create')->name('crear_tec_vinculo');
Route::post('/almacenar_tec_vinculo','TecVinculoController@store')->name('almacenar_tec_vinculo');
Route::get('/listar_tecnicas_vinculo', 'TecVinculoController@tecnicaVinculo')->name('listar_tecnicas_vinculo');
Route::get('/juego_vinculo', 'TecVinculoController@game')->name('juego_vinculo');

/*----------------------------------- INFORMACION DEL INDEX ------------------------------------------*/
Route::get('/memoria', 'ConnectController@memoria')->name('memoria');
Route::get('/concentracion', 'ConnectController@concentracion')->name('concentracion');
Route::get('/calculo', 'ConnectController@calculo')->name('calculo');
Route::get('/informacioncal', 'ConnectController@informacioncal')->name('informacioncal');
Route::get('/informacioncon', 'ConnectController@informacioncon')->name('informacioncon');
Route::get('/informacionme', 'ConnectController@informacionme')->name('informacionme');
Route::get('/inicio', function () {
    return view('welcome');
});

/*----------------------------------- INFORMACION DEL ADMIN ------------------------------------------*/
Route::get('/PlantelDocente', 'ConnectController@PlantelDocente')->name('PlantelDocente');


/*---------------------------------- LOG DEL SISTEMA ----------------------------------*/
Route::get('/log_user', 'ConnectController@activityLoginLogOut')->name('log_user');

/*---------------------------------- COPIAS DE SEGURIDAD ----------------------------------*/
Route::get('/copia_seguridad', 'ConnectController@backup')->name('copia_seguridad');

/*perfil del director*/
Route::get('/director_listar_alumno','AlumnoController@listaralumno')->name('director_listar_alumno');
Route::get('/progreso_estudiante{id}', 'AlumnoController@progreso_estudiante')->name('progreso_estudiante');
Route::get('/unidad_educativa','EscuelaController@inforcion_colegio')->name('unidad_educativa');
Route::get('/crear_escuela','EscuelaController@create')->name('crear_escuela');
Route::get('/misionUE','EscuelaController@misionUE')->name('misionUE');
Route::get('/visionUE','EscuelaController@visionUE')->name('visionUE');
