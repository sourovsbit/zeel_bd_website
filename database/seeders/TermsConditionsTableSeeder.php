<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TermsConditionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('terms_conditions')->delete();
        
        \DB::table('terms_conditions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => '<p><strong>Terms &amp; Conditions</strong><br>
<strong>Effective Date:</strong> [Insert Date]</p><p>Welcome to <strong>Dubai Pure Clean</strong>. By using our services, you agree to comply with the following Terms &amp; Conditions. Please read them carefully before booking or using our services.</p><h3>1. <strong>Definitions</strong></h3><ul>
<li><strong>Company:</strong> Dubai Pure Clean, referred to as "we," "our," or "us."</li>
<li><strong>Client:</strong> The individual or entity using our services.</li>
<li><strong>Services:</strong> Cleaning services provided by Dubai Pure Clean.</li>
</ul><h3>2. <strong>Service Booking &amp; Confirmation</strong></h3><ul>
<li>Clients must provide accurate information when booking a service.</li>
<li>Bookings are subject to availability and confirmation by our team.</li>
<li>A booking is only confirmed once the client receives a confirmation message via email, phone, or SMS.</li>
</ul><h3>3. <strong>Pricing &amp; Payment</strong></h3><ul>
<li>Service charges are determined based on the type and scope of cleaning required.</li>
<li>Payment must be made in full before or upon completion of services unless otherwise agreed.</li>
<li>We accept cash, credit/debit cards, and online transfers.</li>
<li>Any additional charges incurred due to extra services will be communicated before execution.</li>
</ul><h3>4. <strong>Cancellation &amp; Rescheduling</strong></h3><ul>
<li>Clients must notify us at least <strong>24 hours in advance</strong> for cancellations or rescheduling.</li>
<li>Cancellations made less than <strong>24 hours before the service</strong> may incur a cancellation fee.</li>
<li>The company reserves the right to reschedule services in case of unforeseen circumstances (e.g., staff unavailability, emergencies).</li>
</ul><h3>5. <strong>Customer Responsibilities</strong></h3><ul>
<li>Clients must provide safe access to the premises and ensure all valuables are secured.</li>
<li>Any special cleaning requests should be communicated before service commencement.</li>
<li>The company is not liable for damage caused by pre-existing conditions of the property or items.</li>
</ul><h3>6. <strong>Liability &amp; Damage</strong></h3><ul>
<li>We take utmost care during cleaning but are not liable for minor accidental damages.</li>
<li>Any claims for damages must be reported within <strong>24 hours</strong> of service completion.</li>
<li>Dubai Pure Clean will assess claims and determine appropriate resolutions at its discretion.</li>
</ul><h3>7. <strong>Health &amp; Safety</strong></h3><ul>
<li>Our staff follows strict health and safety protocols.</li>
<li>Clients must notify us of any hazardous conditions or potential risks at the premises.</li>
<li>We reserve the right to refuse service if the work environment is unsafe.</li>
</ul><h3>8. <strong>Termination of Services</strong></h3><ul>
<li>We reserve the right to refuse or terminate services if a client engages in abusive or inappropriate behavior toward staff.</li>
<li>Breach of these Terms &amp; Conditions may result in service termination without refund.</li>
</ul><h3>9. <strong>Privacy Policy</strong></h3><ul>
<li>Client data is collected and processed per our [Privacy Policy].</li>
<li>We do not share personal information with third parties without consent.</li>
</ul><h3>10. <strong>Amendments</strong></h3><ul>
<li>Dubai Pure Clean may update these Terms &amp; Conditions at any time.</li>
<li>Continued use of our services after amendments implies acceptance of the new terms.</li>
</ul><h3>11. <strong>Contact Information</strong></h3><p>For any inquiries regarding these Terms &amp; Conditions, please contact us:</p><p>























</p><p><strong>Dubai Pure Clean</strong><br>
[Insert Business Address]<br>
[Insert Contact Email]<br>
[Insert Contact Phone Number]</p>',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-03-01 13:24:03',
            ),
        ));
        
        
    }
}