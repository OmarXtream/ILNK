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
        Schema::create('social_buttons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('platform');
            $table->text('url');

            $table->foreignId('page_id')->cascadeOnDelete()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_buttons');
    }
};
