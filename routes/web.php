<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas de los Módulos - Portfolio
|--------------------------------------------------------------------------
|
| Este archivo contiene las rutas relacionadas con los módulos de servicios
| y libro de reclamaciones. Incluye rutas públicas y administrativas.
|
*/

// ============================================
// MÓDULO DE SERVICIOS
// ============================================

// Rutas públicas - Páginas estáticas de servicios
Route::get('/servicios/terapia-psicologica', 'App\Http\Controllers\ServiceStaticController@terapiaPsicologica');
Route::get('/servicios/capsulas-salud-mental', 'App\Http\Controllers\ServiceStaticController@capsulasSaludMental');
Route::get('/servicios/espacios-grupales', 'App\Http\Controllers\ServiceStaticController@espaciosGrupales');

// Rutas del CRUD de Servicios - Requieren autenticación y rol de administrador
// Estas rutas deben estar dentro de un grupo con middleware 'auth'
// Ejemplo de uso en tu archivo routes/web.php principal:
/*
Route::middleware(['auth'])->group(function () {
    Route::resource('services', 'App\Http\Controllers\ServiceController');
});
*/

// ============================================
// MÓDULO DE LIBRO DE RECLAMACIONES
// ============================================

// Rutas públicas - Formulario de reclamaciones
Route::get('/libro-reclamaciones', ['as' => 'complaints.create', 'uses' => 'App\Http\Controllers\ComplaintController@create']);
Route::post('/libro-reclamaciones', ['as' => 'complaints.store', 'uses' => 'App\Http\Controllers\ComplaintController@store']);

// Rutas administrativas - Requieren autenticación y rol de administrador
// Estas rutas deben estar dentro de un grupo con middleware 'auth'
// Ejemplo de uso en tu archivo routes/web.php principal:
/*
Route::middleware(['auth'])->group(function () {
    Route::get('admin/complaints', ['as' => 'admin.complaints.index', 'uses' => 'App\Http\Controllers\AdminComplaintController@index']);
    Route::get('admin/complaints/{id}', ['as' => 'admin.complaints.show', 'uses' => 'App\Http\Controllers\AdminComplaintController@show']);
    Route::put('admin/complaints/{id}', ['as' => 'admin.complaints.update', 'uses' => 'App\Http\Controllers\AdminComplaintController@update']);
});
*/

// ============================================
// PÁGINA DE LÍNEAS DE EMERGENCIA
// ============================================

// Ruta pública - Página informativa de líneas de emergencia
Route::get('/lineas-emergencia', function () {
    return view('pages.emergency-lines');
});

// ============================================
// PÁGINA DE EJEMPLOS DE TOOLTIPS
// ============================================

// Ruta pública - Página de ejemplos de tooltips
Route::get('/ejemplos-tooltips', function () {
    return view('pages.tooltips-example');
});

// ============================================
// PÁGINA DE EJEMPLOS DE POPUPS
// ============================================

// Ruta pública - Página de ejemplos de popups y modales
Route::get('/ejemplos-popups', function () {
    return view('pages.free-meeting-popup-example');
});

// ============================================
// INTEGRACIÓN GOOGLE MEET
// ============================================

// Rutas de Google Meet (requieren configuración de Service Account)
// Estas rutas deben estar configuradas según tus necesidades
/*
Route::get('/google/meet/redirect', 'App\Http\Controllers\GoogleMeetController@redirectToGoogle');
Route::get('/google/meet/callback', 'App\Http\Controllers\GoogleMeetController@handleGoogleCallback');
Route::get('/google/meet/create', 'App\Http\Controllers\GoogleMeetController@createMeeting');
*/

// Ruta pública - Página de ejemplo de integración Google Meet
Route::get('/ejemplos-google-meet', function () {
    return view('pages.google-meet-example');
});


