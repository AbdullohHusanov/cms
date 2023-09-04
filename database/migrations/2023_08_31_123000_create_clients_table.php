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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user')->unsigned();
            $table->integer('iabs_id');
            $table->string('type_certificate');
            $table->string('type_client');
            $table->string('name_owner');
            $table->string('full_name_director');
            $table->string('full_name_accountant');
            $table->bigInteger('state')->unsigned();
            $table->bigInteger('city')->unsigned();
            $table->bigInteger('region')->unsigned();
            $table->bigInteger('street')->unsigned();
            $table->string('email');
            $table->string('organization');
            $table->string('divisions');
            $table->string('inn');
            $table->string('pinfl');
            $table->string('phone');
            $table->string('token_type');
            $table->string('serial_number_token');
            $table->string('document_file');
            $table->timestamps();
        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('state')->references('id')->on('states');
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('region')->references('id')->on('regions');
            $table->foreign('street')->references('id')->on('streets');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
