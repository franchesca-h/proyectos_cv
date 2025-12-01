<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Modelo para la gestión de servicios de la plataforma
 * 
 * Este modelo maneja toda la información de los servicios que se ofrecen.
 * Incluye nombre, descripción, precio y duración como datos básicos
 * necesarios para mostrar los servicios a los usuarios.
 */
class Service extends Model
{
    use HasFactory;

    // Campos que se pueden llenar masivamente (por seguridad)
    protected $fillable = [
        'name',        // Nombre del servicio
        'slug',        // URL amigable
        'description', // Descripción detallada
        'price',       // Precio
        'duration',    // Duración en minutos
        'is_active'    // Si está activo o no
    ];

    // Conversiones automáticas de tipos de datos
    protected $casts = [
        'is_active' => 'boolean',  // Convierte 1/0 a true/false
        'price' => 'decimal:2'     // Siempre 2 decimales para el precio
    ];

    /**
     * Boot del modelo - genera slug automáticamente
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });

        static::updating(function ($service) {
            if ($service->isDirty('name') && empty($service->slug)) {
                $service->slug = Str::slug($service->name);
            }
        });
    }
}

