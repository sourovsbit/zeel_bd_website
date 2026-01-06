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
        Schema::create('product_informations', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->integer('sl')->nullable();
            $table->bigInteger('item_id')->nullable()->unsigned();
            $table->foreign('item_id')->references('id')->on('product_items');
            $table->bigInteger('category_id')->nullable()->unsigned();
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->bigInteger('sub_category_id')->nullable()->unsigned();
            $table->foreign('sub_category_id')->references('id')->on('product_sub_categories');
            $table->bigInteger('brand_id')->nullable()->unsigned();
            $table->foreign('brand_id')->references('id')->on('product_brands');
            $table->bigInteger('unit_id')->nullable()->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');
            $table->string('product_name')->nullable();
            $table->string('product_name_bn')->nullable();
            $table->double('purchase_price',11,2)->nullable();
            $table->double('sale_price',11,2)->nullable();
            $table->double('moq',11,2)->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('product_type')->comment(' 1 = Simple Product , 2 = Variable Product')->nullable();
            $table->integer('status')->comment(' 0 - Inactive & 1 - Active');
            $table->bigInteger('vendor_id')->nullable()->unsigned();
            $table->foreign('vendor_id')->references('id')->on('vendors');
            $table->bigInteger('country_id')->nullable()->unsigned();
            $table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('product_information');
    }
};
