<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para crear la tabla de servicios
 * 
 * Esta tabla guarda todos los servicios que se ofrecen en la plataforma.
 * Incluye nombre, descripción, precio, duración y si está activo.
 */
return new class extends Migration
{
    /**
     * Ejecuta la migración - crea la tabla services
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();                                    // ID autoincremental
            $table->string('name');                          // Nombre del servicio
            $table->text('description');                     // Descripción larga
            $table->decimal('price', 10, 2);                 // Precio con 2 decimales
            $table->integer('duration');                     // Duración en minutos
            $table->boolean('is_active')->default(true);     // Por defecto está activo
            $table->timestamps();                            // created_at y updated_at
        });
    }

    /**
     * Revierte la migración - elimina la tabla services
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};

