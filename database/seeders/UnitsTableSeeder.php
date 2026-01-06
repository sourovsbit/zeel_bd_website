<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('units')->delete();
        
        \DB::table('units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'unit_name' => 'Piece',
                'unit_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:18:09',
                'updated_at' => '2024-12-12 17:18:09',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'unit_name' => 'KG',
                'unit_name_bn' => NULL,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => '2025-02-13',
                'created_at' => '2024-12-12 17:18:18',
                'updated_at' => '2025-02-13 17:54:14',
            ),
        ));
        
        
    }
}