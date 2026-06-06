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
    Schema::table('teachers', function (Blueprint $table) {
        $table->string('name')->nullable();
        $table->string('email')->nullable();
        $table->string('subject')->nullable();
        $table->string('qualification')->nullable();
        $table->string('photo')->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
        });
    }
};
