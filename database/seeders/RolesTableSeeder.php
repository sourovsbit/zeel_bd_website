<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \Schema::disableForeignKeyConstraints(); 

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Super Admin',
                'name_bn' => 'সুপার অ্যাডমিন',
                'create_by' => 1,
                'deleted_at' => NULL,
                'guard_name' => 'web',
                'created_at' => '2024-04-25 14:03:59',
                'updated_at' => '2024-04-25 14:03:59',
            ),
        ));
        
        
    }
}