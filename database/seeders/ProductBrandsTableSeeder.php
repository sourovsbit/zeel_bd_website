<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductBrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('product_brands')->delete();
        
        \DB::table('product_brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'brand_name' => 'Hyundai',
                'brand_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:15:56',
                'updated_at' => '2025-02-13 17:49:51',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'brand_name' => 'Honda',
                'brand_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:16:09',
                'updated_at' => '2025-02-13 17:50:04',
            ),
            2 => 
            array (
                'id' => 3,
                'sl' => 3,
                'brand_name' => 'Ford',
                'brand_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-02-13 17:50:25',
                'updated_at' => '2025-02-13 17:50:25',
            ),
            3 => 
            array (
                'id' => 4,
                'sl' => 4,
                'brand_name' => 'KIA',
                'brand_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-02-13 17:50:34',
                'updated_at' => '2025-02-13 17:50:34',
            ),
            4 => 
            array (
                'id' => 5,
                'sl' => 5,
                'brand_name' => 'Volkswagen',
                'brand_name_bn' => NULL,
                'image' => '0',
                'banner' => '0',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-02-13 17:50:42',
                'updated_at' => '2025-02-13 17:50:42',
            ),
        ));
        
        
    }
}