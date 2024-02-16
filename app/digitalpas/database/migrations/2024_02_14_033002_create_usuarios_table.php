<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario.usuarios', function (Blueprint $table) {
            $table->id('cod_usr');
            $table->string('id_afi');
            $table->string('cedula');
            $table->string('nombre');
            $table->string('password');
            $table->string('rol'); // Agrega una columna para el rol del usuario
            $table->string('email')->unique(); // Si tienes un campo de correo electrónico en tu tabla, mantenlo
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('usuario.usuarios');
    }
}
