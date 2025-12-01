<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->date('claim_date');
            $table->string('consumer_name');
            $table->text('consumer_address');
            $table->enum('document_type', ['DNI', 'Documento de Extranjería']);
            $table->string('document_number');
            $table->string('phone');
            $table->string('email');
            $table->enum('product_type', ['Producto', 'Servicio']);
            $table->decimal('claimed_amount', 10, 2);
            $table->text('product_description');
            $table->text('claim_detail');
            $table->boolean('conformity')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}

