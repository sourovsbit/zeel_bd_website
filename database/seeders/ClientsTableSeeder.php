<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('clients')->delete();
        
        \DB::table('clients')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'name' => 'আবদুল মোমেন',
                'designation' => 'Lecturer',
                'company_name' => 'Skill Based IT',
                'description' => '<div style="line-height: 19px;">Excellent customer support and fast response times. Highly recommend!</div>',
                'image' => '1750665110.jpg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 18:04:47',
                'updated_at' => '2025-03-01 18:04:47',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'name' => 'Asadur Rahman Tareq',
                'designation' => 'Assistant Professor',
                'company_name' => 'Mom and baby emart',
                'description' => '<div style="line-height: 19px;">" Excellent customer support and fast response times. Highly recommend! "</div>',
                'image' => '1138983109.jpg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 18:06:20',
                'updated_at' => '2025-03-01 18:06:20',
            ),
            2 => 
            array (
                'id' => 3,
                'sl' => 2,
                'name' => 'Asadur Rahman Tareq',
                'designation' => 'Assistant Professor',
                'company_name' => 'Mom and baby emart',
                'description' => '<div style="line-height: 19px;">" Excellent customer support and fast response times. Highly recommend! "</div>',
                'image' => '503372527.jpg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 18:06:20',
                'updated_at' => '2025-03-01 18:06:20',
            ),
        ));
        
        
    }
}