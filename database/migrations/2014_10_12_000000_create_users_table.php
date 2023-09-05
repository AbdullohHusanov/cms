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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cname');
            $table->string('sname')->nullable();
            $table->string('location');
            $table->string('state');
            $table->string('country');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('organisation');
            $table->string('org_unit');
            $table->string('description')->nullable();
            $table->string('job')->nullable();
            $table->string('accounter')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('login')->default('');
            $table->string('inn')->nullable();
            $table->string('pinfl')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('phone')->nullable();
            $table->string('localCode')->nullable();
            $table->string('smsuid')->nullable();
            $table->tinyInteger('fix')->default(0);
            $table->string('password');
            $table->string('comment')->nullable();
            $table->integer('operator_id')->nullable();
            $table->integer('branch_user_id');
            $table->integer('iabsID')->nullable();
            $table->integer('fido_user_id')->nullable();
            $table->integer('fido_user_type_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
