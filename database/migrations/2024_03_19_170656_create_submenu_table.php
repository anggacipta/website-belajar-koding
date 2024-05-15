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
        Schema::create('submenu', function (Blueprint $table) {
            $table->id();
            $table->string("nama_submenu", 100)->nullable(false);
            $table->string("slug_submenu", 100)->nullable(false);
            $table->unsignedBigInteger("menu_id")->nullable(false);
            $table->timestamps();

            $table->foreign("menu_id")->on("menu")->references("id");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submenu');
    }
};
