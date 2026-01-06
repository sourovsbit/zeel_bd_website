<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSubCategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_sub_categories')->delete();
        
        \DB::table('product_sub_categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'item_id' => 1,
                'category_id' => 1,
                'sub_category_name' => '1-3 Year Old',
                'sub_category_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:14:40',
                'updated_at' => '2025-02-13 17:47:11',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'item_id' => 1,
                'category_id' => 1,
                'sub_category_name' => '4-7 Year Old',
                'sub_category_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:14:52',
                'updated_at' => '2025-02-13 17:47:38',
            ),
            2 => 
            array (
                'id' => 3,
                'sl' => 3,
                'item_id' => 1,
                'category_id' => 2,
                'sub_category_name' => 'Japani 1-3 Year Old',
                'sub_category_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:15:09',
                'updated_at' => '2025-02-13 17:48:16',
            ),
        ));
        
        
    }
}