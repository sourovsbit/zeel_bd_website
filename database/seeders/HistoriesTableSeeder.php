<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HistoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('histories')->delete();
        
        \DB::table('histories')->insert(array (
            0 => 
            array (
                'id' => 21,
                'tag' => 'menu_label',
                'fk_id' => '8',
                'type' => 'status',
                'date' => '2024-04-17',
                'time' => '15:29:31',
                'user_id' => 1,
                'created_at' => '2024-04-17 15:29:31',
                'updated_at' => '2024-04-17 15:29:31',
            ),
            1 => 
            array (
                'id' => 22,
                'tag' => 'menu_label',
                'fk_id' => '8',
                'type' => 'status',
                'date' => '2024-04-17',
                'time' => '15:29:52',
                'user_id' => 1,
                'created_at' => '2024-04-17 15:29:52',
                'updated_at' => '2024-04-17 15:29:52',
            ),
            2 => 
            array (
                'id' => 23,
                'tag' => 'menu_label',
                'fk_id' => '8',
                'type' => 'status',
                'date' => '2024-04-18',
                'time' => '15:37:07',
                'user_id' => 1,
                'created_at' => '2024-04-18 15:37:07',
                'updated_at' => '2024-04-18 15:37:07',
            ),
            3 => 
            array (
                'id' => 44,
                'tag' => 'user',
                'fk_id' => '1',
                'type' => 'restore',
                'date' => '2024-04-26',
                'time' => '21:47:41',
                'user_id' => 3,
                'created_at' => '2024-04-26 21:47:41',
                'updated_at' => '2024-04-26 21:47:41',
            ),
            4 => 
            array (
                'id' => 50,
                'tag' => 'menu_label',
                'fk_id' => '9',
                'type' => 'destroy',
                'date' => '2024-05-14',
                'time' => '23:58:12',
                'user_id' => 3,
                'created_at' => '2024-05-14 23:58:12',
                'updated_at' => '2024-05-14 23:58:12',
            ),
            5 => 
            array (
                'id' => 62,
                'tag' => 'store',
                'fk_id' => '1',
                'type' => 'update',
                'date' => '2024-06-24',
                'time' => '23:45:55',
                'user_id' => 3,
                'created_at' => '2024-06-24 23:45:55',
                'updated_at' => '2024-06-24 23:45:55',
            ),
            6 => 
            array (
                'id' => 63,
                'tag' => 'store',
                'fk_id' => '3',
                'type' => 'destroy',
                'date' => '2024-06-25',
                'time' => '00:15:23',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:15:23',
                'updated_at' => '2024-06-25 00:15:23',
            ),
            7 => 
            array (
                'id' => 64,
                'tag' => 'store',
                'fk_id' => '3',
                'type' => 'restore',
                'date' => '2024-06-25',
                'time' => '00:23:03',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:23:03',
                'updated_at' => '2024-06-25 00:23:03',
            ),
            8 => 
            array (
                'id' => 65,
                'tag' => 'store',
                'fk_id' => '3',
                'type' => 'destroy',
                'date' => '2024-06-25',
                'time' => '00:23:30',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:23:30',
                'updated_at' => '2024-06-25 00:23:30',
            ),
            9 => 
            array (
                'id' => 66,
                'tag' => 'store',
                'fk_id' => '3',
                'type' => 'delete',
                'date' => '2024-06-25',
                'time' => '00:27:30',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:27:30',
                'updated_at' => '2024-06-25 00:27:30',
            ),
            10 => 
            array (
                'id' => 67,
                'tag' => 'store',
                'fk_id' => '1',
                'type' => 'status',
                'date' => '2024-06-25',
                'time' => '00:34:02',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:34:02',
                'updated_at' => '2024-06-25 00:34:02',
            ),
            11 => 
            array (
                'id' => 68,
                'tag' => 'store',
                'fk_id' => '1',
                'type' => 'status',
                'date' => '2024-06-25',
                'time' => '00:34:26',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:34:26',
                'updated_at' => '2024-06-25 00:34:26',
            ),
            12 => 
            array (
                'id' => 69,
                'tag' => 'store',
                'fk_id' => '1',
                'type' => 'update',
                'date' => '2024-06-25',
                'time' => '00:38:29',
                'user_id' => 3,
                'created_at' => '2024-06-25 00:38:29',
                'updated_at' => '2024-06-25 00:38:29',
            ),
            13 => 
            array (
                'id' => 70,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '12:49:15',
                'user_id' => 3,
                'created_at' => '2024-06-25 12:49:15',
                'updated_at' => '2024-06-25 12:49:15',
            ),
            14 => 
            array (
                'id' => 71,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '12:50:53',
                'user_id' => 3,
                'created_at' => '2024-06-25 12:50:53',
                'updated_at' => '2024-06-25 12:50:53',
            ),
            15 => 
            array (
                'id' => 72,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '12:52:26',
                'user_id' => 3,
                'created_at' => '2024-06-25 12:52:26',
                'updated_at' => '2024-06-25 12:52:26',
            ),
            16 => 
            array (
                'id' => 73,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '13:10:14',
                'user_id' => 3,
                'created_at' => '2024-06-25 13:10:14',
                'updated_at' => '2024-06-25 13:10:14',
            ),
            17 => 
            array (
                'id' => 74,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '13:23:22',
                'user_id' => 3,
                'created_at' => '2024-06-25 13:23:22',
                'updated_at' => '2024-06-25 13:23:22',
            ),
            18 => 
            array (
                'id' => 75,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '13:39:57',
                'user_id' => 3,
                'created_at' => '2024-06-25 13:39:57',
                'updated_at' => '2024-06-25 13:39:57',
            ),
            19 => 
            array (
                'id' => 76,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '14:28:17',
                'user_id' => 3,
                'created_at' => '2024-06-25 14:28:17',
                'updated_at' => '2024-06-25 14:28:17',
            ),
            20 => 
            array (
                'id' => 77,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '15:35:07',
                'user_id' => 3,
                'created_at' => '2024-06-25 15:35:07',
                'updated_at' => '2024-06-25 15:35:07',
            ),
            21 => 
            array (
                'id' => 78,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '16:59:54',
                'user_id' => 3,
                'created_at' => '2024-06-25 16:59:54',
                'updated_at' => '2024-06-25 16:59:54',
            ),
            22 => 
            array (
                'id' => 79,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-25',
                'time' => '17:00:25',
                'user_id' => 3,
                'created_at' => '2024-06-25 17:00:25',
                'updated_at' => '2024-06-25 17:00:25',
            ),
            23 => 
            array (
                'id' => 80,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-06-26',
                'time' => '16:54:57',
                'user_id' => 3,
                'created_at' => '2024-06-26 16:54:57',
                'updated_at' => '2024-06-26 16:54:57',
            ),
            24 => 
            array (
                'id' => 82,
                'tag' => 'menu',
                'fk_id' => '17',
                'type' => 'update',
                'date' => '2024-07-03',
                'time' => '17:52:15',
                'user_id' => 3,
                'created_at' => '2024-07-03 17:52:15',
                'updated_at' => '2024-07-03 17:52:15',
            ),
            25 => 
            array (
                'id' => 85,
                'tag' => 'product_item',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-07-12',
                'time' => '15:22:23',
                'user_id' => 3,
                'created_at' => '2024-07-12 15:22:23',
                'updated_at' => '2024-07-12 15:22:23',
            ),
            26 => 
            array (
                'id' => 86,
                'tag' => 'product_item',
                'fk_id' => '2',
                'type' => 'update',
                'date' => '2024-10-21',
                'time' => '12:50:58',
                'user_id' => 3,
                'created_at' => '2024-10-21 12:50:58',
                'updated_at' => '2024-10-21 12:50:58',
            ),
            27 => 
            array (
                'id' => 87,
                'tag' => 'product_item',
                'fk_id' => '2',
                'type' => 'update',
                'date' => '2024-10-21',
                'time' => '12:51:25',
                'user_id' => 3,
                'created_at' => '2024-10-21 12:51:25',
                'updated_at' => '2024-10-21 12:51:25',
            ),
            28 => 
            array (
                'id' => 88,
                'tag' => 'product_item',
                'fk_id' => '2',
                'type' => 'update',
                'date' => '2024-10-21',
                'time' => '12:52:27',
                'user_id' => 3,
                'created_at' => '2024-10-21 12:52:27',
                'updated_at' => '2024-10-21 12:52:27',
            ),
            29 => 
            array (
                'id' => 95,
                'tag' => 'product_item',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-10-21',
                'time' => '13:28:15',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:28:15',
                'updated_at' => '2024-10-21 13:28:15',
            ),
            30 => 
            array (
                'id' => 96,
                'tag' => 'product_item',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-10-21',
                'time' => '13:28:16',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:28:16',
                'updated_at' => '2024-10-21 13:28:16',
            ),
            31 => 
            array (
                'id' => 98,
                'tag' => 'category',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-10-21',
                'time' => '13:29:07',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:29:07',
                'updated_at' => '2024-10-21 13:29:07',
            ),
            32 => 
            array (
                'id' => 100,
                'tag' => 'category',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-10-21',
                'time' => '13:29:12',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:29:12',
                'updated_at' => '2024-10-21 13:29:12',
            ),
            33 => 
            array (
                'id' => 101,
                'tag' => 'category',
                'fk_id' => '2',
                'type' => 'destroy',
                'date' => '2024-10-21',
                'time' => '13:34:22',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:34:22',
                'updated_at' => '2024-10-21 13:34:22',
            ),
            34 => 
            array (
                'id' => 102,
                'tag' => 'category',
                'fk_id' => '2',
                'type' => 'restore',
                'date' => '2024-10-21',
                'time' => '13:49:56',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:49:56',
                'updated_at' => '2024-10-21 13:49:56',
            ),
            35 => 
            array (
                'id' => 103,
                'tag' => 'category',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-10-21',
                'time' => '13:51:18',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:51:18',
                'updated_at' => '2024-10-21 13:51:18',
            ),
            36 => 
            array (
                'id' => 104,
                'tag' => 'category',
                'fk_id' => '2',
                'type' => 'status',
                'date' => '2024-10-21',
                'time' => '13:51:20',
                'user_id' => 3,
                'created_at' => '2024-10-21 13:51:20',
                'updated_at' => '2024-10-21 13:51:20',
            ),
            37 => 
            array (
                'id' => 105,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-10-21',
                'time' => '23:46:48',
                'user_id' => 3,
                'created_at' => '2024-10-21 23:46:48',
                'updated_at' => '2024-10-21 23:46:48',
            ),
            38 => 
            array (
                'id' => 117,
                'tag' => 'color',
                'fk_id' => '1',
                'type' => 'status',
                'date' => '2024-10-23',
                'time' => '13:48:06',
                'user_id' => 3,
                'created_at' => '2024-10-23 13:48:06',
                'updated_at' => '2024-10-23 13:48:06',
            ),
            39 => 
            array (
                'id' => 119,
                'tag' => 'color',
                'fk_id' => '1',
                'type' => 'status',
                'date' => '2024-10-23',
                'time' => '13:48:13',
                'user_id' => 3,
                'created_at' => '2024-10-23 13:48:13',
                'updated_at' => '2024-10-23 13:48:13',
            ),
            40 => 
            array (
                'id' => 121,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-10-23',
                'time' => '13:52:53',
                'user_id' => 3,
                'created_at' => '2024-10-23 13:52:53',
                'updated_at' => '2024-10-23 13:52:53',
            ),
            41 => 
            array (
                'id' => 122,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-10-23',
                'time' => '13:54:08',
                'user_id' => 3,
                'created_at' => '2024-10-23 13:54:08',
                'updated_at' => '2024-10-23 13:54:08',
            ),
            42 => 
            array (
                'id' => 123,
                'tag' => 'user',
                'fk_id' => '3',
                'type' => 'profile_update',
                'date' => '2024-10-23',
                'time' => '13:54:25',
                'user_id' => 3,
                'created_at' => '2024-10-23 13:54:25',
                'updated_at' => '2024-10-23 13:54:25',
            ),
            43 => 
            array (
                'id' => 127,
                'tag' => 'color',
                'fk_id' => '1',
                'type' => 'status',
                'date' => '2024-10-24',
                'time' => '00:00:08',
                'user_id' => 3,
                'created_at' => '2024-10-24 00:00:08',
                'updated_at' => '2024-10-24 00:00:08',
            ),
            44 => 
            array (
                'id' => 128,
                'tag' => 'color',
                'fk_id' => '1',
                'type' => 'status',
                'date' => '2024-10-24',
                'time' => '00:00:12',
                'user_id' => 3,
                'created_at' => '2024-10-24 00:00:12',
                'updated_at' => '2024-10-24 00:00:12',
            ),
            45 => 
            array (
                'id' => 129,
                'tag' => 'color',
                'fk_id' => '1',
                'type' => 'restore',
                'date' => '2024-10-24',
                'time' => '00:03:11',
                'user_id' => 3,
                'created_at' => '2024-10-24 00:03:11',
                'updated_at' => '2024-10-24 00:03:11',
            ),
            46 => 
            array (
                'id' => 130,
                'tag' => 'color',
                'fk_id' => '1',
                'type' => 'restore',
                'date' => '2024-10-24',
                'time' => '00:03:44',
                'user_id' => 3,
                'created_at' => '2024-10-24 00:03:44',
                'updated_at' => '2024-10-24 00:03:44',
            ),
            47 => 
            array (
                'id' => 133,
                'tag' => 'color',
                'fk_id' => '6',
                'type' => 'status',
                'date' => '2024-10-27',
                'time' => '00:43:59',
                'user_id' => 3,
                'created_at' => '2024-10-27 00:43:59',
                'updated_at' => '2024-10-27 00:43:59',
            ),
            48 => 
            array (
                'id' => 134,
                'tag' => 'color',
                'fk_id' => '6',
                'type' => 'status',
                'date' => '2024-10-27',
                'time' => '00:44:03',
                'user_id' => 3,
                'created_at' => '2024-10-27 00:44:03',
                'updated_at' => '2024-10-27 00:44:03',
            ),
            49 => 
            array (
                'id' => 135,
                'tag' => 'size',
                'fk_id' => '1',
                'type' => 'update',
                'date' => '2024-10-28',
                'time' => '00:08:56',
                'user_id' => 3,
                'created_at' => '2024-10-28 00:08:56',
                'updated_at' => '2024-10-28 00:08:56',
            ),
        ));
        
        
    }
}