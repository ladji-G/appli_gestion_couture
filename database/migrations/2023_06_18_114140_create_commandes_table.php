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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->boolean('statut')->default(false);
            $table->foreignId('user_id')->constrained("users")->onDelete('cascade');
            $table->foreignId('couturier_id')->constrained("couturiers")->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("commandes", function(Blueprint $table){
            $table->dropForeign("user_id");
        });
        
        Schema::dropIfExists('commandes');
    }
};
