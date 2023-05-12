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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id('about_id');
            $table->text('content');
            $table->string('phone_number');
            $table->text('address');
            $table->unsignedBigInteger('age');
            $table->text('image');
            $table->text('fb_link');
            $table->text('twitter_link');
            $table->text('google_link');
            $table->text('ins_link');
            $table->text('profession');
            $table->text('language');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
