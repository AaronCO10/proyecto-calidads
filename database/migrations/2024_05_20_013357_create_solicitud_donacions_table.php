<?php

use App\Models\Campania;
use App\Models\User;
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
        Schema::create('solicitud_donacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('campania_id')->constrained()->onDelete('cascade');
            $table->string('talla');
            $table->string('peso');
            $table->boolean('acepta_terminos')->default(false);
            $table->enum('estado', ['Pendiente', 'Puede Donar', 'No Puede Donar'])->default('Pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_donacions');
    }
};
