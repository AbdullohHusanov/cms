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
            $table->bigInteger('user');
            $table->bigInteger('client');
            $table->integer('status');
            $table->integer('message');
            $table->timestamps();
        });
        Schema::table('requests', function (Blueprint $table) {
            $table->foreign('client')->references('id')->on('clients');
            $table->foreign('user')->references('id')->on('users');
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
