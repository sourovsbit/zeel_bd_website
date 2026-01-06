<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductColorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_colors')->delete();
        
        \DB::table('product_colors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'color_name' => 'Blue',
                'color_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:17:19',
                'updated_at' => '2024-12-12 17:17:19',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'color_name' => 'Ash',
                'color_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:17:27',
                'updated_at' => '2024-12-12 17:17:27',
            ),
            2 => 
            array (
                'id' => 3,
                'sl' => 3,
                'color_name' => 'Navy Blue',
                'color_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:17:35',
                'updated_at' => '2024-12-12 17:17:35',
            ),
            3 => 
            array (
                'id' => 4,
                'sl' => 4,
                'color_name' => 'White',
                'color_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:17:43',
                'updated_at' => '2024-12-12 17:17:43',
            ),
        ));
        
        
    }
}