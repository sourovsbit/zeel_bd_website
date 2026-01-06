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
        Schema::create('thanas', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->nullable();
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->bigInteger('division_id')->nullable()->unsigned();
            $table->foreign('division_id')->references('id')->on('division_setups');
            $table->bigInteger('district_id')->nullable()->unsigned();
            $table->foreign('district_id')->references('id')->on('district_setups');
            $table->string('thana_name')->nullable();
            $table->string('thana_name_bn')->nullable();
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
        Schema::dropIfExists('thanas');
    }
};
