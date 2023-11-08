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
        Schema::table('personal_missions', function (Blueprint $table) {
            $table->tinyInteger('mission_complete')->default(0)->comment('The Number will consider as completed parcentage out of 100');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_missions', function (Blueprint $table) {
            $table->dropColumn([
                'user_id',
                'personal_mission',
                'edit_flag',
            ]);
        });
    }
};
