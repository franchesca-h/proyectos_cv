<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para crear la tabla de roles
 * 
 * Esta migración crea una tabla básica de roles para el sistema de autenticación.
 * Si ya tienes una tabla de roles, puedes omitir esta migración.
 */
class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('description')->nullable();
                $table->timestamps();
            });

            // Insertar roles básicos
            DB::table('roles')->insert([
                ['id' => 1, 'name' => 'Administrador', 'description' => 'Acceso completo al sistema', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'name' => 'Usuario', 'description' => 'Usuario estándar', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}

