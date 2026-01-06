<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReturnRefundPoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('return_refund_policies')->delete();
        
        \DB::table('return_refund_policies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => '<p><strong>Return &amp; Refund Policy</strong><br>
<strong>Effective Date:</strong> [Insert Date]</p><p>At <strong>Dubai Pure Clean</strong>, we strive to provide high-quality cleaning services and ensure customer satisfaction. If you are not satisfied with our services, we have a structured refund policy in place. Please review the following terms:</p><h3>1. <strong>Service Satisfaction Guarantee</strong></h3><ul>
<li>If you are dissatisfied with our service, please notify us within <strong>24 hours</strong> of the cleaning.</li>
<li>We will arrange for a <strong>free re-cleaning</strong> to address any issues.</li>
<li>If the issue persists after re-cleaning, a refund may be considered at our discretion.</li>
</ul><h3>2. <strong>Refund Eligibility</strong></h3><p>Refunds will only be considered under the following conditions:</p><ul>
<li>The service was not delivered as promised.</li>
<li>A valid complaint is raised within <strong>24 hours</strong> of service completion.</li>
<li>Re-cleaning has been declined or did not resolve the issue.</li>
<li>Payment was processed incorrectly (e.g., duplicate charges).</li>
</ul><h3>3. <strong>Non-Refundable Situations</strong></h3><p>Refunds will not be provided in the following cases:</p><ul>
<li>Complaints raised after <strong>24 hours</strong> of service completion.</li>
<li>The client refuses re-cleaning before requesting a refund.</li>
<li>Issues caused by pre-existing conditions of the property or items.</li>
<li>The service was completed as per the agreed-upon scope.</li>
</ul><h3>4. <strong>Refund Process</strong></h3><ul>
<li>To request a refund, contact us at [Insert Contact Email] with details of your complaint and proof of service.</li>
<li>Refund requests will be reviewed within <strong>7 business days</strong>.</li>
<li>Approved refunds will be processed within <strong>10-14 business days</strong> to the original payment method.</li>
</ul><h3>5. <strong>Cancellation &amp; Refund</strong></h3><ul>
<li>Cancellations made <strong>at least 24 hours before</strong> the scheduled service will be eligible for a full refund.</li>
<li>Cancellations made <strong>less than 24 hours before</strong> the scheduled service may incur a cancellation fee.</li>
<li>If the company cancels the service due to unforeseen circumstances, a full refund will be issued.</li>
</ul><h3>6. <strong>Modifications to the Policy</strong></h3><p>Dubai Pure Clean reserves the right to update this <strong>Return &amp; Refund Policy</strong> at any time. Any changes will be posted on our website with an updated effective date.</p><h3>7. <strong>Contact Us</strong></h3><p>For any refund-related inquiries, please contact us:</p><p>

















</p><p><strong>Dubai Pure Clean</strong><br>
[Insert Business Address]<br>
[Insert Contact Email]<br>
[Insert Contact Phone Number]</p>',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-03-01 15:11:17',
            ),
        ));
        
        
    }
}