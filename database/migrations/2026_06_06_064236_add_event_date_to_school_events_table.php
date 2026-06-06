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
        Schema::table('school_events', function (Blueprint $table) {
            // Agar event_date abhi tak nahi juda hai, toh yeh line use jod degi
            if (!Schema::hasColumn('school_events', 'event_date')) {
                $table->date('event_date')->after('title')->nullable();
            }
            
            // Description column ko add karein (text type taaki lamba detail save ho sake)
            if (!Schema::hasColumn('school_events', 'description')) {
                $table->text('description')->after('event_date')->nullable();
            }
        });
    }

public function down(): void
{
    Schema::table('school_events', function (Blueprint $table) {
        $table->dropColumn('event_date');
    });
}
};
