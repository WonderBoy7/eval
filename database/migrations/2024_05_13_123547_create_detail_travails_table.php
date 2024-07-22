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
        Schema::create('detail_travails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_type_maison')->constrained('type_maisons');
            $table->foreignId('id_travails')->constrained('travails');
            $table->decimal('qte',10,2);
            $table->decimal('prix_unitaire',10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_travails');
    }
};
