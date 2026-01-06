<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceGuaranteesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('service_guarantees')->delete();
        
        \DB::table('service_guarantees')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => '<h1 data-start="92" data-end="140"><strong data-start="94" data-end="138">Dubai Pure Clean – Our Service Guarantee</strong></h1>
<p data-start="142" data-end="409">At <strong data-start="145" data-end="165">Dubai Pure Clean</strong>, we are committed to delivering top-quality cleaning services with professionalism, efficiency, and attention to detail. Our customers are at the heart of everything we do, and we stand behind our work with a <strong data-start="375" data-end="406">100% Satisfaction Guarantee</strong>.</p>
<h3 data-start="411" data-end="439"><strong data-start="415" data-end="437">Our Promise to You</strong></h3>
<p data-start="441" data-end="581">✅ <strong data-start="443" data-end="466">Exceptional Quality</strong><br data-start="466" data-end="469">
We use high-grade cleaning products and industry-best practices to ensure a spotless and hygienic environment.</p>
<p data-start="583" data-end="750">✅ <strong data-start="585" data-end="617">Trained &amp; Professional Staff</strong><br data-start="617" data-end="620">
Our team consists of experienced, well-trained, and background-checked professionals dedicated to providing outstanding service.</p>
<p data-start="752" data-end="892">✅ <strong data-start="754" data-end="784">On-Time &amp; Reliable Service</strong><br data-start="784" data-end="787">
We respect your time and schedule, ensuring our team arrives on time and completes the job efficiently.</p>
<p data-start="894" data-end="1035">✅ <strong data-start="896" data-end="928">Eco-Friendly &amp; Safe Products</strong><br data-start="928" data-end="931">
We use environmentally friendly and non-toxic cleaning solutions to keep your home and workspace safe.</p>
<p data-start="1037" data-end="1214">✅ <strong data-start="1039" data-end="1075">Customer Satisfaction Guaranteed</strong><br data-start="1075" data-end="1078">
If you are not completely satisfied with our service, we will re-clean the area at no additional cost. Your happiness is our priority!</p>
<h3 data-start="1216" data-end="1240"><strong data-start="1220" data-end="1238">Our Commitment</strong></h3>
<p data-start="1241" data-end="1431">At <strong data-start="1244" data-end="1264">Dubai Pure Clean</strong>, we believe in honesty, transparency, and excellence. Whether it’s a one-time deep clean or regular maintenance, we guarantee a seamless and stress-free experience.</p>
<p data-start="1433" data-end="1510"><strong data-start="1433" data-end="1508">Experience the Dubai Pure Clean difference – where quality meets trust!</strong></p>
<p data-start="1512" data-end="1563">📞 <strong data-start="1515" data-end="1535">Contact us today</strong> to schedule your service!</p>',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-03-11 02:11:53',
            ),
        ));
        
        
    }
}