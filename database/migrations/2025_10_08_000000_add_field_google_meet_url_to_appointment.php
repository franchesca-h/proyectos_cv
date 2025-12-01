<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migración para agregar campo de URL de Google Meet a la tabla appointments
 * 
 * Esta migración agrega el campo google_meet_url para almacenar
 * el enlace de la reunión de Google Meet asociada a una cita.
 */
class AddFieldGoogleMeetUrlToAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('google_meet_url')->nullable()->after('type_product');
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
            $table->dropColumn('google_meet_url');
        });
    }
}

