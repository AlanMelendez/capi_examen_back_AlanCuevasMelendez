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
        // Migracion con campos nuevos ala tabla user_domicilio:
        Schema::table('user_domicilio', function (Blueprint $table) {
            $table->date('fecha_nacimiento')->after('ciudad');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Eliminar campos ala tabla user_domicilio:
        Schema::table('user_domicilio', function (Blueprint $table) {
            $table->dropColumn('fecha_nacimiento');
            // Puedes revertir otros cambios aquí si es necesario
        });
    }
};
