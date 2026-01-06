<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('employees')->delete();
        
        \DB::table('employees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'name' => 'Mobinul Islam Tazim',
                'designation' => 'Developer',
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'phone' => '01988444382',
                'image' => '2049225353.jpeg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 16:41:57',
                'updated_at' => '2025-03-01 16:41:57',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'name' => 'Asadur Rahman Tareq',
                'designation' => 'Member',
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'phone' => '01700000000',
                'image' => '2055922896.jpg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 17:29:09',
                'updated_at' => '2025-03-01 17:29:09',
            ),
            2 => 
            array (
                'id' => 3,
                'sl' => 3,
                'name' => 'Ala Uddin',
                'designation' => 'Employee',
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'phone' => '01900000000',
                'image' => '672536826.jpeg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 17:29:37',
                'updated_at' => '2025-03-01 17:29:37',
            ),
            3 => 
            array (
                'id' => 4,
                'sl' => 4,
                'name' => 'Nahian Bhuiyan',
                'designation' => 'Member',
                'facebook' => 'https://facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'phone' => '01600000000',
                'image' => '572187240.jpg',
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 17:31:51',
                'updated_at' => '2025-03-01 17:31:51',
            ),
        ));
        
        
    }
}