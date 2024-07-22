<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('tel');
            $table->timestamps();
        });
        DB::statement("ALTER SEQUENCE seq_devis START 1");
        DB::statement("ALTER SEQUENCE seq_paiements START 1");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP SEQUENCE seq_paiements");
        DB::statement("DROP SEQUENCE seq_devis");
        Schema::dropIfExists('clients');
    }
};
