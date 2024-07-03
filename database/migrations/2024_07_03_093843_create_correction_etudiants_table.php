<?php

use App\Models\Enseignant;
use App\Models\Etudiant;
use App\Models\specialite;
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
        Schema::create('correction_etudiants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Etudiant::class);
            $table->foreignIdFor(specialite::class);
            $table->string('doc_soumis')->nullable();
            $table->string('correction')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('correction_etudiants');
    }
};
