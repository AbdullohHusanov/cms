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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('ca_id', 12)->nullable();
            $table->string('issuer', 128)->nullable();
            $table->string('cert_sn', 64);
            $table->string('cert_thumb', 64)->nullable();
            $table->timestamp('cert_from');
            $table->timestamp('cert_to');
            $table->text('base64');
            $table->text('pfx')->nullable();
            $table->tinyInteger('cng')->nullable();
            $table->tinyInteger('type')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('imported')->nullable();
            $table->string('rev_reason')->nullable();
            $table->tinyInteger('branch_rev_status')->nullable();
            $table->string('file_name', 128)->nullable();
            $table->string('last_login', 128)->nullable();
            $table->integer('sync')->default(0);

            $table->bigInteger('req_id')->unsigned();
            $table->bigInteger('branch_user_id')->unsigned();
            $table->bigInteger('operator_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->foreign('req_id')->references('id')->on('requests');
            $table->foreign('branch_user_id')->references('id')->on('branch_users');
            $table->foreign('operator_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
