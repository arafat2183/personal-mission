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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name', 200)->after('id');
            $table->string('last_name', 200)->after('first_name');
            $table->string('mobile');
            $table->string('country');
            $table->string('dob');
            $table->tinyInteger('user_type');

            $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');

            $table->dropColumn([
                'first_name',
                'last_name',
                'mobile',
                'country',
                'dob',
                'user_type'
            ]);
        });
    }
};
