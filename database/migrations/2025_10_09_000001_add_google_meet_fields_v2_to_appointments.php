<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para agregar campos adicionales de Google Meet
 * 
 * Esta migración agrega campos adicionales para una integración completa
 * con Google Meet: event_id, hangout_link y fecha de creación del evento.
 */
class AddGoogleMeetFieldsV2ToAppointments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            // Verificar si google_meet_url ya existe (de la migración anterior)
            if (!Schema::hasColumn('appointments', 'google_meet_url')) {
                $table->text('google_meet_url')->nullable()->after('type_product');
            }
            
            // Agregar campos adicionales para versión completa
            $table->string('google_event_id')->nullable()->after('google_meet_url');
            $table->text('google_hangout_link')->nullable()->after('google_event_id');
            $table->timestamp('google_event_created_at')->nullable()->after('google_hangout_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn([
                'google_event_id', 
                'google_hangout_link', 
                'google_event_created_at'
            ]);
            // Mantener google_meet_url para compatibilidad con versión base
        });
    }
}

