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
        Schema::create('temp_paiements', function (Blueprint $table) {
            $table->id();
            $table->integer('line');
            $table->string('ref_devis');
            $table->string('ref_paiement');
            $table->date('date_paiement');
            $table->decimal('montant',10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temp_paiements');
    }
};
