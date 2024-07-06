<?php

use App\Models\Enseignant;
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
        Schema::create('exercies_cours', function (Blueprint $table) {
            $table->id();
            $table->string('cours_pdf');
            $table->string('titre')->nullable();
            $table->foreignIdFor(Enseignant::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercies_cours');
    }
};
