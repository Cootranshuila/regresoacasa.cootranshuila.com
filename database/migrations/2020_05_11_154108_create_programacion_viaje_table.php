<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramacionViajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programacion_viaje', function (Blueprint $table) {
            $table->id();

            $table->string('tipo_excepcion', 800);
            $table->string('dpt_origen', 90);
            $table->string('ciudad_origen', 90);
            $table->string('dpt_destino', 90);
            $table->string('ciudad_destino', 90);
            $table->enum('tipo_identificacion', ['Cedula de Ciudadania', 'Cedula de Extranjeria', 'Pasaporte', 'DNI', 'RUC']);
            $table->string('numero_identificacion', 20);
            $table->bigInteger('telefono');
            $table->enum('menor_edad', ['Si', 'No']);
            $table->integer('edad_del_menor')->nullable();
            $table->string('dir_actual', 160);
            $table->string('dir_destino', 960);
            $table->string('file_certificado', 90);

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

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
        Schema::dropIfExists('programacion_viaje');
    }
}
