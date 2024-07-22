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
        Schema::create('temp_devis', function (Blueprint $table) {
            $table->id();
            $table->integer('line');
            $table->string('client');
            $table->string('ref_devis');
            $table->string('type_maison');
            $table->string('finition');
            $table->string('taux_finition');
            $table->date('date_devis');
            $table->date('date_debut');
            $table->string('lieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_devis');
    }
};
