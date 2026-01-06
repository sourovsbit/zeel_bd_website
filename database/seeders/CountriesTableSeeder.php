<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('countries')->delete();
        
        \DB::table('countries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'country_name' => 'Afghanistan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
            'country_name' => 'Åland (Finland)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'country_name' => 'Albania',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'country_name' => 'Algeria',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
            'country_name' => 'American Samoa (US)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'country_name' => 'Andorra',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'country_name' => 'Angola',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
            'country_name' => 'Anguilla (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'country_name' => 'Antigua and Barbuda',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'country_name' => 'Argentina',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'country_name' => 'Armenia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'country_name' => 'Artsakh',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
            'country_name' => 'Aruba (Netherlands)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'country_name' => 'Australia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'country_name' => 'Austria',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'country_name' => 'Azerbaijan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'country_name' => 'Bahamas',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'country_name' => 'Bahrain',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'country_name' => 'Bangladesh',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'country_name' => 'Barbados',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'country_name' => 'Belarus',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'country_name' => 'Belgium',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'country_name' => 'Belize',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'country_name' => 'Benin',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
            'country_name' => 'Bermuda (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'country_name' => 'Bhutan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'country_name' => 'Bolivia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
            'country_name' => 'Bonaire (Netherlands)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'country_name' => 'Bosnia and Herzegovina',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'country_name' => 'Botswana',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'country_name' => 'Brazil',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
            'country_name' => 'British Virgin Islands (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'country_name' => 'Brunei',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'country_name' => 'Bulgaria',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'country_name' => 'Burkina Faso',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'country_name' => 'Burundi',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'country_name' => 'Cambodia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'country_name' => 'Cameroon',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'country_name' => 'Canada',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'country_name' => 'Cape Verde',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
            'country_name' => 'Cayman Islands (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'country_name' => 'Central African Republic',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'country_name' => 'Chad',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'country_name' => 'Chile',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'country_name' => 'China',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
            'country_name' => 'Christmas Island (Australia)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
            'country_name' => 'Cocos (Keeling) Islands (Australia)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'country_name' => 'Colombia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'country_name' => 'Comoros',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'country_name' => 'Congo',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'country_name' => 'Cook Islands',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'country_name' => 'Costa Rica',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'country_name' => 'Croatia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'country_name' => 'Cuba',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
            'country_name' => 'Curaçao (Netherlands)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'country_name' => 'Cyprus',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'country_name' => 'Czech Republic',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'country_name' => 'Denmark',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'country_name' => 'Djibouti',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'country_name' => 'Dominica',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'country_name' => 'Dominican Republic',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'country_name' => 'DR Congo',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'country_name' => 'East Timor',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'country_name' => 'Ecuador',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'country_name' => 'Egypt',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'country_name' => 'El Salvador',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'country_name' => 'Equatorial Guinea',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'country_name' => 'Eritrea',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'country_name' => 'Estonia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'country_name' => 'Eswatini',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'country_name' => 'Ethiopia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
            'country_name' => 'Falkland Islands (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
            'country_name' => 'Faroe Islands (Denmark)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'country_name' => 'Fiji',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'country_name' => 'Finland',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'country_name' => 'France',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
            'country_name' => 'French Guiana (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
            'country_name' => 'French Polynesia (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'country_name' => 'Gabon',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'country_name' => 'Gambia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'country_name' => 'Georgia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'country_name' => 'Germany',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'country_name' => 'Ghana',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
            'country_name' => 'Gibraltar (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'country_name' => 'Greece',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
            'country_name' => 'Greenland (Denmark)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'country_name' => 'Grenada',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
            'country_name' => 'Guadeloupe (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
            'country_name' => 'Guam (US)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'country_name' => 'Guatemala',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
            'country_name' => 'Guernsey (Crown Dependency)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'country_name' => 'Guinea',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'country_name' => 'Guinea-Bissau',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'country_name' => 'Guyana',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'country_name' => 'Haiti',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'country_name' => 'Honduras',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'country_name' => 'Hong Kong',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'country_name' => 'Hungary',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'country_name' => 'Iceland',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'country_name' => 'India',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'country_name' => 'Indonesia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'country_name' => 'Iran',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'country_name' => 'Iraq',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'country_name' => 'Ireland',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
            'country_name' => 'Isle of Man (Crown Dependency)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'country_name' => 'Israel',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'country_name' => 'Italy',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'country_name' => 'Ivory Coast',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'country_name' => 'Jamaica',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'country_name' => 'Japan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
            'country_name' => 'Jersey (Crown Dependency)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'country_name' => 'Jordan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'country_name' => 'Kazakhstan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'country_name' => 'Kenya',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'country_name' => 'Kiribati',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'country_name' => 'Kosovo',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'country_name' => 'Kuwait',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'country_name' => 'Kyrgyzstan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'country_name' => 'Laos',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'country_name' => 'Latvia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'country_name' => 'Lebanon',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'country_name' => 'Lesotho',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'country_name' => 'Liberia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'country_name' => 'Libya',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'country_name' => 'Liechtenstein',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'country_name' => 'Lithuania',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'country_name' => 'Luxembourg',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'country_name' => 'Macau',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'country_name' => 'Madagascar',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'country_name' => 'Malawi',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'country_name' => 'Malaysia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'country_name' => 'Maldives',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'country_name' => 'Mali',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'country_name' => 'Malta',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'country_name' => 'Marshall Islands',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
            'country_name' => 'Martinique (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'country_name' => 'Mauritania',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'country_name' => 'Mauritius',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
            'country_name' => 'Mayotte (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'country_name' => 'Mexico',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'country_name' => 'Micronesia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'country_name' => 'Moldova',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'country_name' => 'Monaco',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'country_name' => 'Mongolia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'country_name' => 'Montenegro',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
            'country_name' => 'Montserrat (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'country_name' => 'Morocco',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'country_name' => 'Mozambique',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'country_name' => 'Myanmar',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'country_name' => 'Namibia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'country_name' => 'Nauru',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'country_name' => 'Nepal',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'country_name' => 'Netherlands',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
            'country_name' => 'New Caledonia (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'country_name' => 'New Zealand',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'country_name' => 'Nicaragua',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'country_name' => 'Niger',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'country_name' => 'Nigeria',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'country_name' => 'Niue',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
            'country_name' => 'Norfolk Island (Australia)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'country_name' => 'North Korea',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'country_name' => 'North Macedonia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'country_name' => 'Northern Cyprus',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
            'country_name' => 'Northern Mariana Islands (US)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'country_name' => 'Norway',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'country_name' => 'Oman',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'country_name' => 'Pakistan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'country_name' => 'Palau',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'country_name' => 'Palestine',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'country_name' => 'Panama',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'country_name' => 'Papua New Guinea',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'country_name' => 'Paraguay',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'country_name' => 'Peru',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'country_name' => 'Philippines',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
            'country_name' => 'Pitcairn Islands (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'country_name' => 'Poland',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'country_name' => 'Portugal',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
            'country_name' => 'Puerto Rico (US)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'country_name' => 'Qatar',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
            'country_name' => 'Réunion (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'country_name' => 'Romania',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'country_name' => 'Russia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'country_name' => 'Rwanda',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
            'country_name' => 'Saba (Netherlands)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
            'country_name' => 'Saint Barthélemy (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
            'country_name' => 'Saint Helena, Ascension and Tristan da Cunha (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'country_name' => 'Saint Kitts and Nevis',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'country_name' => 'Saint Lucia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
            'country_name' => 'Saint Martin (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
            'country_name' => 'Saint Pierre and Miquelon (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'country_name' => 'Saint Vincent and the Grenadines',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'country_name' => 'Samoa',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'country_name' => 'San Marino',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'country_name' => 'São Tomé and Príncipe',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'country_name' => 'Saudi Arabia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'country_name' => 'Senegal',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'country_name' => 'Serbia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'country_name' => 'Seychelles',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'country_name' => 'Sierra Leone',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'country_name' => 'Singapore',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
            'country_name' => 'Sint Eustatius (Netherlands)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
            'country_name' => 'Sint Maarten (Netherlands)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'country_name' => 'Slovakia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 => 
            array (
                'id' => 204,
                'country_name' => 'Slovenia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'country_name' => 'Solomon Islands',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'country_name' => 'Somalia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'country_name' => 'South Africa',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 208,
                'country_name' => 'South Korea',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 209,
                'country_name' => 'South Sudan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 210,
                'country_name' => 'Spain',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 211,
                'country_name' => 'Sri Lanka',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 212,
                'country_name' => 'Sudan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 213,
                'country_name' => 'Suriname',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 214,
            'country_name' => 'Svalbard and Jan Mayen (Norway)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 215,
                'country_name' => 'Sweden',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 216,
                'country_name' => 'Switzerland',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 217,
                'country_name' => 'Syria',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 218,
                'country_name' => 'Taiwan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 219,
                'country_name' => 'Tajikistan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 220,
                'country_name' => 'Tanzania',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 221,
                'country_name' => 'Thailand',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 222,
                'country_name' => 'Togo',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 223,
            'country_name' => 'Tokelau (NZ)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 224,
                'country_name' => 'Tonga',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 225,
                'country_name' => 'Transnistria',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 226,
                'country_name' => 'Trinidad and Tobago',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 227,
                'country_name' => 'Tunisia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 228,
                'country_name' => 'Turkey',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 229,
                'country_name' => 'Turkmenistan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 230,
            'country_name' => 'Turks and Caicos Islands (BOT)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 231,
                'country_name' => 'Tuvalu',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 232,
            'country_name' => 'U.S. Virgin Islands (US)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 233,
                'country_name' => 'Uganda',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 234,
                'country_name' => 'Ukraine',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 235,
                'country_name' => 'United Arab Emirates',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 236,
                'country_name' => 'United Kingdom',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 237,
                'country_name' => 'United States',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 => 
            array (
                'id' => 238,
                'country_name' => 'Uruguay',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 => 
            array (
                'id' => 239,
                'country_name' => 'Uzbekistan',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 => 
            array (
                'id' => 240,
                'country_name' => 'Vanuatu',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 => 
            array (
                'id' => 241,
                'country_name' => 'Vatican City',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 => 
            array (
                'id' => 242,
                'country_name' => 'Venezuela',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 => 
            array (
                'id' => 243,
                'country_name' => 'Vietnam',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 => 
            array (
                'id' => 244,
            'country_name' => 'Wallis and Futuna (France)',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 => 
            array (
                'id' => 245,
                'country_name' => 'Western Sahara',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 => 
            array (
                'id' => 246,
                'country_name' => 'Yemen',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 => 
            array (
                'id' => 247,
                'country_name' => 'Zambia',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 => 
            array (
                'id' => 248,
                'country_name' => 'Zimbabwe',
                'status' => 1,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}