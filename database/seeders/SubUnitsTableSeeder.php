<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubUnitsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sub_units')->delete();
        
        \DB::table('sub_units')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'unit_id' => 1,
                'sub_unit_name' => 'Piece',
                'sub_unit_name_bn' => NULL,
                'sub_unit_data' => 1.0,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2024-12-12 17:18:37',
                'updated_at' => '2024-12-12 17:18:37',
            ),
        ));
        
        
    }
}