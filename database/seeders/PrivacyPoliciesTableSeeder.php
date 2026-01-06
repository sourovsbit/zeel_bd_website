<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrivacyPoliciesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('privacy_policies')->delete();
        
        \DB::table('privacy_policies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'description' => '<p><strong>Privacy Policy</strong><br>
<strong>Effective Date:</strong> [Insert Date]</p>
<p><strong>Dubai Pure Clean</strong> ("we," "our," "us") values your privacy and is committed to protecting your personal data. This Privacy Policy outlines how we collect, use, and safeguard your information when you visit our website, use our services, or interact with us.</p>
<h3>1. Information We Collect</h3>
<p>We may collect the following types of personal information:</p>
<ul>
<li>Name, email address, phone number, and address.</li>
<li>Payment details when processing transactions.</li>
<li>Information provided through inquiries or customer support.</li>
<li>Technical data, such as IP addresses, browser type, and usage data through cookies and analytics tools.</li>
</ul>
<h3>2. How We Use Your Information</h3>
<p>We use your personal information for the following purposes:</p>
<ul>
<li>To provide and maintain our cleaning services.</li>
<li>To process transactions and payments.</li>
<li>To communicate with you regarding inquiries, service updates, and promotions.</li>
<li>To improve our website, services, and customer experience.</li>
<li>To comply with legal obligations.</li>
</ul>
<h3>3. Sharing of Information</h3>
<p>We do not sell, trade, or rent your personal information. However, we may share your data with:</p>
<ul>
<li>Service providers assisting us in operations (e.g., payment processors, IT service providers).</li>
<li>Legal authorities when required by law.</li>
<li>Third parties in connection with business transfers or mergers.</li>
</ul>
<h3>4. Data Security</h3>
<p>We implement appropriate security measures to protect your personal information. However, no method of transmission over the internet is completely secure, and we cannot guarantee absolute security.</p>
<h3>5. Your Rights</h3>
<p>Depending on your location, you may have the right to:</p>
<ul>
<li>Access, correct, or delete your personal data.</li>
<li>Withdraw consent for data processing.</li>
<li>Object to certain data uses.</li>
<li>Request data portability.</li>
</ul>
<p>To exercise your rights, contact us at [Insert Contact Email].</p>
<h3>6. Cookies &amp; Tracking Technologies</h3>
<p>We use cookies and similar tracking technologies to enhance your browsing experience. You can manage cookie preferences through your browser settings.</p>
<h3>7. Third-Party Links</h3>
<p>Our website may contain links to third-party sites. We are not responsible for their privacy practices and encourage you to review their policies.</p>
<h3>8. Changes to This Policy</h3>
<p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.</p>
<h3>9. Contact Us</h3>
<p>If you have any questions about this Privacy Policy, please contact us at:</p>
<p><strong>Dubai Pure Clean</strong><br>
[Insert Business Address]<br>
[Insert Contact Email]<br>
[Insert Contact Phone Number]</p>',
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-03-01 13:14:24',
            ),
        ));
        
        
    }
}