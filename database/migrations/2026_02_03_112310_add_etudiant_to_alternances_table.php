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
        Schema::table('alternances', function (Blueprint $table) {
            $table->string('nom_etudiant')->after('entreprise_id')->nullable();
            $table->string('prenom_etudiant')->after('nom_etudiant')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alternances', function (Blueprint $table) {
            $table->dropColumn(['nom_etudiant', 'prenom_etudiant']);
        });
    }
};
