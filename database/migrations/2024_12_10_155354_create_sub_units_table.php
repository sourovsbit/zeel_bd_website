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
        Schema::create('sub_units', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->nullable();
            $table->bigInteger('unit_id')->nullable()->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('sub_unit_name')->nullable();
            $table->string('sub_unit_name_bn')->nullable();
            $table->double('sub_unit_data',11,2)->nullable();
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
        Schema::dropIfExists('sub_units');
    }
};
