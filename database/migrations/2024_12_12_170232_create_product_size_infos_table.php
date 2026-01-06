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
        Schema::create('product_size_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->nullable();
            $table->string('product_id')->nullable();
            $table->bigInteger('size_id')->nullable()->unsigned();
            $table->foreign('size_id')->references('id')->on('product_sizes');
            $table->date('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_size_infos');
    }
};
