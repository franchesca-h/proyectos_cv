<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

/**
 * Controlador para gestionar los servicios de la plataforma
 * 
 * Este controlador maneja todo el CRUD (crear, leer, actualizar, eliminar) 
 * de los servicios. Solo los administradores pueden acceder a esta función
 */
class ServiceController extends Controller
{
    /**
     * Constructor - Requiere que el usuario esté logueado
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Verifica que el usuario sea administrador
     * 
     * Solo los usuarios con roles_id = 1 (administradores) pueden 
     * gestionar servicios. Si no es admin, muestra error 403.
     */
    private function checkAdminAccess()
    {
        if (auth()->user()->roles_id !== 1) {
            abort(403, 'Acceso denegado. Solo los administradores pueden gestionar servicios.');
        }
    }

    /**
     * Muestra la lista de todos los servicios
     */
    public function index()
    {
        $this->checkAdminAccess();
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Muestra el formulario para crear un nuevo servicio
     */
    public function create()
    {
        $this->checkAdminAccess();
        return view('services.create');
    }

    /**
     * Guarda un nuevo servicio en la base de datos
     * 
     * Primero valida que todos los campos estén correctos
     * y luego crea el servicio. Si todo sale bien, redirige con un mensaje de éxito.
     */
    public function store(Request $request)
    {
        $this->checkAdminAccess();
        
        // Validaciones
        $request->validate([
            'name' => 'required|string|max:255',        
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'description' => 'required|string',        
            'price' => 'required|numeric|min:0',        
            'duration' => 'required|integer|min:1',     
            'is_active' => 'boolean'                    
        ]);

        // Crear el servicio con los datos del formulario
        Service::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('services.index')->with('success', 'Servicio creado exitosamente.');
    }

    /**
     * Muestra los detalles de un servicio específico
     */
    public function show(Service $service)
    {
        $this->checkAdminAccess();
        return view('services.show', compact('service'));
    }

    /**
     * Muestra el formulario para editar un servicio
     */
    public function edit(Service $service)
    {
        $this->checkAdminAccess();
        return view('services.edit', compact('service'));
    }

    /**
     * Actualiza un servicio existente
     */
    public function update(Request $request, Service $service)
    {
        $this->checkAdminAccess();
        
        // Validaciones
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        // Actualizar el servicio con los nuevos datos
        $service->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()->route('services.index')->with('success', 'Servicio actualizado exitosamente.');
    }

    /**
     * Elimina un servicio
     */
    public function destroy(Service $service)
    {
        $this->checkAdminAccess();
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Servicio eliminado exitosamente.');
    }
}

