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
        Schema::create('produit', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('prix');
            $table->string('descriptionCourte');
            $table->string('descriptionLongue');
            $table->string('image');
            $table->integer('quantite');
            $table->foreignId('type_animal_id')->constrained('typeanimal')->onDelete('cascade');
            $table->foreignId('pilier_id')->constrained('pilier')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
