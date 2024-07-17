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
        Schema::create('couturiers', function (Blueprint $table) {
            $table->id();
            $table->string('genre');
            $table->string('name');
            $table->string('Prenom');
            $table->string('adresse');
            $table->integer('telephone');
            $table->string('email')->unique();
            $table->string('specialite');
            $table->string('salaire_horaire');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image');
            $table->tinyInteger('statuts')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('couturiers');
    }
};
