<style>
    .custom-header {
        background: #ffffff;
        border-bottom: 1px solid #f0f0f0;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        padding: 20px 0;
    }

    .custom-header.shrink {
        padding: 12px 0;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.98);
    }

    .containers {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .logo {
        z-index: 1001;
    }

    .logo img {
        height: 55px;
        width: auto;
        transition: all 0.3s ease;
    }

    .shrink .logo img {
        height: 45px;
    }

    .custom-nav {
        display: flex;
        align-items: center;
    }

    .custom-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 32px;
    }

    .custom-menu li {
        position: relative;
    }

    .custom-menu > li > a {
        text-decoration: none;
        color: #2c3e50;
        font-weight: 600;
        font-size: 15px;
        letter-spacing: 0.3px;
        padding: 8px 0;
        position: relative;
        transition: all 0.3s ease;
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .custom-menu > li > a:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: width 0.3s ease;
    }

    .custom-menu > li > a:hover {
        color: #667eea;
    }

    .custom-menu > li > a:hover:after {
        width: 100%;
    }

    .custom-menu > li.active > a {
        color: #667eea;
    }

    .custom-menu > li.active > a:after {
        width: 100%;
    }

    /* Dropdown Styles */
    .submenu {
        position: absolute;
        top: 100%;
        left: 0;
        background: #ffffff;
        padding: 0;
        display: none;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        z-index: 999;
        min-width: 220px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        border: 1px solid #f5f5f5;
        margin-top: 10px;
    }

    .submenu:before {
        content: '';
        position: absolute;
        top: -6px;
        left: 20px;
        width: 12px;
        height: 12px;
        background: #ffffff;
        transform: rotate(45deg);
        border-top: 1px solid #f5f5f5;
        border-left: 1px solid #f5f5f5;
    }

    .submenu li {
        list-style: none;
        margin: 0;
        padding: 0;
        border-bottom: 1px solid #f8f9fa;
    }

    .submenu li:last-child {
        border-bottom: none;
    }

    .submenu li a {
        display: block;
        padding: 12px 20px;
        text-decoration: none;
        color: #4a5568;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .submenu li a:hover {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        color: #667eea;
        padding-left: 25px;
    }

    .custom-menu li:hover .submenu {
        display: block;
        opacity: 1;
        transform: translateY(0);
    }

    /* Mobile Toggle */
    .menu-toggle {
        display: none;
        cursor: pointer;
        width: 30px;
        height: 24px;
        position: relative;
        z-index: 1001;
    }

    .menu-toggle span {
        display: block;
        position: absolute;
        height: 3px;
        width: 100%;
        background: #2c3e50;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    .menu-toggle span:nth-child(1) { top: 0; }
    .menu-toggle span:nth-child(2) { top: 10px; }
    .menu-toggle span:nth-child(3) { top: 20px; }

    .menu-toggle.active span:nth-child(1) {
        transform: rotate(45deg);
        top: 10px;
    }

    .menu-toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .menu-toggle.active span:nth-child(3) {
        transform: rotate(-45deg);
        top: 10px;
    }

    /* Mobile Styles */
    @media(max-width: 991px) {
        .custom-menu {
            position: fixed;
            top: 0;
            left: -100%;
            width: 280px;
            height: 100vh;
            background: #ffffff;
            flex-direction: column;
            padding: 80px 30px 30px;
            gap: 0;
            transition: all 0.4s ease;
            box-shadow: 10px 0 30px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .custom-menu.active {
            left: 0;
        }

        .custom-menu li {
            width: 100%;
            border-bottom: 1px solid #f0f0f0;
        }

        .custom-menu > li > a {
            padding: 15px 0;
            display: block;
            width: 100%;
            font-size: 16px;
        }

        .submenu {
            position: static;
            display: none;
            opacity: 1;
            transform: none;
            box-shadow: none;
            background: #f8f9fa;
            border-radius: 0;
            padding: 0;
            margin: 0;
            min-width: auto;
            border: none;
            margin-top: 0;
        }

        .submenu:before {
            display: none;
        }

        .submenu li a {
            padding: 12px 15px 12px 30px;
            font-size: 14px;
        }

        .custom-menu li.active .submenu {
            display: block;
        }

        .menu-toggle {
            display: block;
        }

        .custom-header.shrink {
            padding: 15px 0;
        }

        .logo img {
            height: 45px;
        }
    }

    /* Content Spacer */
    .content-spacer {
        padding-top: 100px;
    }

    .shrink ~ .content-spacer {
        padding-top: 85px;
    }

    /* Social Icons */
    .social-icons {
        display: flex;
        gap: 15px;
        margin-left: 30px;
    }

    .social-icons a {
        color: #64748b;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .social-icons a:hover {
        color: #667eea;
        transform: translateY(-2px);
    }

    @media(max-width: 991px) {
        .social-icons {
            display: none;
        }
    }

    /* Navbar Search */
    .navbar-search-wrap {
        display: flex;
        align-items: center;
        margin-left: 20px;
        position: relative;
    }

    .navbar-search-box {
        width: 280px;
        background: #fff;
        border-radius: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        border-color: #667eea;
        border: 1.5px solid #667eea;
    }

    .navbar-search-box form {
        display: flex;
        align-items: center;
        padding: 0 14px;
        height: 40px;
    }

    .navbar-search-box input[type="text"] {
        border: none;
        outline: none;
        font-size: 14px;
        color: #2c3e50;
        background: transparent;
        width: 100%;
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .navbar-search-box input[type="text"]::placeholder {
        color: #94a3b8;
    }

    .navbar-search-box button[type="submit"] {
        background: none;
        border: none;
        cursor: pointer;
        color: #667eea;
        font-size: 15px;
        padding: 0 0 0 8px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
    }

    @media(max-width: 991px) {
        .navbar-search-wrap {
            margin-left: 10px;
        }
        .navbar-search-box {
            width: 200px;
        }
    }

    @media(max-width: 480px) {
        .navbar-search-box {
            width: 160px;
        }
    }

    /* Suggestion Dropdown */
    .navbar-suggest-list {
        position: absolute;
        top: calc(100% + 8px);
        right: 0;
        width: 320px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.13);
        border: 1px solid #e2e8f0;
        list-style: none;
        margin: 0;
        padding: 6px 0;
        z-index: 9999;
        max-height: 380px;
        overflow-y: auto;
        display: none;
    }

    .navbar-suggest-list.show {
        display: block;
    }

    .navbar-suggest-list li a {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 9px 14px;
        text-decoration: none;
        color: #2c3e50;
        font-size: 13.5px;
        font-family: 'Segoe UI', -apple-system, BlinkMacSystemFont, sans-serif;
        transition: background 0.18s ease;
    }

    .navbar-suggest-list li a:hover {
        background: #f1f5f9;
        color: #667eea;
    }

    .navbar-suggest-list li a img {
        width: 38px;
        height: 38px;
        object-fit: cover;
        border-radius: 6px;
        flex-shrink: 0;
        background: #f8f9fa;
    }

    .navbar-suggest-list li a .suggest-img-placeholder {
        width: 38px;
        height: 38px;
        border-radius: 6px;
        background: #e9ecef;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #adb5bd;
        font-size: 16px;
    }

    .navbar-suggest-list .suggest-name {
        flex: 1;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .navbar-suggest-list .suggest-more {
        padding: 8px 14px;
        text-align: center;
        font-size: 12.5px;
    }

    .navbar-suggest-list .suggest-more a {
        color: #667eea;
        font-weight: 600;
        text-decoration: none;
    }

    .navbar-suggest-list .suggest-more a:hover {
        text-decoration: underline;
    }

    .navbar-suggest-list .suggest-loading,
    .navbar-suggest-list .suggest-empty {
        padding: 14px;
        text-align: center;
        color: #94a3b8;
        font-size: 13px;
    }

    @media(max-width: 991px) {
        .navbar-suggest-list {
            width: 260px;
        }
    }

    @media(max-width: 480px) {
        .navbar-suggest-list {
            width: 220px;
        }
    }
</style>

<header class="custom-header">
    <div class="containers">
        <!-- Logo -->
        <div class="logo">
            @php
                $pathlogo = public_path().'/backend/CompanyProfile/CompanyProfileLogo/'.$company->logo;
            @endphp
            @if(file_exists($pathlogo))
                <a href="{{ url('/') }}">
                    <img src="{{ asset('backend/CompanyProfile/CompanyProfileLogo') }}/{{ $company->logo }}" alt="{{ $company->name ?? 'Company Logo' }}">
                </a>
            @endif
        </div>

        <!-- Main Navigation -->
        <nav class="custom-nav">
            <ul class="custom-menu">
                <li class="{{ request()->is('/') ? 'active' : '' }}">
                    <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="{{ request()->is('about*') || request()->is('missionvision*') || request()->is('administrative_message*') || request()->is('team*') ? 'active' : '' }}">
                    <a href="#">About Us</a>
                    <ul class="submenu">
                        <li><a href="{{ url('about') }}">About Company</a></li>
                        <li><a href="{{ url('missionvision') }}">Mission & Vision</a></li>
                        <li><a href="{{ url('certificates') }}">Certificates</a></li>
                        @if($adminmessage)
                            @foreach($adminmessage as $a)
                                <li><a href="{{url('administrative_message')}}/{{$a->id}}">{{$a->title}} Message</a></li>
                            @endforeach
                        @endif
                        <li><a href="{{ url('team') }}">Our Team</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('shop*') ? 'active' : '' }}">
                    <a href="{{ url('shop') }}">Products</a>
                </li>
                {{-- <li class="{{ request()->is('careers*') ? 'active' : '' }}">
                    <a href="{{ url('careers') }}">Careers</a>
                </li> --}}
                <li class="{{ request()->is('newsevent*') || request()->is('gallery*') || request()->is('videoalbum*') ? 'active' : '' }}">
                    <a href="#">Media</a>
                    <ul class="submenu">
                        <li><a href="{{ url('newsevent') }}">News & Events</a></li>
                        <li><a href="{{ url('gallery') }}">Photo Gallery</a></li>
                        {{-- <li><a href="{{ url('videoalbum') }}">Video Gallery</a></li> --}}
                    </ul>
                </li>
                <li class="{{ request()->is('contact*') ? 'active' : '' }}">
                    <a href="{{ url('contact') }}">Contact</a>
                </li>
            </ul>

            <!-- Social Icons -->
            {{-- <div class="social-icons">
                @if($company->facebook)
                    <a href="{{ $company->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a>
                @endif
                @if($company->instagram)
                    <a href="{{ $company->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a>
                @endif
                @if($company->twitter)
                    <a href="{{ $company->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                @endif
                @if($company->youtube)
                    <a href="{{ $company->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a>
                @endif
            </div> --}}

            <!-- Navbar Product Search -->
            <div class="navbar-search-wrap" id="navbarSearchWrap">
                <div class="navbar-search-box" id="navbarSearchBox">
                    <form action="{{ url('shop') }}" method="GET" id="navbarSearchForm">
                        <input type="text" name="search" id="navbarSearchInput"
                            placeholder="Search products..."
                            value="{{ request()->is('shop*') ? request('search') : '' }}"
                            autocomplete="off">
                        <button type="submit" aria-label="Search">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <!-- Suggestion Dropdown -->
                <ul class="navbar-suggest-list" id="navbarSuggestList"></ul>
            </div>
        </nav>

        <!-- Mobile Menu Toggle -->
        <div class="menu-toggle" onclick="toggleMobileMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>

<script>
    // Header scroll effect
    window.addEventListener('scroll', function () {
        const header = document.querySelector('.custom-header');
        if (window.scrollY > 50) {
            header.classList.add('shrink');
        } else {
            header.classList.remove('shrink');
        }
    });

    // Mobile menu toggle
    function toggleMobileMenu() {
        const menu = document.querySelector('.custom-menu');
        const toggle = document.querySelector('.menu-toggle');
        menu.classList.toggle('active');
        toggle.classList.toggle('active');

        // Toggle body scroll
        document.body.style.overflow = menu.classList.contains('active') ? 'hidden' : '';
    }

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.custom-menu a').forEach(link => {
        link.addEventListener('click', () => {
            const menu = document.querySelector('.custom-menu');
            const toggle = document.querySelector('.menu-toggle');
            if (menu.classList.contains('active')) {
                menu.classList.remove('active');
                toggle.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    // Close menu when clicking outside on mobile
    document.addEventListener('click', (e) => {
        const menu = document.querySelector('.custom-menu');
        const toggle = document.querySelector('.menu-toggle');
        if (window.innerWidth <= 991 &&
            menu.classList.contains('active') &&
            !menu.contains(e.target) &&
            !toggle.contains(e.target)) {
            menu.classList.remove('active');
            toggle.classList.remove('active');
            document.body.style.overflow = '';
        }
    });

    // Highlight current page
    document.addEventListener('DOMContentLoaded', () => {
        const currentPath = window.location.pathname;
        const menuLinks = document.querySelectorAll('.custom-menu > li > a');

        menuLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.parentElement.classList.add('active');
            }
        });
    });

    // Navbar search toggle + suggestions
    (function () {
        const box         = document.getElementById('navbarSearchBox');
        const input       = document.getElementById('navbarSearchInput');
        const suggestList = document.getElementById('navbarSuggestList');
        const suggestUrl  = '{{ url("product-search-suggest") }}';
        const shopUrl     = '{{ url("shop") }}';

        if (!box || !input || !suggestList) return;

        let debounceTimer = null;
        let activeIndex   = -1;
        let currentXhr    = null;
        const suggestionCache = new Map();

        // Fetch suggestions as user types
        input.addEventListener('input', function () {
            const q = input.value.trim();
            clearTimeout(debounceTimer);
            activeIndex = -1;

            if (q.length < 3) {
                hideSuggestions();
                return;
            }

            debounceTimer = setTimeout(function () {
                fetchSuggestions(q);
            }, 450);
        });

        // Keyboard navigation inside suggestion list
        input.addEventListener('keydown', function (e) {
            const items = suggestList.querySelectorAll('li.suggest-item a');
            if (!suggestList.classList.contains('show') || items.length === 0) return;

            if (e.key === 'ArrowDown') {
                e.preventDefault();
                activeIndex = Math.min(activeIndex + 1, items.length - 1);
                updateActive(items);
            } else if (e.key === 'ArrowUp') {
                e.preventDefault();
                activeIndex = Math.max(activeIndex - 1, -1);
                updateActive(items);
            } else if (e.key === 'Enter') {
                if (activeIndex >= 0 && items[activeIndex]) {
                    e.preventDefault();
                    window.location.href = items[activeIndex].href;
                }
                // else let the form submit naturally to shop
            } else if (e.key === 'Escape') {
                hideSuggestions();
            }
        });

        function updateActive(items) {
            items.forEach(function (a, i) {
                a.parentElement.classList.toggle('active', i === activeIndex);
                if (i === activeIndex) a.parentElement.scrollIntoView({ block: 'nearest' });
            });
        }

        function fetchSuggestions(q) {
            if (suggestionCache.has(q)) {
                renderSuggestions(suggestionCache.get(q), q);
                return;
            }

            if (currentXhr) currentXhr.abort();

            suggestList.innerHTML = '<li class="suggest-loading"><i class="fa fa-spinner fa-spin"></i> Searching...</li>';
            suggestList.classList.add('show');

            currentXhr = $.ajax({
                url: suggestUrl,
                type: 'GET',
                data: { q: q },
                success: function (data) {
                    suggestionCache.set(q, data || []);
                    renderSuggestions(data, q);
                },
                error: function (xhr) {
                    if (xhr.statusText !== 'abort') hideSuggestions();
                }
            });
        }

        function renderSuggestions(items, q) {
            if (!items || items.length === 0) {
                suggestList.innerHTML = '<li class="suggest-empty">No products found for "' + escapeHtml(q) + '"</li>';
                suggestList.classList.add('show');
                return;
            }

            let html = '';
            items.forEach(function (item) {
                const imgTag = item.image
                    ? '<img src="' + escapeHtml(item.image) + '" alt="" loading="lazy">'
                    : '<span class="suggest-img-placeholder"><i class="fa fa-cube"></i></span>';
                html += '<li class="suggest-item"><a href="' + escapeHtml(item.url) + '">' +
                    imgTag +
                    '<span class="suggest-name">' + escapeHtml(item.name) + '</span>' +
                    '</a></li>';
            });

            html += '<li class="suggest-more"><a href="' + shopUrl + '?search=' + encodeURIComponent(q) + '">See all results for "' + escapeHtml(q) + '" &rarr;</a></li>';

            suggestList.innerHTML = html;
            suggestList.classList.add('show');
            activeIndex = -1;
        }

        function hideSuggestions() {
            suggestList.classList.remove('show');
            suggestList.innerHTML = '';
            activeIndex = -1;
        }

        function escapeHtml(str) {
            return String(str)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#39;');
        }

        // Close when clicking outside
        document.addEventListener('click', function (e) {
            const wrap = document.getElementById('navbarSearchWrap');
            if (wrap && !wrap.contains(e.target)) {
                hideSuggestions();
            }
        });

        // Close suggestions on Escape (when input not focused)
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && document.activeElement !== input) {
                hideSuggestions();
            }
        });
    })();
</script>
