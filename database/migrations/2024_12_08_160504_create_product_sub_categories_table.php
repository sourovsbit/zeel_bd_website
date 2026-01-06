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
        Schema::create('product_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('sl')->nullable();
            $table->bigInteger('item_id')->nullable()->unsigned();
            $table->foreign('item_id')->references('id')->on('product_items');
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->string('sub_category_name')->nullable();
            $table->string('sub_category_name_bn')->nullable();
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
        Schema::dropIfExists('product_sub_categories');
    }
};
