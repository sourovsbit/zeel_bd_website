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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->nullable();
            $table->string('vendor_id')->nullable();
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('vendor_name')->nullable();
            $table->string('vendor_name_bn')->nullable();
            $table->string('vendor_phone')->unique();
            $table->string('company_name')->nullable();
            $table->string('company_name_bn')->nullable();
            $table->string('company_phone')->unique();
            $table->string('email')->unique();
            $table->string('nid')->nullable();
            $table->text('address');
            $table->string('password');
            $table->string('raw_password');
            $table->string('image',100)->nullable();
            $table->string('banner',100)->nullable();
            $table->integer('status')->comment(' 0 - Inactive & 1 - Active');
            $table->bigInteger('create_by')->unsigned();
            $table->foreign('create_by')->references('id')->on('users');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
