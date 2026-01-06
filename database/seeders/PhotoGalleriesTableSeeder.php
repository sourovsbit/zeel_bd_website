<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PhotoGalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('photo_galleries')->delete();
        
        \DB::table('photo_galleries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'sl' => 1,
                'title' => 'PREMIUM QUALITY PURE CLEANING & TECHNICAL SERVICES IN DUBAI',
                'image' => '472500673.png',
                'slider' => 1,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 16:08:12',
                'updated_at' => '2025-03-01 16:08:12',
            ),
            1 => 
            array (
                'id' => 2,
                'sl' => 2,
                'title' => 'PREMIUM QUALITY PURE CLEANING & TECHNICAL SERVICES IN DUBAI',
                'image' => '336395299.png',
                'slider' => 1,
                'status' => 1,
                'create_by' => 3,
                'deleted_at' => NULL,
                'created_at' => '2025-03-01 16:08:22',
                'updated_at' => '2025-03-01 16:08:22',
            ),
        ));
        
        
    }
}