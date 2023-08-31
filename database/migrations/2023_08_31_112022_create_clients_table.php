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
            $table->bigInteger('user');
            $table->integer('iabs_id');
            $table->string('type_certificate');
            $table->string('type_client');
            $table->string('name_owner');
            $table->string('full_name_director');
            $table->string('full_name_accountant');
            $table->bigInteger('state');
            $table->bigInteger('city');
            $table->bigInteger('region');
            $table->bigInteger('street');
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
