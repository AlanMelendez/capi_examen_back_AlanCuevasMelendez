<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Migracion con datos del usuario: 
        Schema::create('user_domicilio', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('domicilio', 200);
            $table->integer('numero_exterior');
            $table->string('colonia',100);
            $table->integer('cp', 7);
            $table->string('ciudad',100);

            // Relacion con la tabla users
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user_domicilio');

    }
};
