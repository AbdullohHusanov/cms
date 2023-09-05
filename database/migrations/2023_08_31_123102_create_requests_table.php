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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->text('request');
            $table->string('container', 32);
            $table->string('file_name', 128);
            $table->string('password', 64)->nullable();
            $table->tinyInteger('type');
            $table->tinyInteger('cng')->nullable();
            $table->tinyInteger('status')->nullable(false)->default(0);
            $table->tinyInteger('refresh')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('branch_user_id')->unsigned();
            $table->bigInteger('device_id')->unsigned();
            $table->bigInteger('operator_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('device_id')->references('id')->on('user_devices');
            $table->foreign('operator_id')->references('id')->on('users');
            $table->foreign('branch_user_id')->references('id')->on('branch_users');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
