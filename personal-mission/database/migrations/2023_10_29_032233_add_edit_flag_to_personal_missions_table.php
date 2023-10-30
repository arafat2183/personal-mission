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
            $table->tinyInteger('edit_flag')->default(0)->comment('Edit Request = 0, Requested = 1, Editable = 2');
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
                'phone_number',
            ]);
        });
    }
};
