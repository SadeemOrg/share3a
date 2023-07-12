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
        Schema::table('register_forms', function (Blueprint $table) {
            $table->string('user_ip')->after('is_read')->nullable();
            $table->string('browser')->after('user_ip')->nullable();
            $table->string('os')->after('browser')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('register_forms', function (Blueprint $table) {
            //
        });
    }
};
