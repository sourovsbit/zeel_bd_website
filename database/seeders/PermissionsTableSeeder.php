<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 48,
                'name' => 'Menu Label create',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            1 => 
            array (
                'id' => 49,
                'name' => 'Menu Label view',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            2 => 
            array (
                'id' => 50,
                'name' => 'Menu Label edit',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            3 => 
            array (
                'id' => 51,
                'name' => 'Menu Label destroy',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            4 => 
            array (
                'id' => 52,
                'name' => 'Menu Label status',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            5 => 
            array (
                'id' => 53,
                'name' => 'Menu Label restore',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            6 => 
            array (
                'id' => 54,
                'name' => 'Menu Label delete',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            7 => 
            array (
                'id' => 55,
                'name' => 'Menu Label print',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            8 => 
            array (
                'id' => 56,
                'name' => 'Menu Label trash',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            9 => 
            array (
                'id' => 57,
                'name' => 'Menu Label show',
                'guard_name' => 'web',
                'parent' => 'Menu Label',
                'created_at' => '2024-06-22 11:58:46',
                'updated_at' => '2024-06-22 11:58:46',
            ),
            10 => 
            array (
                'id' => 58,
                'name' => 'Menu create',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            11 => 
            array (
                'id' => 59,
                'name' => 'Menu view',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            12 => 
            array (
                'id' => 60,
                'name' => 'Menu edit',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            13 => 
            array (
                'id' => 61,
                'name' => 'Menu destroy',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            14 => 
            array (
                'id' => 62,
                'name' => 'Menu status',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            15 => 
            array (
                'id' => 63,
                'name' => 'Menu restore',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            16 => 
            array (
                'id' => 64,
                'name' => 'Menu delete',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            17 => 
            array (
                'id' => 65,
                'name' => 'Menu print',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            18 => 
            array (
                'id' => 66,
                'name' => 'Menu trash',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            19 => 
            array (
                'id' => 67,
                'name' => 'Menu show',
                'guard_name' => 'web',
                'parent' => 'Menu',
                'created_at' => '2024-06-22 13:06:45',
                'updated_at' => '2024-06-22 13:06:45',
            ),
            20 => 
            array (
                'id' => 78,
                'name' => 'Users create',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            21 => 
            array (
                'id' => 79,
                'name' => 'Users view',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            22 => 
            array (
                'id' => 80,
                'name' => 'Users edit',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            23 => 
            array (
                'id' => 81,
                'name' => 'Users destroy',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            24 => 
            array (
                'id' => 82,
                'name' => 'Users status',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            25 => 
            array (
                'id' => 83,
                'name' => 'Users restore',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            26 => 
            array (
                'id' => 84,
                'name' => 'Users delete',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            27 => 
            array (
                'id' => 85,
                'name' => 'Users print',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            28 => 
            array (
                'id' => 86,
                'name' => 'Users trash',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            29 => 
            array (
                'id' => 87,
                'name' => 'Users show',
                'guard_name' => 'web',
                'parent' => 'Users',
                'created_at' => '2024-06-22 14:49:47',
                'updated_at' => '2024-06-22 14:49:47',
            ),
            30 => 
            array (
                'id' => 237,
                'name' => 'Dashboard view',
                'guard_name' => 'web',
                'parent' => 'Dashboard',
                'created_at' => '2024-12-05 15:40:34',
                'updated_at' => '2024-12-05 15:40:34',
            ),
            31 => 
            array (
                'id' => 256,
                'name' => 'Role create',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            32 => 
            array (
                'id' => 257,
                'name' => 'Role view',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            33 => 
            array (
                'id' => 258,
                'name' => 'Role edit',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            34 => 
            array (
                'id' => 259,
                'name' => 'Role destroy',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            35 => 
            array (
                'id' => 260,
                'name' => 'Role status',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            36 => 
            array (
                'id' => 261,
                'name' => 'Role restore',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            37 => 
            array (
                'id' => 262,
                'name' => 'Role delete',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            38 => 
            array (
                'id' => 263,
                'name' => 'Role print',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            39 => 
            array (
                'id' => 264,
                'name' => 'Role show',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:26',
                'updated_at' => '2024-12-07 13:16:26',
            ),
            40 => 
            array (
                'id' => 265,
                'name' => 'Role trash',
                'guard_name' => 'web',
                'parent' => 'Role',
                'created_at' => '2024-12-07 13:16:27',
                'updated_at' => '2024-12-07 13:16:27',
            ),
            41 => 
            array (
                'id' => 266,
                'name' => 'Product Item create',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:50',
                'updated_at' => '2024-12-07 13:20:50',
            ),
            42 => 
            array (
                'id' => 267,
                'name' => 'Product Item view',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:50',
                'updated_at' => '2024-12-07 13:20:50',
            ),
            43 => 
            array (
                'id' => 268,
                'name' => 'Product Item edit',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            44 => 
            array (
                'id' => 269,
                'name' => 'Product Item destroy',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            45 => 
            array (
                'id' => 270,
                'name' => 'Product Item status',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            46 => 
            array (
                'id' => 271,
                'name' => 'Product Item restore',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            47 => 
            array (
                'id' => 272,
                'name' => 'Product Item delete',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            48 => 
            array (
                'id' => 273,
                'name' => 'Product Item print',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            49 => 
            array (
                'id' => 274,
                'name' => 'Product Item show',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            50 => 
            array (
                'id' => 275,
                'name' => 'Product Item trash',
                'guard_name' => 'web',
                'parent' => 'Product Item',
                'created_at' => '2024-12-07 13:20:51',
                'updated_at' => '2024-12-07 13:20:51',
            ),
            51 => 
            array (
                'id' => 276,
                'name' => 'Product Category create',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:33',
                'updated_at' => '2024-12-07 17:03:33',
            ),
            52 => 
            array (
                'id' => 277,
                'name' => 'Product Category view',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:33',
                'updated_at' => '2024-12-07 17:03:33',
            ),
            53 => 
            array (
                'id' => 278,
                'name' => 'Product Category edit',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:33',
                'updated_at' => '2024-12-07 17:03:33',
            ),
            54 => 
            array (
                'id' => 279,
                'name' => 'Product Category destroy',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:33',
                'updated_at' => '2024-12-07 17:03:33',
            ),
            55 => 
            array (
                'id' => 280,
                'name' => 'Product Category status',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:33',
                'updated_at' => '2024-12-07 17:03:33',
            ),
            56 => 
            array (
                'id' => 281,
                'name' => 'Product Category restore',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:33',
                'updated_at' => '2024-12-07 17:03:33',
            ),
            57 => 
            array (
                'id' => 282,
                'name' => 'Product Category delete',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:34',
                'updated_at' => '2024-12-07 17:03:34',
            ),
            58 => 
            array (
                'id' => 283,
                'name' => 'Product Category print',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:34',
                'updated_at' => '2024-12-07 17:03:34',
            ),
            59 => 
            array (
                'id' => 284,
                'name' => 'Product Category show',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:34',
                'updated_at' => '2024-12-07 17:03:34',
            ),
            60 => 
            array (
                'id' => 285,
                'name' => 'Product Category trash',
                'guard_name' => 'web',
                'parent' => 'Product Category',
                'created_at' => '2024-12-07 17:03:34',
                'updated_at' => '2024-12-07 17:03:34',
            ),
            61 => 
            array (
                'id' => 295,
                'name' => 'Product Sub Category create',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            62 => 
            array (
                'id' => 296,
                'name' => 'Product Sub Category view',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            63 => 
            array (
                'id' => 297,
                'name' => 'Product Sub Category edit',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            64 => 
            array (
                'id' => 298,
                'name' => 'Product Sub Category destroy',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            65 => 
            array (
                'id' => 299,
                'name' => 'Product Sub Category status',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            66 => 
            array (
                'id' => 300,
                'name' => 'Product Sub Category restore',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            67 => 
            array (
                'id' => 301,
                'name' => 'Product Sub Category delete',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            68 => 
            array (
                'id' => 302,
                'name' => 'Product Sub Category print',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            69 => 
            array (
                'id' => 303,
                'name' => 'Product Sub Category show',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            70 => 
            array (
                'id' => 304,
                'name' => 'Product Sub Category trash',
                'guard_name' => 'web',
                'parent' => 'Product Sub Category',
                'created_at' => '2024-12-09 12:07:18',
                'updated_at' => '2024-12-09 12:07:18',
            ),
            71 => 
            array (
                'id' => 305,
                'name' => 'Product Brand create',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            72 => 
            array (
                'id' => 306,
                'name' => 'Product Brand view',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            73 => 
            array (
                'id' => 307,
                'name' => 'Product Brand edit',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            74 => 
            array (
                'id' => 308,
                'name' => 'Product Brand destroy',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            75 => 
            array (
                'id' => 309,
                'name' => 'Product Brand status',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            76 => 
            array (
                'id' => 310,
                'name' => 'Product Brand restore',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            77 => 
            array (
                'id' => 311,
                'name' => 'Product Brand delete',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            78 => 
            array (
                'id' => 312,
                'name' => 'Product Brand print',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            79 => 
            array (
                'id' => 313,
                'name' => 'Product Brand show',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            80 => 
            array (
                'id' => 314,
                'name' => 'Product Brand trash',
                'guard_name' => 'web',
                'parent' => 'Product Brand',
                'created_at' => '2024-12-09 12:10:03',
                'updated_at' => '2024-12-09 12:10:03',
            ),
            81 => 
            array (
                'id' => 315,
                'name' => 'Product Size create',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            82 => 
            array (
                'id' => 316,
                'name' => 'Product Size view',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            83 => 
            array (
                'id' => 317,
                'name' => 'Product Size edit',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            84 => 
            array (
                'id' => 318,
                'name' => 'Product Size destroy',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            85 => 
            array (
                'id' => 319,
                'name' => 'Product Size status',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            86 => 
            array (
                'id' => 320,
                'name' => 'Product Size restore',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            87 => 
            array (
                'id' => 321,
                'name' => 'Product Size delete',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            88 => 
            array (
                'id' => 322,
                'name' => 'Product Size print',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            89 => 
            array (
                'id' => 323,
                'name' => 'Product Size show',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            90 => 
            array (
                'id' => 324,
                'name' => 'Product Size trash',
                'guard_name' => 'web',
                'parent' => 'Product Size',
                'created_at' => '2024-12-10 10:52:39',
                'updated_at' => '2024-12-10 10:52:39',
            ),
            91 => 
            array (
                'id' => 325,
                'name' => 'Product Color create',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            92 => 
            array (
                'id' => 326,
                'name' => 'Product Color view',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            93 => 
            array (
                'id' => 327,
                'name' => 'Product Color edit',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            94 => 
            array (
                'id' => 328,
                'name' => 'Product Color destroy',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            95 => 
            array (
                'id' => 329,
                'name' => 'Product Color status',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            96 => 
            array (
                'id' => 330,
                'name' => 'Product Color restore',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            97 => 
            array (
                'id' => 331,
                'name' => 'Product Color delete',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            98 => 
            array (
                'id' => 332,
                'name' => 'Product Color print',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            99 => 
            array (
                'id' => 333,
                'name' => 'Product Color show',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            100 => 
            array (
                'id' => 334,
                'name' => 'Product Color trash',
                'guard_name' => 'web',
                'parent' => 'Product Color',
                'created_at' => '2024-12-10 10:53:32',
                'updated_at' => '2024-12-10 10:53:32',
            ),
            101 => 
            array (
                'id' => 335,
                'name' => 'Unit create',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:42',
                'updated_at' => '2024-12-10 16:35:42',
            ),
            102 => 
            array (
                'id' => 336,
                'name' => 'Unit view',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:42',
                'updated_at' => '2024-12-10 16:35:42',
            ),
            103 => 
            array (
                'id' => 337,
                'name' => 'Unit edit',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:42',
                'updated_at' => '2024-12-10 16:35:42',
            ),
            104 => 
            array (
                'id' => 338,
                'name' => 'Unit destroy',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:42',
                'updated_at' => '2024-12-10 16:35:42',
            ),
            105 => 
            array (
                'id' => 339,
                'name' => 'Unit status',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:42',
                'updated_at' => '2024-12-10 16:35:42',
            ),
            106 => 
            array (
                'id' => 340,
                'name' => 'Unit restore',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:43',
                'updated_at' => '2024-12-10 16:35:43',
            ),
            107 => 
            array (
                'id' => 341,
                'name' => 'Unit delete',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:43',
                'updated_at' => '2024-12-10 16:35:43',
            ),
            108 => 
            array (
                'id' => 342,
                'name' => 'Unit print',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:43',
                'updated_at' => '2024-12-10 16:35:43',
            ),
            109 => 
            array (
                'id' => 343,
                'name' => 'Unit show',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:43',
                'updated_at' => '2024-12-10 16:35:43',
            ),
            110 => 
            array (
                'id' => 344,
                'name' => 'Unit trash',
                'guard_name' => 'web',
                'parent' => 'Unit',
                'created_at' => '2024-12-10 16:35:43',
                'updated_at' => '2024-12-10 16:35:43',
            ),
            111 => 
            array (
                'id' => 345,
                'name' => 'Sub Unit create',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            112 => 
            array (
                'id' => 346,
                'name' => 'Sub Unit view',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            113 => 
            array (
                'id' => 347,
                'name' => 'Sub Unit edit',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            114 => 
            array (
                'id' => 348,
                'name' => 'Sub Unit destroy',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            115 => 
            array (
                'id' => 349,
                'name' => 'Sub Unit status',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            116 => 
            array (
                'id' => 350,
                'name' => 'Sub Unit restore',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            117 => 
            array (
                'id' => 351,
                'name' => 'Sub Unit delete',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:30',
                'updated_at' => '2024-12-10 16:36:30',
            ),
            118 => 
            array (
                'id' => 352,
                'name' => 'Sub Unit print',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:31',
                'updated_at' => '2024-12-10 16:36:31',
            ),
            119 => 
            array (
                'id' => 353,
                'name' => 'Sub Unit show',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:31',
                'updated_at' => '2024-12-10 16:36:31',
            ),
            120 => 
            array (
                'id' => 354,
                'name' => 'Sub Unit trash',
                'guard_name' => 'web',
                'parent' => 'Sub Unit',
                'created_at' => '2024-12-10 16:36:31',
                'updated_at' => '2024-12-10 16:36:31',
            ),
            121 => 
            array (
                'id' => 355,
                'name' => 'Product Information create',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:46',
                'updated_at' => '2024-12-12 12:52:46',
            ),
            122 => 
            array (
                'id' => 356,
                'name' => 'Product Information view',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:46',
                'updated_at' => '2024-12-12 12:52:46',
            ),
            123 => 
            array (
                'id' => 357,
                'name' => 'Product Information edit',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:46',
                'updated_at' => '2024-12-12 12:52:46',
            ),
            124 => 
            array (
                'id' => 358,
                'name' => 'Product Information destroy',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:46',
                'updated_at' => '2024-12-12 12:52:46',
            ),
            125 => 
            array (
                'id' => 359,
                'name' => 'Product Information status',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:46',
                'updated_at' => '2024-12-12 12:52:46',
            ),
            126 => 
            array (
                'id' => 360,
                'name' => 'Product Information restore',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:46',
                'updated_at' => '2024-12-12 12:52:46',
            ),
            127 => 
            array (
                'id' => 361,
                'name' => 'Product Information delete',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:47',
                'updated_at' => '2024-12-12 12:52:47',
            ),
            128 => 
            array (
                'id' => 362,
                'name' => 'Product Information print',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:47',
                'updated_at' => '2024-12-12 12:52:47',
            ),
            129 => 
            array (
                'id' => 363,
                'name' => 'Product Information show',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:47',
                'updated_at' => '2024-12-12 12:52:47',
            ),
            130 => 
            array (
                'id' => 364,
                'name' => 'Product Information trash',
                'guard_name' => 'web',
                'parent' => 'Product Information',
                'created_at' => '2024-12-12 12:52:47',
                'updated_at' => '2024-12-12 12:52:47',
            ),
            131 => 
            array (
                'id' => 404,
                'name' => 'Division Setup create',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            132 => 
            array (
                'id' => 405,
                'name' => 'Division Setup view',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            133 => 
            array (
                'id' => 406,
                'name' => 'Division Setup edit',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            134 => 
            array (
                'id' => 407,
                'name' => 'Division Setup destroy',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            135 => 
            array (
                'id' => 408,
                'name' => 'Division Setup status',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            136 => 
            array (
                'id' => 409,
                'name' => 'Division Setup restore',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            137 => 
            array (
                'id' => 410,
                'name' => 'Division Setup delete',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            138 => 
            array (
                'id' => 411,
                'name' => 'Division Setup print',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            139 => 
            array (
                'id' => 412,
                'name' => 'Division Setup show',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            140 => 
            array (
                'id' => 413,
                'name' => 'Division Setup trash',
                'guard_name' => 'web',
                'parent' => 'Division Setup',
                'created_at' => '2024-12-19 18:04:09',
                'updated_at' => '2024-12-19 18:04:09',
            ),
            141 => 
            array (
                'id' => 414,
                'name' => 'District Setup create',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            142 => 
            array (
                'id' => 415,
                'name' => 'District Setup view',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            143 => 
            array (
                'id' => 416,
                'name' => 'District Setup edit',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            144 => 
            array (
                'id' => 417,
                'name' => 'District Setup destroy',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            145 => 
            array (
                'id' => 418,
                'name' => 'District Setup status',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            146 => 
            array (
                'id' => 419,
                'name' => 'District Setup restore',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            147 => 
            array (
                'id' => 420,
                'name' => 'District Setup delete',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            148 => 
            array (
                'id' => 421,
                'name' => 'District Setup print',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            149 => 
            array (
                'id' => 422,
                'name' => 'District Setup show',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            150 => 
            array (
                'id' => 423,
                'name' => 'District Setup trash',
                'guard_name' => 'web',
                'parent' => 'District Setup',
                'created_at' => '2024-12-19 18:05:36',
                'updated_at' => '2024-12-19 18:05:36',
            ),
            151 => 
            array (
                'id' => 424,
                'name' => 'Vendor create',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            152 => 
            array (
                'id' => 425,
                'name' => 'Vendor view',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            153 => 
            array (
                'id' => 426,
                'name' => 'Vendor edit',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            154 => 
            array (
                'id' => 427,
                'name' => 'Vendor destroy',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            155 => 
            array (
                'id' => 428,
                'name' => 'Vendor status',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            156 => 
            array (
                'id' => 429,
                'name' => 'Vendor restore',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            157 => 
            array (
                'id' => 430,
                'name' => 'Vendor delete',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            158 => 
            array (
                'id' => 431,
                'name' => 'Vendor print',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            159 => 
            array (
                'id' => 432,
                'name' => 'Vendor show',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            160 => 
            array (
                'id' => 433,
                'name' => 'Vendor trash',
                'guard_name' => 'web',
                'parent' => 'Vendor',
                'created_at' => '2024-12-19 18:24:27',
                'updated_at' => '2024-12-19 18:24:27',
            ),
            161 => 
            array (
                'id' => 434,
                'name' => 'Supplier Info create',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            162 => 
            array (
                'id' => 435,
                'name' => 'Supplier Info view',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            163 => 
            array (
                'id' => 436,
                'name' => 'Supplier Info edit',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            164 => 
            array (
                'id' => 437,
                'name' => 'Supplier Info destroy',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            165 => 
            array (
                'id' => 438,
                'name' => 'Supplier Info status',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            166 => 
            array (
                'id' => 439,
                'name' => 'Supplier Info restore',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            167 => 
            array (
                'id' => 440,
                'name' => 'Supplier Info delete',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            168 => 
            array (
                'id' => 441,
                'name' => 'Supplier Info print',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            169 => 
            array (
                'id' => 442,
                'name' => 'Supplier Info show',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            170 => 
            array (
                'id' => 443,
                'name' => 'Supplier Info trash',
                'guard_name' => 'web',
                'parent' => 'Supplier Info',
                'created_at' => '2024-12-21 14:57:47',
                'updated_at' => '2024-12-21 14:57:47',
            ),
            171 => 
            array (
                'id' => 444,
                'name' => 'Shipping Class create',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            172 => 
            array (
                'id' => 445,
                'name' => 'Shipping Class view',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            173 => 
            array (
                'id' => 446,
                'name' => 'Shipping Class edit',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            174 => 
            array (
                'id' => 447,
                'name' => 'Shipping Class destroy',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            175 => 
            array (
                'id' => 448,
                'name' => 'Shipping Class status',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            176 => 
            array (
                'id' => 449,
                'name' => 'Shipping Class restore',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            177 => 
            array (
                'id' => 450,
                'name' => 'Shipping Class delete',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            178 => 
            array (
                'id' => 451,
                'name' => 'Shipping Class print',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            179 => 
            array (
                'id' => 452,
                'name' => 'Shipping Class show',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            180 => 
            array (
                'id' => 453,
                'name' => 'Shipping Class trash',
                'guard_name' => 'web',
                'parent' => 'Shipping Class',
                'created_at' => '2024-12-21 18:21:57',
                'updated_at' => '2024-12-21 18:21:57',
            ),
            181 => 
            array (
                'id' => 454,
                'name' => 'Thana Setup create',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:29',
                'updated_at' => '2024-12-22 11:59:29',
            ),
            182 => 
            array (
                'id' => 455,
                'name' => 'Thana Setup view',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:29',
                'updated_at' => '2024-12-22 11:59:29',
            ),
            183 => 
            array (
                'id' => 456,
                'name' => 'Thana Setup edit',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:29',
                'updated_at' => '2024-12-22 11:59:29',
            ),
            184 => 
            array (
                'id' => 457,
                'name' => 'Thana Setup destroy',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:29',
                'updated_at' => '2024-12-22 11:59:29',
            ),
            185 => 
            array (
                'id' => 458,
                'name' => 'Thana Setup status',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:29',
                'updated_at' => '2024-12-22 11:59:29',
            ),
            186 => 
            array (
                'id' => 459,
                'name' => 'Thana Setup restore',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:29',
                'updated_at' => '2024-12-22 11:59:29',
            ),
            187 => 
            array (
                'id' => 460,
                'name' => 'Thana Setup delete',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:30',
                'updated_at' => '2024-12-22 11:59:30',
            ),
            188 => 
            array (
                'id' => 461,
                'name' => 'Thana Setup print',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:30',
                'updated_at' => '2024-12-22 11:59:30',
            ),
            189 => 
            array (
                'id' => 462,
                'name' => 'Thana Setup show',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:30',
                'updated_at' => '2024-12-22 11:59:30',
            ),
            190 => 
            array (
                'id' => 463,
                'name' => 'Thana Setup trash',
                'guard_name' => 'web',
                'parent' => 'Thana Setup',
                'created_at' => '2024-12-22 11:59:30',
                'updated_at' => '2024-12-22 11:59:30',
            ),
            191 => 
            array (
                'id' => 464,
                'name' => 'Delivery Charge create',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:12',
                'updated_at' => '2024-12-22 17:39:12',
            ),
            192 => 
            array (
                'id' => 465,
                'name' => 'Delivery Charge view',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            193 => 
            array (
                'id' => 466,
                'name' => 'Delivery Charge edit',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            194 => 
            array (
                'id' => 467,
                'name' => 'Delivery Charge destroy',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            195 => 
            array (
                'id' => 468,
                'name' => 'Delivery Charge status',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            196 => 
            array (
                'id' => 469,
                'name' => 'Delivery Charge restore',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            197 => 
            array (
                'id' => 470,
                'name' => 'Delivery Charge delete',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            198 => 
            array (
                'id' => 471,
                'name' => 'Delivery Charge print',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            199 => 
            array (
                'id' => 472,
                'name' => 'Delivery Charge show',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            200 => 
            array (
                'id' => 473,
                'name' => 'Delivery Charge trash',
                'guard_name' => 'web',
                'parent' => 'Delivery Charge',
                'created_at' => '2024-12-22 17:39:13',
                'updated_at' => '2024-12-22 17:39:13',
            ),
            201 => 
            array (
                'id' => 474,
                'name' => 'About Us create',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            202 => 
            array (
                'id' => 475,
                'name' => 'About Us view',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            203 => 
            array (
                'id' => 476,
                'name' => 'About Us edit',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            204 => 
            array (
                'id' => 477,
                'name' => 'About Us destroy',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            205 => 
            array (
                'id' => 478,
                'name' => 'About Us status',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            206 => 
            array (
                'id' => 479,
                'name' => 'About Us restore',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            207 => 
            array (
                'id' => 480,
                'name' => 'About Us delete',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            208 => 
            array (
                'id' => 481,
                'name' => 'About Us print',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            209 => 
            array (
                'id' => 482,
                'name' => 'About Us show',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            210 => 
            array (
                'id' => 483,
                'name' => 'About Us trash',
                'guard_name' => 'web',
                'parent' => 'About Us',
                'created_at' => '2025-02-10 13:57:07',
                'updated_at' => '2025-02-10 13:57:07',
            ),
            211 => 
            array (
                'id' => 484,
                'name' => 'Company Profile create',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            212 => 
            array (
                'id' => 485,
                'name' => 'Company Profile view',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            213 => 
            array (
                'id' => 486,
                'name' => 'Company Profile edit',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            214 => 
            array (
                'id' => 487,
                'name' => 'Company Profile destroy',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            215 => 
            array (
                'id' => 488,
                'name' => 'Company Profile status',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            216 => 
            array (
                'id' => 489,
                'name' => 'Company Profile restore',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            217 => 
            array (
                'id' => 490,
                'name' => 'Company Profile delete',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            218 => 
            array (
                'id' => 491,
                'name' => 'Company Profile print',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            219 => 
            array (
                'id' => 492,
                'name' => 'Company Profile show',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            220 => 
            array (
                'id' => 493,
                'name' => 'Company Profile trash',
                'guard_name' => 'web',
                'parent' => 'Company Profile',
                'created_at' => '2025-02-10 17:36:58',
                'updated_at' => '2025-02-10 17:36:58',
            ),
            221 => 
            array (
                'id' => 494,
                'name' => 'Blog create',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:16',
                'updated_at' => '2025-02-11 15:02:16',
            ),
            222 => 
            array (
                'id' => 495,
                'name' => 'Blog view',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:16',
                'updated_at' => '2025-02-11 15:02:16',
            ),
            223 => 
            array (
                'id' => 496,
                'name' => 'Blog edit',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:16',
                'updated_at' => '2025-02-11 15:02:16',
            ),
            224 => 
            array (
                'id' => 497,
                'name' => 'Blog destroy',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            225 => 
            array (
                'id' => 498,
                'name' => 'Blog status',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            226 => 
            array (
                'id' => 499,
                'name' => 'Blog restore',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            227 => 
            array (
                'id' => 500,
                'name' => 'Blog delete',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            228 => 
            array (
                'id' => 501,
                'name' => 'Blog print',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            229 => 
            array (
                'id' => 502,
                'name' => 'Blog show',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            230 => 
            array (
                'id' => 503,
                'name' => 'Blog trash',
                'guard_name' => 'web',
                'parent' => 'Blog',
                'created_at' => '2025-02-11 15:02:17',
                'updated_at' => '2025-02-11 15:02:17',
            ),
            231 => 
            array (
                'id' => 504,
                'name' => 'Privacy Policy create',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:50',
                'updated_at' => '2025-02-11 16:45:50',
            ),
            232 => 
            array (
                'id' => 505,
                'name' => 'Privacy Policy view',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:50',
                'updated_at' => '2025-02-11 16:45:50',
            ),
            233 => 
            array (
                'id' => 506,
                'name' => 'Privacy Policy edit',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:50',
                'updated_at' => '2025-02-11 16:45:50',
            ),
            234 => 
            array (
                'id' => 507,
                'name' => 'Privacy Policy destroy',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:50',
                'updated_at' => '2025-02-11 16:45:50',
            ),
            235 => 
            array (
                'id' => 508,
                'name' => 'Privacy Policy status',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:50',
                'updated_at' => '2025-02-11 16:45:50',
            ),
            236 => 
            array (
                'id' => 509,
                'name' => 'Privacy Policy restore',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:50',
                'updated_at' => '2025-02-11 16:45:50',
            ),
            237 => 
            array (
                'id' => 510,
                'name' => 'Privacy Policy delete',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:51',
                'updated_at' => '2025-02-11 16:45:51',
            ),
            238 => 
            array (
                'id' => 511,
                'name' => 'Privacy Policy print',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:51',
                'updated_at' => '2025-02-11 16:45:51',
            ),
            239 => 
            array (
                'id' => 512,
                'name' => 'Privacy Policy show',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:51',
                'updated_at' => '2025-02-11 16:45:51',
            ),
            240 => 
            array (
                'id' => 513,
                'name' => 'Privacy Policy trash',
                'guard_name' => 'web',
                'parent' => 'Privacy Policy',
                'created_at' => '2025-02-11 16:45:51',
                'updated_at' => '2025-02-11 16:45:51',
            ),
            241 => 
            array (
                'id' => 514,
                'name' => 'Terms & Conditions create',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:37',
                'updated_at' => '2025-02-11 17:07:37',
            ),
            242 => 
            array (
                'id' => 515,
                'name' => 'Terms & Conditions view',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:37',
                'updated_at' => '2025-02-11 17:07:37',
            ),
            243 => 
            array (
                'id' => 516,
                'name' => 'Terms & Conditions edit',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:37',
                'updated_at' => '2025-02-11 17:07:37',
            ),
            244 => 
            array (
                'id' => 517,
                'name' => 'Terms & Conditions destroy',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:37',
                'updated_at' => '2025-02-11 17:07:37',
            ),
            245 => 
            array (
                'id' => 518,
                'name' => 'Terms & Conditions status',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:38',
                'updated_at' => '2025-02-11 17:07:38',
            ),
            246 => 
            array (
                'id' => 519,
                'name' => 'Terms & Conditions restore',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:38',
                'updated_at' => '2025-02-11 17:07:38',
            ),
            247 => 
            array (
                'id' => 520,
                'name' => 'Terms & Conditions delete',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:38',
                'updated_at' => '2025-02-11 17:07:38',
            ),
            248 => 
            array (
                'id' => 521,
                'name' => 'Terms & Conditions print',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:38',
                'updated_at' => '2025-02-11 17:07:38',
            ),
            249 => 
            array (
                'id' => 522,
                'name' => 'Terms & Conditions show',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:38',
                'updated_at' => '2025-02-11 17:07:38',
            ),
            250 => 
            array (
                'id' => 523,
                'name' => 'Terms & Conditions trash',
                'guard_name' => 'web',
                'parent' => 'Terms & Conditions',
                'created_at' => '2025-02-11 17:07:38',
                'updated_at' => '2025-02-11 17:07:38',
            ),
            251 => 
            array (
                'id' => 524,
                'name' => 'Return & Refund Policy create',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:23',
                'updated_at' => '2025-02-11 17:09:23',
            ),
            252 => 
            array (
                'id' => 525,
                'name' => 'Return & Refund Policy view',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:23',
                'updated_at' => '2025-02-11 17:09:23',
            ),
            253 => 
            array (
                'id' => 526,
                'name' => 'Return & Refund Policy edit',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:23',
                'updated_at' => '2025-02-11 17:09:23',
            ),
            254 => 
            array (
                'id' => 527,
                'name' => 'Return & Refund Policy destroy',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:23',
                'updated_at' => '2025-02-11 17:09:23',
            ),
            255 => 
            array (
                'id' => 528,
                'name' => 'Return & Refund Policy status',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:23',
                'updated_at' => '2025-02-11 17:09:23',
            ),
            256 => 
            array (
                'id' => 529,
                'name' => 'Return & Refund Policy restore',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:23',
                'updated_at' => '2025-02-11 17:09:23',
            ),
            257 => 
            array (
                'id' => 530,
                'name' => 'Return & Refund Policy delete',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:24',
                'updated_at' => '2025-02-11 17:09:24',
            ),
            258 => 
            array (
                'id' => 531,
                'name' => 'Return & Refund Policy print',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:24',
                'updated_at' => '2025-02-11 17:09:24',
            ),
            259 => 
            array (
                'id' => 532,
                'name' => 'Return & Refund Policy show',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:24',
                'updated_at' => '2025-02-11 17:09:24',
            ),
            260 => 
            array (
                'id' => 533,
                'name' => 'Return & Refund Policy trash',
                'guard_name' => 'web',
                'parent' => 'Return & Refund Policy',
                'created_at' => '2025-02-11 17:09:24',
                'updated_at' => '2025-02-11 17:09:24',
            ),
            261 => 
            array (
                'id' => 534,
                'name' => 'Service create',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            262 => 
            array (
                'id' => 535,
                'name' => 'Service view',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            263 => 
            array (
                'id' => 536,
                'name' => 'Service edit',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            264 => 
            array (
                'id' => 537,
                'name' => 'Service destroy',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            265 => 
            array (
                'id' => 538,
                'name' => 'Service status',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            266 => 
            array (
                'id' => 539,
                'name' => 'Service restore',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            267 => 
            array (
                'id' => 540,
                'name' => 'Service delete',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            268 => 
            array (
                'id' => 541,
                'name' => 'Service print',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            269 => 
            array (
                'id' => 542,
                'name' => 'Service show',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            270 => 
            array (
                'id' => 543,
                'name' => 'Service trash',
                'guard_name' => 'web',
                'parent' => 'Service',
                'created_at' => '2025-02-13 13:27:24',
                'updated_at' => '2025-02-13 13:27:24',
            ),
            271 => 
            array (
                'id' => 564,
                'name' => 'Create Employee create',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:38',
                'updated_at' => '2025-02-16 11:15:38',
            ),
            272 => 
            array (
                'id' => 565,
                'name' => 'Create Employee view',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            273 => 
            array (
                'id' => 566,
                'name' => 'Create Employee edit',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            274 => 
            array (
                'id' => 567,
                'name' => 'Create Employee destroy',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            275 => 
            array (
                'id' => 568,
                'name' => 'Create Employee status',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            276 => 
            array (
                'id' => 569,
                'name' => 'Create Employee restore',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            277 => 
            array (
                'id' => 570,
                'name' => 'Create Employee delete',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            278 => 
            array (
                'id' => 571,
                'name' => 'Create Employee print',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            279 => 
            array (
                'id' => 572,
                'name' => 'Create Employee show',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            280 => 
            array (
                'id' => 573,
                'name' => 'Create Employee trash',
                'guard_name' => 'web',
                'parent' => 'Create Employee',
                'created_at' => '2025-02-16 11:15:39',
                'updated_at' => '2025-02-16 11:15:39',
            ),
            281 => 
            array (
                'id' => 574,
                'name' => 'Create Clients create',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            282 => 
            array (
                'id' => 575,
                'name' => 'Create Clients view',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            283 => 
            array (
                'id' => 576,
                'name' => 'Create Clients edit',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            284 => 
            array (
                'id' => 577,
                'name' => 'Create Clients destroy',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            285 => 
            array (
                'id' => 578,
                'name' => 'Create Clients status',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            286 => 
            array (
                'id' => 579,
                'name' => 'Create Clients restore',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            287 => 
            array (
                'id' => 580,
                'name' => 'Create Clients delete',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            288 => 
            array (
                'id' => 581,
                'name' => 'Create Clients print',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            289 => 
            array (
                'id' => 582,
                'name' => 'Create Clients show',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            290 => 
            array (
                'id' => 583,
                'name' => 'Create Clients trash',
                'guard_name' => 'web',
                'parent' => 'Create Clients',
                'created_at' => '2025-02-16 11:21:00',
                'updated_at' => '2025-02-16 11:21:00',
            ),
            291 => 
            array (
                'id' => 594,
                'name' => 'Create News & Events create',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:06',
                'updated_at' => '2025-02-16 17:06:06',
            ),
            292 => 
            array (
                'id' => 595,
                'name' => 'Create News & Events view',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:06',
                'updated_at' => '2025-02-16 17:06:06',
            ),
            293 => 
            array (
                'id' => 596,
                'name' => 'Create News & Events edit',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:06',
                'updated_at' => '2025-02-16 17:06:06',
            ),
            294 => 
            array (
                'id' => 597,
                'name' => 'Create News & Events destroy',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:06',
                'updated_at' => '2025-02-16 17:06:06',
            ),
            295 => 
            array (
                'id' => 598,
                'name' => 'Create News & Events status',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:06',
                'updated_at' => '2025-02-16 17:06:06',
            ),
            296 => 
            array (
                'id' => 599,
                'name' => 'Create News & Events restore',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:07',
                'updated_at' => '2025-02-16 17:06:07',
            ),
            297 => 
            array (
                'id' => 600,
                'name' => 'Create News & Events delete',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:07',
                'updated_at' => '2025-02-16 17:06:07',
            ),
            298 => 
            array (
                'id' => 601,
                'name' => 'Create News & Events print',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:07',
                'updated_at' => '2025-02-16 17:06:07',
            ),
            299 => 
            array (
                'id' => 602,
                'name' => 'Create News & Events show',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:07',
                'updated_at' => '2025-02-16 17:06:07',
            ),
            300 => 
            array (
                'id' => 603,
                'name' => 'Create News & Events trash',
                'guard_name' => 'web',
                'parent' => 'Create News & Events',
                'created_at' => '2025-02-16 17:06:07',
                'updated_at' => '2025-02-16 17:06:07',
            ),
            301 => 
            array (
                'id' => 614,
                'name' => 'Service Category create',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            302 => 
            array (
                'id' => 615,
                'name' => 'Service Category view',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            303 => 
            array (
                'id' => 616,
                'name' => 'Service Category edit',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            304 => 
            array (
                'id' => 617,
                'name' => 'Service Category destroy',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            305 => 
            array (
                'id' => 618,
                'name' => 'Service Category status',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            306 => 
            array (
                'id' => 619,
                'name' => 'Service Category restore',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            307 => 
            array (
                'id' => 620,
                'name' => 'Service Category delete',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            308 => 
            array (
                'id' => 621,
                'name' => 'Service Category print',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            309 => 
            array (
                'id' => 622,
                'name' => 'Service Category show',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:11',
                'updated_at' => '2025-03-02 14:09:11',
            ),
            310 => 
            array (
                'id' => 623,
                'name' => 'Service Category trash',
                'guard_name' => 'web',
                'parent' => 'Service Category',
                'created_at' => '2025-03-02 14:09:12',
                'updated_at' => '2025-03-02 14:09:12',
            ),
            311 => 
            array (
                'id' => 634,
                'name' => 'Bookings create',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            312 => 
            array (
                'id' => 635,
                'name' => 'Bookings view',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            313 => 
            array (
                'id' => 636,
                'name' => 'Bookings edit',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            314 => 
            array (
                'id' => 637,
                'name' => 'Bookings destroy',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            315 => 
            array (
                'id' => 638,
                'name' => 'Bookings status',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            316 => 
            array (
                'id' => 639,
                'name' => 'Bookings restore',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            317 => 
            array (
                'id' => 640,
                'name' => 'Bookings delete',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:46',
                'updated_at' => '2025-03-09 15:09:46',
            ),
            318 => 
            array (
                'id' => 641,
                'name' => 'Bookings print',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:47',
                'updated_at' => '2025-03-09 15:09:47',
            ),
            319 => 
            array (
                'id' => 642,
                'name' => 'Bookings show',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:47',
                'updated_at' => '2025-03-09 15:09:47',
            ),
            320 => 
            array (
                'id' => 643,
                'name' => 'Bookings trash',
                'guard_name' => 'web',
                'parent' => 'Bookings',
                'created_at' => '2025-03-09 15:09:47',
                'updated_at' => '2025-03-09 15:09:47',
            ),
            321 => 
            array (
                'id' => 654,
                'name' => 'Career create',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            322 => 
            array (
                'id' => 655,
                'name' => 'Career view',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            323 => 
            array (
                'id' => 656,
                'name' => 'Career edit',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            324 => 
            array (
                'id' => 657,
                'name' => 'Career destroy',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            325 => 
            array (
                'id' => 658,
                'name' => 'Career status',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            326 => 
            array (
                'id' => 659,
                'name' => 'Career restore',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            327 => 
            array (
                'id' => 660,
                'name' => 'Career delete',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            328 => 
            array (
                'id' => 661,
                'name' => 'Career print',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            329 => 
            array (
                'id' => 662,
                'name' => 'Career show',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            330 => 
            array (
                'id' => 663,
                'name' => 'Career trash',
                'guard_name' => 'web',
                'parent' => 'Career',
                'created_at' => '2025-03-10 14:14:04',
                'updated_at' => '2025-03-10 14:14:04',
            ),
            331 => 
            array (
                'id' => 664,
                'name' => 'Service Guarantee create',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:04',
                'updated_at' => '2025-03-11 01:40:04',
            ),
            332 => 
            array (
                'id' => 665,
                'name' => 'Service Guarantee view',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:04',
                'updated_at' => '2025-03-11 01:40:04',
            ),
            333 => 
            array (
                'id' => 666,
                'name' => 'Service Guarantee edit',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:04',
                'updated_at' => '2025-03-11 01:40:04',
            ),
            334 => 
            array (
                'id' => 667,
                'name' => 'Service Guarantee destroy',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:04',
                'updated_at' => '2025-03-11 01:40:04',
            ),
            335 => 
            array (
                'id' => 668,
                'name' => 'Service Guarantee status',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:04',
                'updated_at' => '2025-03-11 01:40:04',
            ),
            336 => 
            array (
                'id' => 669,
                'name' => 'Service Guarantee restore',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:05',
                'updated_at' => '2025-03-11 01:40:05',
            ),
            337 => 
            array (
                'id' => 670,
                'name' => 'Service Guarantee delete',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:05',
                'updated_at' => '2025-03-11 01:40:05',
            ),
            338 => 
            array (
                'id' => 671,
                'name' => 'Service Guarantee print',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:05',
                'updated_at' => '2025-03-11 01:40:05',
            ),
            339 => 
            array (
                'id' => 672,
                'name' => 'Service Guarantee show',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:05',
                'updated_at' => '2025-03-11 01:40:05',
            ),
            340 => 
            array (
                'id' => 673,
                'name' => 'Service Guarantee trash',
                'guard_name' => 'web',
                'parent' => 'Service Guarantee',
                'created_at' => '2025-03-11 01:40:05',
                'updated_at' => '2025-03-11 01:40:05',
            ),
            341 => 
            array (
                'id' => 674,
                'name' => 'Create Ads create',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            342 => 
            array (
                'id' => 675,
                'name' => 'Create Ads view',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            343 => 
            array (
                'id' => 676,
                'name' => 'Create Ads edit',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            344 => 
            array (
                'id' => 677,
                'name' => 'Create Ads destroy',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            345 => 
            array (
                'id' => 678,
                'name' => 'Create Ads status',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            346 => 
            array (
                'id' => 679,
                'name' => 'Create Ads restore',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            347 => 
            array (
                'id' => 680,
                'name' => 'Create Ads delete',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:03',
                'updated_at' => '2025-03-11 01:42:03',
            ),
            348 => 
            array (
                'id' => 681,
                'name' => 'Create Ads print',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:04',
                'updated_at' => '2025-03-11 01:42:04',
            ),
            349 => 
            array (
                'id' => 682,
                'name' => 'Create Ads show',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:04',
                'updated_at' => '2025-03-11 01:42:04',
            ),
            350 => 
            array (
                'id' => 683,
                'name' => 'Create Ads trash',
                'guard_name' => 'web',
                'parent' => 'Create Ads',
                'created_at' => '2025-03-11 01:42:04',
                'updated_at' => '2025-03-11 01:42:04',
            ),
            351 => 
            array (
                'id' => 684,
                'name' => 'Message create',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            352 => 
            array (
                'id' => 685,
                'name' => 'Message view',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            353 => 
            array (
                'id' => 686,
                'name' => 'Message edit',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            354 => 
            array (
                'id' => 687,
                'name' => 'Message destroy',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            355 => 
            array (
                'id' => 688,
                'name' => 'Message status',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            356 => 
            array (
                'id' => 689,
                'name' => 'Message restore',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            357 => 
            array (
                'id' => 690,
                'name' => 'Message delete',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            358 => 
            array (
                'id' => 691,
                'name' => 'Message print',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:02',
                'updated_at' => '2025-03-11 15:17:02',
            ),
            359 => 
            array (
                'id' => 692,
                'name' => 'Message show',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:03',
                'updated_at' => '2025-03-11 15:17:03',
            ),
            360 => 
            array (
                'id' => 693,
                'name' => 'Message trash',
                'guard_name' => 'web',
                'parent' => 'Message',
                'created_at' => '2025-03-11 15:17:03',
                'updated_at' => '2025-03-11 15:17:03',
            ),
            361 => 
            array (
                'id' => 694,
                'name' => 'Reviews create',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            362 => 
            array (
                'id' => 695,
                'name' => 'Reviews view',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            363 => 
            array (
                'id' => 696,
                'name' => 'Reviews edit',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            364 => 
            array (
                'id' => 697,
                'name' => 'Reviews destroy',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            365 => 
            array (
                'id' => 698,
                'name' => 'Reviews status',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            366 => 
            array (
                'id' => 699,
                'name' => 'Reviews restore',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            367 => 
            array (
                'id' => 700,
                'name' => 'Reviews delete',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:38',
                'updated_at' => '2025-03-11 15:18:38',
            ),
            368 => 
            array (
                'id' => 701,
                'name' => 'Reviews print',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:39',
                'updated_at' => '2025-03-11 15:18:39',
            ),
            369 => 
            array (
                'id' => 702,
                'name' => 'Reviews show',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:39',
                'updated_at' => '2025-03-11 15:18:39',
            ),
            370 => 
            array (
                'id' => 703,
                'name' => 'Reviews trash',
                'guard_name' => 'web',
                'parent' => 'Reviews',
                'created_at' => '2025-03-11 15:18:39',
                'updated_at' => '2025-03-11 15:18:39',
            ),
            371 => 
            array (
                'id' => 704,
                'name' => 'Faq create',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            372 => 
            array (
                'id' => 705,
                'name' => 'Faq view',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            373 => 
            array (
                'id' => 706,
                'name' => 'Faq edit',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            374 => 
            array (
                'id' => 707,
                'name' => 'Faq destroy',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            375 => 
            array (
                'id' => 708,
                'name' => 'Faq status',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            376 => 
            array (
                'id' => 709,
                'name' => 'Faq restore',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            377 => 
            array (
                'id' => 710,
                'name' => 'Faq delete',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            378 => 
            array (
                'id' => 711,
                'name' => 'Faq print',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            379 => 
            array (
                'id' => 712,
                'name' => 'Faq show',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            380 => 
            array (
                'id' => 713,
                'name' => 'Faq trash',
                'guard_name' => 'web',
                'parent' => 'Faq',
                'created_at' => '2025-03-12 15:40:10',
                'updated_at' => '2025-03-12 15:40:10',
            ),
            381 => 
            array (
                'id' => 714,
                'name' => 'Create Blogs create',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            382 => 
            array (
                'id' => 715,
                'name' => 'Create Blogs view',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            383 => 
            array (
                'id' => 716,
                'name' => 'Create Blogs edit',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            384 => 
            array (
                'id' => 717,
                'name' => 'Create Blogs destroy',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            385 => 
            array (
                'id' => 718,
                'name' => 'Create Blogs status',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            386 => 
            array (
                'id' => 719,
                'name' => 'Create Blogs restore',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            387 => 
            array (
                'id' => 720,
                'name' => 'Create Blogs delete',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            388 => 
            array (
                'id' => 721,
                'name' => 'Create Blogs print',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            389 => 
            array (
                'id' => 722,
                'name' => 'Create Blogs show',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            390 => 
            array (
                'id' => 723,
                'name' => 'Create Blogs trash',
                'guard_name' => 'web',
                'parent' => 'Create Blogs',
                'created_at' => '2025-04-21 18:02:42',
                'updated_at' => '2025-04-21 18:02:42',
            ),
            391 => 
            array (
                'id' => 724,
                'name' => 'News & Events create',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:01',
                'updated_at' => '2025-04-21 19:07:01',
            ),
            392 => 
            array (
                'id' => 725,
                'name' => 'News & Events view',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            393 => 
            array (
                'id' => 726,
                'name' => 'News & Events edit',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            394 => 
            array (
                'id' => 727,
                'name' => 'News & Events destroy',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            395 => 
            array (
                'id' => 728,
                'name' => 'News & Events status',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            396 => 
            array (
                'id' => 729,
                'name' => 'News & Events restore',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            397 => 
            array (
                'id' => 730,
                'name' => 'News & Events delete',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            398 => 
            array (
                'id' => 731,
                'name' => 'News & Events print',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            399 => 
            array (
                'id' => 732,
                'name' => 'News & Events show',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            400 => 
            array (
                'id' => 733,
                'name' => 'News & Events trash',
                'guard_name' => 'web',
                'parent' => 'News & Events',
                'created_at' => '2025-04-21 19:07:02',
                'updated_at' => '2025-04-21 19:07:02',
            ),
            401 => 
            array (
                'id' => 734,
                'name' => 'Photo Gallery create',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            402 => 
            array (
                'id' => 735,
                'name' => 'Photo Gallery view',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            403 => 
            array (
                'id' => 736,
                'name' => 'Photo Gallery edit',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            404 => 
            array (
                'id' => 737,
                'name' => 'Photo Gallery destroy',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            405 => 
            array (
                'id' => 738,
                'name' => 'Photo Gallery status',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            406 => 
            array (
                'id' => 739,
                'name' => 'Photo Gallery restore',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            407 => 
            array (
                'id' => 740,
                'name' => 'Photo Gallery delete',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:19',
                'updated_at' => '2025-04-23 11:36:19',
            ),
            408 => 
            array (
                'id' => 741,
                'name' => 'Photo Gallery print',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:20',
                'updated_at' => '2025-04-23 11:36:20',
            ),
            409 => 
            array (
                'id' => 742,
                'name' => 'Photo Gallery show',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:20',
                'updated_at' => '2025-04-23 11:36:20',
            ),
            410 => 
            array (
                'id' => 743,
                'name' => 'Photo Gallery trash',
                'guard_name' => 'web',
                'parent' => 'Photo Gallery',
                'created_at' => '2025-04-23 11:36:20',
                'updated_at' => '2025-04-23 11:36:20',
            ),
            411 => 
            array (
                'id' => 744,
                'name' => 'Video Gallery create',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:01',
                'updated_at' => '2025-04-23 11:37:01',
            ),
            412 => 
            array (
                'id' => 745,
                'name' => 'Video Gallery view',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:01',
                'updated_at' => '2025-04-23 11:37:01',
            ),
            413 => 
            array (
                'id' => 746,
                'name' => 'Video Gallery edit',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:01',
                'updated_at' => '2025-04-23 11:37:01',
            ),
            414 => 
            array (
                'id' => 747,
                'name' => 'Video Gallery destroy',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:01',
                'updated_at' => '2025-04-23 11:37:01',
            ),
            415 => 
            array (
                'id' => 748,
                'name' => 'Video Gallery status',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:01',
                'updated_at' => '2025-04-23 11:37:01',
            ),
            416 => 
            array (
                'id' => 749,
                'name' => 'Video Gallery restore',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:01',
                'updated_at' => '2025-04-23 11:37:01',
            ),
            417 => 
            array (
                'id' => 750,
                'name' => 'Video Gallery delete',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:02',
                'updated_at' => '2025-04-23 11:37:02',
            ),
            418 => 
            array (
                'id' => 751,
                'name' => 'Video Gallery print',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:02',
                'updated_at' => '2025-04-23 11:37:02',
            ),
            419 => 
            array (
                'id' => 752,
                'name' => 'Video Gallery show',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:02',
                'updated_at' => '2025-04-23 11:37:02',
            ),
            420 => 
            array (
                'id' => 753,
                'name' => 'Video Gallery trash',
                'guard_name' => 'web',
                'parent' => 'Video Gallery',
                'created_at' => '2025-04-23 11:37:02',
                'updated_at' => '2025-04-23 11:37:02',
            ),
            421 => 
            array (
                'id' => 754,
                'name' => 'Mission Vision create',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:13',
                'updated_at' => '2025-04-23 13:06:13',
            ),
            422 => 
            array (
                'id' => 755,
                'name' => 'Mission Vision view',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:13',
                'updated_at' => '2025-04-23 13:06:13',
            ),
            423 => 
            array (
                'id' => 756,
                'name' => 'Mission Vision edit',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:13',
                'updated_at' => '2025-04-23 13:06:13',
            ),
            424 => 
            array (
                'id' => 757,
                'name' => 'Mission Vision destroy',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:13',
                'updated_at' => '2025-04-23 13:06:13',
            ),
            425 => 
            array (
                'id' => 758,
                'name' => 'Mission Vision status',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:13',
                'updated_at' => '2025-04-23 13:06:13',
            ),
            426 => 
            array (
                'id' => 759,
                'name' => 'Mission Vision restore',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:14',
                'updated_at' => '2025-04-23 13:06:14',
            ),
            427 => 
            array (
                'id' => 760,
                'name' => 'Mission Vision delete',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:14',
                'updated_at' => '2025-04-23 13:06:14',
            ),
            428 => 
            array (
                'id' => 761,
                'name' => 'Mission Vision print',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:14',
                'updated_at' => '2025-04-23 13:06:14',
            ),
            429 => 
            array (
                'id' => 762,
                'name' => 'Mission Vision show',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:14',
                'updated_at' => '2025-04-23 13:06:14',
            ),
            430 => 
            array (
                'id' => 763,
                'name' => 'Mission Vision trash',
                'guard_name' => 'web',
                'parent' => 'Mission Vision',
                'created_at' => '2025-04-23 13:06:14',
                'updated_at' => '2025-04-23 13:06:14',
            ),
        ));
        
        
    }
}