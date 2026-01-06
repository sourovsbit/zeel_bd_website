<style>
    /* Floating Action Buttons - Redesigned */
    .floating-buttons {
        position: fixed;
        z-index: 9998;
        right: 30px;
        bottom: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: flex-end;
    }

    .whatsapp-btn {
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
        width: 56px;
        height: 56px;
        border-radius: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.25);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        border: none;
        cursor: pointer;
        text-decoration: none;
    }

    .whatsapp-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(37, 211, 102, 0.35);
    }

    .whatsapp-btn:active {
        transform: translateY(-1px);
    }

    /* Enhanced Phone Button - Best Design */
    .phone-float-btn {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        width: auto;
        height: 56px;
        border-radius: 28px;
        display: flex;
        align-items: center;
        padding: 0 20px;
        color: white;
        text-decoration: none;
        box-shadow: 0 4px 20px rgba(79, 70, 229, 0.25);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        gap: 12px;
        position: relative;
        overflow: hidden;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .phone-float-btn:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.7s ease;
    }

    .phone-float-btn:hover:before {
        left: 100%;
    }

    .phone-float-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.35);
        gap: 15px;
    }

    .phone-float-btn:active {
        transform: translateY(-1px);
    }

    .phone-icon {
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .phone-text {
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 0.3px;
        white-space: nowrap;
        transition: all 0.3s ease;
    }

    .phone-float-btn:hover .phone-icon {
        transform: rotate(15deg);
    }

    /* Phone Animation */
    @keyframes phoneRing {
        0%, 100% { transform: rotate(0); }
        10%, 30%, 50%, 70%, 90% { transform: rotate(-10deg); }
        20%, 40%, 60%, 80% { transform: rotate(10deg); }
    }

    .phone-float-btn:hover .phone-icon {
        animation: phoneRing 0.8s ease;
    }

    /* Button Pulse Effect */
    .phone-pulse {
        position: absolute;
        width: 100%;
        height: 100%;
        background: inherit;
        border-radius: inherit;
        opacity: 0;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            opacity: 0.5;
        }
        100% {
            transform: scale(1.2);
            opacity: 0;
        }
    }

    /* Footer Section - Premium Design */
    .footer-section {
        background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%);
        color: #E2E8F0;
        padding: 80px 0 0;
        position: relative;
        overflow: hidden;
    }

    .footer-section:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4F46E5 0%, #7C3AED 100%);
    }

    .footer-logo {
        margin-bottom: 25px;
    }

    .footer-logo img {
        height: 45px;
        width: auto;
        filter: brightness(0) invert(1);
        transition: all 0.3s ease;
    }

    .footer-logo img:hover {
        transform: translateY(-2px);
    }

    .company-info {
        margin-bottom: 30px;
    }

    .company-info h4 {
        color: white;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .info-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .info-list li {
        margin-bottom: 12px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14px;
        line-height: 1.5;
        color: #CBD5E1;
    }

    .info-list li i {
        color: #4F46E5;
        font-size: 16px;
        min-width: 20px;
        margin-top: 2px;
    }

    .social-links {
        display: flex;
        gap: 12px;
        margin-top: 30px;
    }

    .social-link {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.08);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #CBD5E1;
        font-size: 16px;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-link:hover {
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
    }

    /* Footer Widgets */
    .footer-widget {
        margin-bottom: 40px;
    }

    .widget-title {
        color: white;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding-bottom: 12px;
    }

    .widget-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 40px;
        height: 2px;
        background: linear-gradient(90deg, #4F46E5 0%, #7C3AED 100%);
    }

    .widget-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .widget-links li {
        margin-bottom: 12px;
    }

    .widget-links a {
        color: #94A3B8;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .widget-links a i {
        font-size: 12px;
        opacity: 0;
        transition: all 0.3s ease;
        color: #4F46E5;
    }

    .widget-links a:hover {
        color: white;
        padding-left: 5px;
    }

    .widget-links a:hover i {
        opacity: 1;
    }

    /* Newsletter Section */
    .newsletter-card {
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%);
        padding: 30px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
    }

    .newsletter-card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, #4F46E5 0%, #7C3AED 100%);
    }

    .newsletter-title {
        color: white;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .newsletter-desc {
        color: #CBD5E1;
        font-size: 14px;
        line-height: 1.6;
        margin-bottom: 25px;
    }

    .newsletter-form {
        display: flex;
        gap: 10px;
    }

    .form-input {
        flex: 1;
        padding: 12px 18px;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 8px;
        color: white;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: #4F46E5;
        background: rgba(255, 255, 255, 0.08);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }

    .form-input::placeholder {
        color: #94A3B8;
    }

    .form-button {
        padding: 12px 28px;
        background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        color: white;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .form-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.3);
    }

    /* Copyright Section */
    .copyright-section {
        margin-top: 80px;
        padding: 25px 0;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        background: rgba(0, 0, 0, 0.2);
    }

    .copyright-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .copyright-text {
        color: #94A3B8;
        font-size: 14px;
    }

    .copyright-text a {
        color: #4F46E5;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .copyright-text a:hover {
        color: #7C3AED;
        text-decoration: underline;
    }

    .payment-methods {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .payment-text {
        color: #94A3B8;
        font-size: 14px;
        margin-right: 10px;
    }

    .payment-icons {
        display: flex;
        gap: 15px;
    }

    .payment-icons img {
        height: 24px;
        filter: grayscale(100%) brightness(2);
        opacity: 0.7;
        transition: all 0.3s ease;
    }

    .payment-icons img:hover {
        filter: grayscale(0) brightness(1);
        opacity: 1;
    }

    /* Responsive Design */
    @media (max-width: 991px) {
        .floating-buttons {
            right: 20px;
            bottom: 20px;
        }

        .whatsapp-btn,
        .phone-float-btn {
            width: 50px;
            height: 50px;
            font-size: 22px;
        }

        .phone-text {
            display: none;
        }

        .phone-float-btn {
            width: 50px;
            padding: 0;
            justify-content: center;
        }

        .footer-section {
            padding: 60px 0 0;
        }

        .footer-widget {
            margin-bottom: 40px;
        }

        .newsletter-form {
            flex-direction: column;
        }

        .form-button {
            width: 100%;
        }

        .copyright-content {
            flex-direction: column;
            text-align: center;
        }

        .payment-methods {
            justify-content: center;
        }
    }

    @media (max-width: 767px) {
        .footer-widget {
            margin-bottom: 30px;
        }

        .newsletter-card {
            padding: 25px;
        }

        .copyright-section {
            margin-top: 60px;
        }
    }

    /* Animation for buttons on load */
    @keyframes floatIn {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.9);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    .floating-buttons {
        animation: floatIn 0.5s ease-out 0.5s both;
    }
</style>

<!-- Floating Action Buttons -->
<div class="floating-buttons">
    @if($company->sales_phone)
    <a href="https://wa.me/{{$company->sales_phone}}" target="_blank" class="whatsapp-btn"
       aria-label="Chat with us on WhatsApp" title="Chat on WhatsApp">
        <i class="fa fa-whatsapp"></i>
    </a>
    @endif

    @if($company->phone)
    <a href="tel:+{{$company->phone}}" class="phone-float-btn"
       aria-label="Call us now" title="Call Now">
        <span class="phone-pulse"></span>
        <i class="fa fa-phone phone-icon"></i>
        <span class="phone-text">Call Now</span>
    </a>
    @endif
</div>

<!-- Footer Section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
            <!-- Company Information -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-logo">
                    @php
                        $pathlogo = public_path().'/backend/CompanyProfile/CompanyProfileLogo/'.$company->logo;
                    @endphp
                    @if(file_exists($pathlogo))
                        <a href="{{url('/')}}">
                            <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo') }}/{{ $company->logo }}"
                                 alt="{{ $company->name ?? 'Company Logo' }}">
                        </a>
                    @endif
                </div>

                <div class="company-info">
                    <h4>Contact Information</h4>
                    <ul class="info-list">
                        @if($company->address)
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <span>{{ $company->address }}</span>
                        </li>
                        @endif
                        @if($company->phone)
                        <li>
                            <i class="fa fa-phone"></i>
                            <span>{{ $company->phone }}</span>
                        </li>
                        @endif
                        @if($company->email)
                        <li>
                            <i class="fa fa-envelope"></i>
                            <span>{{ $company->email }}</span>
                        </li>
                        @endif
                    </ul>
                </div>

                @if($company->facebook || $company->instagram || $company->twitter || $company->youtube)
                <div class="social-links">
                    @if($company->facebook)
                    <a href="{{ $company->facebook }}" target="_blank" class="social-link" aria-label="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    @endif
                    @if($company->instagram)
                    <a href="{{ $company->instagram }}" target="_blank" class="social-link" aria-label="Instagram">
                        <i class="fa fa-instagram"></i>
                    </a>
                    @endif
                    @if($company->twitter)
                    <a href="{{ $company->twitter }}" target="_blank" class="social-link" aria-label="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    @endif
                    @if($company->youtube)
                    <a href="{{ $company->youtube }}" target="_blank" class="social-link" aria-label="YouTube">
                        <i class="fa fa-youtube"></i>
                    </a>
                    @endif
                </div>
                @endif
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget">
                    <h4 class="widget-title">Quick Links</h4>
                    <ul class="widget-links">
                        <li><a href="{{ url('/') }}"><i class="fa fa-chevron-right"></i> Home</a></li>
                        <li><a href="{{ url('about') }}"><i class="fa fa-chevron-right"></i> About Us</a></li>
                        <li><a href="{{ url('missionvision') }}"><i class="fa fa-chevron-right"></i> Mission & Vision</a></li>
                        <li><a href="{{ url('careers') }}"><i class="fa fa-chevron-right"></i> Careers</a></li>
                        <li><a href="{{ url('contact') }}"><i class="fa fa-chevron-right"></i> Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Legal Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget">
                    <h4 class="widget-title">Legal</h4>
                    <ul class="widget-links">
                        <li><a href="{{url('privacypolicy')}}"><i class="fa fa-chevron-right"></i> Privacy Policy</a></li>
                        <li><a href="{{url('termsconditions')}}"><i class="fa fa-chevron-right"></i> Terms & Conditions</a></li>
                        <li><a href="{{url('returnrefund')}}"><i class="fa fa-chevron-right"></i> Return & Refund</a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-4 col-md-6">
                <div class="newsletter-card">
                    <h4 class="newsletter-title">Stay Updated</h4>
                    <p class="newsletter-desc">
                        Subscribe to our newsletter and be the first to know about new products, special offers, and company news.
                    </p>
                    <form class="newsletter-form" id="newsletterForm">
                        <input type="email" class="form-input" placeholder="Your email address" required>
                        <button type="submit" class="form-button">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="copyright-section">
        <div class="container">
            <div class="copyright-content">
                <div class="copyright-text">
                    &copy; <span id="currentYear"></span> {{ $company->name ?? 'Company Name' }}. All rights reserved.
                    <span style="margin: 0 10px">|</span>
                    Developed by <a href="https://sbit.com.bd/" target="_blank">Skill Based IT</a>
                </div>
                <div class="payment-methods">
                    <span class="payment-text">Secure Payments:</span>
                    <div class="payment-icons">
                        <img src="{{ asset('frontend/img/payment-method.png') }}" alt="Payment Methods">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    // Newsletter Form
    document.getElementById('newsletterForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('input[type="email"]').value;

        // Show success message
        const button = this.querySelector('.form-button');
        const originalText = button.textContent;

        button.textContent = 'Subscribing...';
        button.disabled = true;

        setTimeout(() => {
            button.textContent = 'Subscribed!';
            button.style.background = 'linear-gradient(135deg, #10B981 0%, #059669 100%)';
            this.reset();

            setTimeout(() => {
                button.textContent = originalText;
                button.disabled = false;
                button.style.background = 'linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%)';
            }, 2000);
        }, 1000);
    });

    // Set current year in copyright
    document.getElementById('currentYear').textContent = new Date().getFullYear();

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Phone button hover effect
    const phoneBtn = document.querySelector('.phone-float-btn');
    if (phoneBtn) {
        phoneBtn.addEventListener('mouseenter', () => {
            phoneBtn.style.transform = 'translateY(-3px)';
        });

        phoneBtn.addEventListener('mouseleave', () => {
            phoneBtn.style.transform = 'translateY(0)';
        });
    }
</script>

<!-- Essential JavaScript Files -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/js/main.js') }}"></script>

</body>
</html>
