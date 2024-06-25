<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donacions', function (Blueprint $table) {
            $table->id();
            // Asegúrate de que la tabla y columna de referencia existan y estén correctamente definidas
            $table->foreignId('solicitud_id')->constrained('solicitud_donacions')->onDelete('cascade');
            $table->foreignId('tipo_sangre_id')->constrained('tipo_sangres')->onDelete('cascade');
            $table->integer('unidades');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacions');
    }
};
