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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();

            $table->string('name', 100)->nullable();
            $table->enum('main', ['normal', 'main'])->default('normal');
            $table->enum('error', ['on', 'off'])->default('on');

            $table->enum('home_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('admin_profile', ['on', 'off'])->default('off')->nullable();
            $table->enum('setting_edit', ['on', 'off'])->default('off')->nullable();

            $table->enum('admin_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('admin_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('admin_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('admin_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('role_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('role_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('role_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('role_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('backup_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('backup_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('backup_delete', ['on', 'off'])->default('off')->nullable();
            $table->enum('backup_download', ['on', 'off'])->default('off')->nullable();
            $table->enum('backup_restore', ['on', 'off'])->default('off')->nullable();

            ////////////////////////////
            $table->enum('travel_type_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('travel_type_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('travel_type_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('travel_type_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('strength_point_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('strength_point_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('strength_point_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('strength_point_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('tips_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('tips_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('tips_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('tips_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('contact_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('contact_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('contact_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('contact_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('country_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('country_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('country_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('country_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('city_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('city_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('city_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('city_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('trip_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('trip_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('trip_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('trip_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('page_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('page_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('page_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('page_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('booking_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('booking_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('booking_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('booking_delete', ['on', 'off'])->default('off')->nullable();

            $table->enum('gallery_show', ['on', 'off'])->default('off')->nullable();
            $table->enum('gallery_create', ['on', 'off'])->default('off')->nullable();
            $table->enum('gallery_edit', ['on', 'off'])->default('off')->nullable();
            $table->enum('gallery_delete', ['on', 'off'])->default('off')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
