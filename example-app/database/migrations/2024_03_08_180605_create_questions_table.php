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
        Schema::create('Question', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Tagged'); // Campo de tipo string (Tagged)
            $table->date('Todate')->nullable(); // Campo de tipo fecha (Todate) que puede ser nulo
            $table->date('Fromdate')->nullable(); // Campo de tipo fecha (Fromdate) que puede ser nulo
            $table->json('response'); // Campo de tipo fecha (Fromdate) que puede ser nulo
            $table->timestamps(); // Registros de fecha y hora de creación/modificación
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Question');
    }
};

