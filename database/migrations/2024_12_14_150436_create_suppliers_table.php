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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('supplier_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('nid')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
};
