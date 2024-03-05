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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)->nullable();
            $table->string('description', 255)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('address', 255)->nullable();

            $table->string('tip_img', 255)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('icon', 255)->nullable();

            $table->text('first_section')->nullable();
            $table->text('head_code')->nullable();
            $table->text('footer_code')->nullable();

            $table->string('facebook', 255)->nullable();
            $table->string('instagram', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('linkedIn', 255)->nullable();
            $table->string('snapchat', 255)->nullable();
            $table->string('pinterest', 255)->nullable();
            $table->string('tiktok', 255)->nullable();
            $table->string('threads', 255)->nullable();
            $table->string('youtube', 255)->nullable();
            $table->string('telegram', 255)->nullable();
            $table->string('whatsapp', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
