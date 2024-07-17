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
        Schema::create('mesures', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('epaule');
            $table->string('long_manche');
            $table->string('t_manche');
            $table->string('poitrine');
            $table->string('dos');
            $table->string('frappe');
            $table->string('ceinture');
            $table->string('long_pentalon');
            $table->string('cuisse');
            $table->string('bassin');
            $table->string('long_genou');
            $table->string('bas');
            $table->string('t_taille');
            $table->string('long_totale');
            $table->string('long_taille');
            $table->string('long_robe');
            $table->string('long_jupe');
            $table->string('epaule_manche');

            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mesures');
    }
};
