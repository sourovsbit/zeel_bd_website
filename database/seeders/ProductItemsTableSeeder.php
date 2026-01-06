<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_items')->delete();
        
        \DB::table('product_items')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'item_name' => 'Cars',
                'item_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:12:26',
                'updated_at' => '2025-02-13 17:45:54',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'item_name' => 'Car Parts',
                'item_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:12:44',
                'updated_at' => '2025-02-13 17:46:11',
            ),
        ));
        
        
    }
}