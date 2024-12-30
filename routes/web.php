<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DiagnosticController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\DiagnosticFormController;
use App\Http\Controllers\Admin\AnalysisController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\PasswordController;

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
    //dd(\Hash::make('test1234'));
    return view('principal.home');
});

Route::view('formulario', 'principal.form');

Auth::routes();
Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('{provider}/callback', [LoginController::class,'handleProviderCallback']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'noCache']], function() {
    Route::view('/', 'admin/dashboard');

    //perfil
    Route::view('perfil/editar','admin.editar-perfil');
    Route::put('perfil/editar', [ProfileController::class, 'update']);

    //contraseña
    Route::view('perfil/cambiar-contrasena','admin.cambiar-contrasena');
    Route::put('perfil/cambiar-contrasena', [PasswordController::class, 'update']);
    
    
    //permisos
    Route::get('permisos', [PermissionController::class, 'index']);
    Route::view('agregar-permisos', 'admin.permisos.crear');
    Route::post('permiso/crear', [PermissionController::class, 'save']);
    Route::get('permiso/{id}/editar', [PermissionController::class, 'edit']);
    Route::put('permiso/{id}/actualizar', [PermissionController::class, 'update']);
    Route::delete('permiso/eliminar/{id}', [PermissionController::class, 'delete']);


    //roles
    Route::get('roles', [RoleController::class, 'index']);
    Route::view('agregar-roles', 'admin.roles.crear');
    Route::post('roles/crear', [RoleController::class, 'save']);
    Route::get('roles/{id}/editar', [RoleController::class, 'edit']);
    Route::put('roles/{id}/actualizar', [RoleController::class, 'update']);
    Route::delete('roles/eliminar/{id}', [RoleController::class, 'delete']);

    //Usuarios
    Route::get('usuarios', [UserController::class, 'index']);

    //pacientes
    Route::get('pacientes', [PatientController::class, 'index']);
    Route::view('agregar-paciente', 'admin.pacientes.crear');
    Route::post('paciente/crear', [PatientController::class, 'save']);
    Route::get('paciente/{id}/editar', [PatientController::class, 'edit']);
    Route::put('paciente/{id}/actualizar', [PatientController::class, 'update']);
    Route::delete('paciente/eliminar/{id}', [PatientController::class, 'delete']);

    //Diagnosticos
    Route::get('diagnosticos', [DiagnosticController::class, 'index']);
    Route::view('agregar-diagnostico', 'admin.diagnostico.crear');
    Route::post('diagnostico/crear', [DiagnosticController::class, 'save']);
    Route::get('diagnostico/{id}/editar', [DiagnosticController::class, 'edit']);
    Route::put('diagnostico/{id}/actualizar', [DiagnosticController::class, 'update']);
    Route::delete('diagnostico/eliminar/{id}', [DiagnosticController::class, 'delete']);

    //Preguntas
    Route::get('preguntas', [QuestionController::class, 'index']);
    Route::view('agregar-pregunta', 'admin.preguntas.crear');
    Route::post('pregunta/crear', [QuestionController::class, 'save']);
    Route::get('pregunta/{id}/editar', [QuestionController::class, 'edit']);
    Route::put('pregunta/{id}/actualizar', [QuestionController::class, 'update']);
    Route::delete('pregunta/eliminar/{id}', [QuestionController::class, 'delete']);

    //Formularios
    Route::get('formularios', [DiagnosticFormController::class, 'index']);
    Route::get('agregar-formulario', [DiagnosticFormController::class, 'create']);
    Route::post('formulario/crear', [DiagnosticFormController::class, 'save']);
    Route::get('formulario/{id}/editar', [DiagnosticFormController::class, 'edit']);
    Route::post('formulario/{id}/actualizar', [DiagnosticFormController::class, 'update']);
    Route::delete('formulario/eliminar/{id}', [DiagnosticFormController::class, 'delete']);

    //Formularios
    Route::get('analisis', [AnalysisController::class, 'index']);
    Route::get('agregar-analisis', [AnalysisController::class, 'create']);
    Route::post('analisis/crear', [AnalysisController::class, 'save']);
    Route::get('analisis/{id}/editar', [AnalysisController::class, 'edit']);
    Route::put('analisis/{id}/actualizar', [AnalysisController::class, 'update']);
    Route::delete('analisis/eliminar/{id}', [AnalysisController::class, 'delete']);

    Route::get('formulario-analisis/{id}', [AnalysisController::class, 'form']);
    Route::get('analisis-formularios/{id}', [AnalysisController::class, 'indexforms']);
    Route::post('guardar-formulario/{id}', [AnalysisController::class, 'createform']);

    //Password
    Route::view('cambiar-contrasena', 'principal.cambiar-contrasena');
    Route::post('cambiar-contrasena', 'Auth\PasswordController@update');

});