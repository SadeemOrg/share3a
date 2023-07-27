<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Stepanenko3\NovaMediaField\Fields\Media;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->json('icons')->nullable();
            $table->string('slug');
            $table->string('text');
            $table->string('sup_text');
            $table->string('note',500)->nullable();
            $table->json('questions');
            $table->char('status',1)->default(1);
            $table->dateTime('stop_form')->nullable();
            $table->json('leading')->nullable();
            $table->foreignId('added_by')->nullable()->constrained()->cascadeOnDelete()->on('users');
            $table->softDeletes();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
