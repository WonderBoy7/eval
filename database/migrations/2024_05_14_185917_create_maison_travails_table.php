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
        Schema::create('maison_travails', function (Blueprint $table) {
            $table->id(); $table->integer('line');
            $table->string('type_maison');
            $table->string('description');
            $table->decimal('surface');
            $table->string('code_travaux');
            $table->string('type_travaux');
            $table->string('unite');
            $table->decimal('pu', 10, 2);
            $table->decimal('qte', 10, 2);
            $table->integer('duree_travaux');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maison_travails');
    }
};
