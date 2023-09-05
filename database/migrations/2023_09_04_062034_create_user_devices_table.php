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
        Schema::create('user_devices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('type', 128);
            $table->string('platform', 32)->default('windows');
            $table->string('device_id_type', 128);
            $table->string('device_id_number', 128)->nullable();
            $table->tinyInteger('is_primary')->default(0);
            $table->tinyInteger('status');
            $table->string('os_version',20)->nullable();
            $table->string('model')->nullable();
            $table->string('firebase_token')->nullable();

            $table->timestamps();
        });

        Schema::table('user_devices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_devices');
    }
};
