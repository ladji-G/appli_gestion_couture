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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->boolean('statut')->default(false);
            $table->string('Nom');
            $table->string('photo');
            $table->integer('quantite');
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("paniers", function(Blueprint $table){
            $table->dropForeign("client_id");
        });

        Schema::dropIfExists('paniers');
    }
};
