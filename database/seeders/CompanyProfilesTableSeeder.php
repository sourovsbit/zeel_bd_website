<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanyProfilesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('company_profiles')->delete();

        \DB::table('company_profiles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'company_name' => 'Dubai Pure Clean',
                'email' => 'dubaipureclean@gmail.com',
                'phone' => '01000000000',
                'sales_phone' => '01000000000',
                'facebook' => 'https://www.facebook.com/',
                'instagram' => 'https://www.instagram.com/',
                'youtube' => 'https://www.youtube.com/',
                'twiter' => 'https://x.com/',
                'pinterest' => 'https://www.pinterest.com/',
                'linkedin' => 'https://linkedin.com/',
                'tikTok' => 'https://www.tiktok.com/',
                'meta_description' => 'We are pround to be approved by Dubai Municipality, demonstrationg our commitment to meeting the highest standards of quality and safety',
                'address' => 'Alquoz 3, Dubai, UAE',
                'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d419.5860546033274!2d91.39917044858433!3d23.01371253249717!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37536836ba04d9a9%3A0x1dca645bab087e81!2sSkill%20Based%20IT-%20SBIT!5e1!3m2!1sen!2sbd!4v1741064991499!5m2!1sen!2sbd',
                'icon' => '0',
                'logo' => '167820768.png',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-03-04 11:13:04',
            ),
        ));


    }
}
