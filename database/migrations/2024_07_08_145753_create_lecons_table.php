<?php

use App\Models\Cours;
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
        Schema::create('lecons', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('video');
            $table->foreignIdFor(Cours::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lecons');
    }
};
