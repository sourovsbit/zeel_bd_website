<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuLabelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menu_labels')->delete();
        
        \DB::table('menu_labels')->insert(array (
            0 => 
            array (
                'id' => 7,
                'label_name' => 'Dashboard',
                'label_name_bn' => 'ড্যাশবোর্ড',
                'status' => 1,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2024-06-09 23:55:29',
                'updated_at' => '2024-06-09 23:55:29',
            ),
            1 => 
            array (
                'id' => 8,
                'label_name' => 'Developer Option',
                'label_name_bn' => 'ডেভেলপার অপশান',
                'status' => 1,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 1,
                'created_at' => '2024-04-16 10:24:59',
                'updated_at' => '2025-02-10 13:54:39',
            ),
            2 => 
            array (
                'id' => 9,
                'label_name' => 'Product Information',
                'label_name_bn' => 'পণ্য তথ্য',
                'status' => 1,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2024-12-05 15:46:19',
                'updated_at' => '2025-04-21 15:38:49',
            ),
            3 => 
            array (
                'id' => 10,
                'label_name' => 'Vendor Information',
                'label_name_bn' => 'ভেন্ডর ইনফরমেশন',
                'status' => 0,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2024-12-14 18:05:53',
                'updated_at' => '2025-02-10 15:41:10',
            ),
            4 => 
            array (
                'id' => 11,
                'label_name' => 'Delivery Charge Information',
                'label_name_bn' => 'ডেলিভারি চার্জ ইনফরমেশন',
                'status' => 0,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2024-12-19 17:20:07',
                'updated_at' => '2025-02-10 15:41:11',
            ),
            5 => 
            array (
                'id' => 12,
                'label_name' => 'POS',
                'label_name_bn' => 'পজ',
                'status' => 0,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2024-12-21 14:56:07',
                'updated_at' => '2025-02-10 15:41:12',
            ),
            6 => 
            array (
                'id' => 13,
                'label_name' => 'Company Information',
                'label_name_bn' => 'কোম্পানির তথ্য',
                'status' => 1,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2025-02-10 13:55:14',
                'updated_at' => '2025-02-10 13:55:14',
            ),
            7 => 
            array (
                'id' => 14,
                'label_name' => 'Service Information',
                'label_name_bn' => 'সার্ভিস ইনফরমেশন',
                'status' => 0,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2025-02-11 15:03:45',
                'updated_at' => '2025-04-22 18:33:17',
            ),
            8 => 
            array (
                'id' => 15,
                'label_name' => 'Blog Information',
                'label_name_bn' => 'ব্লগ ইনফরমেশন',
                'status' => 0,
                'type' => 'cms',
                'deleted_at' => NULL,
                'create_by' => 3,
                'created_at' => '2025-02-17 12:17:24',
                'updated_at' => '2025-04-22 18:33:17',
            ),
        ));
        
        
    }
}