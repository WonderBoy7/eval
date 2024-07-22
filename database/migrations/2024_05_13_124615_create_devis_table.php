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
        Schema::create('devis', function (Blueprint $table) {
            $table->id();
            $table->string('ref_devis')->nullable();
            $table->string('lieu')->nullable();
            $table->foreignId('idclient')->constrained('clients');
            $table->foreignId('idtypemaison')->constrained('type_maisons');
            $table->foreignId('idtypefinition')->constrained('type_finitions');
            $table->decimal('prix_unitaire',10,2)->nullable();
            $table->decimal('pourcentage')->nullable();
            $table->date('date_debut');
            $table->date('date_fin')->nullable();
            $table->date('date_devis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
