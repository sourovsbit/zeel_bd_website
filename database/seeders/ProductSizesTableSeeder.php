<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSizesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_sizes')->delete();
        
        \DB::table('product_sizes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'size_name' => 'S',
                'size_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:16:27',
                'updated_at' => '2024-12-12 17:16:27',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'size_name' => 'M',
                'size_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:16:37',
                'updated_at' => '2024-12-12 17:16:37',
            ),
            2 => 
            array (
                'id' => 3,
                'sl' => 3,
                'size_name' => 'L',
                'size_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:16:42',
                'updated_at' => '2024-12-12 17:16:42',
            ),
            3 => 
            array (
                'id' => 4,
                'sl' => 4,
                'size_name' => 'XL',
                'size_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:16:49',
                'updated_at' => '2024-12-12 17:16:49',
            ),
            4 => 
            array (
                'id' => 5,
                'sl' => 5,
                'size_name' => 'XXL',
                'size_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:16:56',
                'updated_at' => '2024-12-12 17:16:56',
            ),
        ));
        
        
    }
}