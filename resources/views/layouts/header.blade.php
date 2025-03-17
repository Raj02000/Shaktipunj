<header class="site-header">
    <!-- Top Bar -->
    <div class="top-bar bg-white border-bottom">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <!-- Logo -->
            <a href="/" class="header-logo">
                <img src="{{ asset('/images/logo.png') }}" alt="Logo" height="27">
            </a>

            <!-- Contact Info -->
            <div class="d-flex align-items-center header-contact-info">
                @isset($organization->license_no)
                <div class="px-5">
                    <div class="text-muted text-center" style="font-weight: 400">
                        Trekking License No
                    </div>
                    <div class="text-dark text-center">
                        {{ $organization->license_no }}
                    </div>
                </div>
                @endisset


                <div class="text-end">
                    <p class="mb-0 text-muted small">Need Help Booking? Call Us</p>
                    <a href="tel:{{ $organization->phone }}" class="contact-link">
                        <img src="{{ asset('icons/whatsapp.svg') }}" class="contact-icon" />
                        <span>+{{ $organization->phone }}</span>
                    </a>
                    <a href="mailto:{{ $organization->email }}" class="contact-link">
                        <i class="fas fa-envelope contact-icon mt-1" style="color: orange;padding-right:5px"></i>
                        <span> {{ $organization->email }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this button for mobile menu -->
    <button class="mobile-menu-toggle" id="mobileMenuToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Main Navigation -->
    <nav class="main-nav bg-main" id="mainNav">
        <div class="container d-flex align-items-center">
            <!-- Sticky Logo (Hidden by default) -->
            <a href="/" class="nav-logo">
                <img src="{{ asset('/images/logo.png') }}" alt="Logo" style="height: 65px !important;">
            </a>

            <!-- Navigation Links -->
            <ul class="nav-list align-baseline" id="mainNavList">
                <form action="{{ route('search') }}" method="get" id="mobile-search">
                    <input type="search" name="q" class="form-control" placeholder="Search here...."
                        id="">
                </form>
                <!-- Destination Dropdown -->
                @foreach ($destinationsNav as $destination)
                <li class="dropdown">
                    <a href="#" class="nav-link" style="text-transform: uppercase;">
                        {{ $destination->name }} <span class="dropdown-icon">▼</span>
                    </a>
                    <div class="dropdown-menu list-menu">
                        @foreach ($destination->children as $childDestination)
                        <div class="dropdown-section">
                            <h4 style="font-size: 14px" class="sub-nav-link">
                                <a href="{{ route('page.destination', $childDestination->slug) }}">
                                    {{ $childDestination->name }}
                                </a>
                            </h4>


                        </div>
                        @endforeach
                    </div>
                </li>


                @endforeach


                <!-- First dynamic Dropdown -->
                @if ($organization->menu_id)
                <li class="dropdown">
                    <a href="#" class="nav-link">
                        <span style="text-transform: uppercase;">
                            {{ $organization->menu?->name }}
                        </span>
                        <span class="dropdown-icon">▼</span>
                    </a>
                    <div class="dropdown-menu grid-menu">
                        @if (count($organization->menu->children) > 0)
                        @foreach ($organization->menu?->children as $childDestination)
                        <div class="dropdown-section">
                            <h4 style="font-size: 14px" class="sub-nav-link">
                                {{ $childDestination->name }}
                            </h4>
                            <ul style="font-size: 13px">
                                @foreach ($childDestination->packages as $package)
                                <li>
                                    <a class="sub-nav-link"
                                        href="{{ route('page.package.details', $package->slug) }}">
                                        {{ $package->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                        @else
                        <div class="dropdown-section">
                            <ul style="font-size: 13px">
                                @foreach ($organization->menu?->packages as $package)
                                <li>
                                    <a class="sub-nav-link"
                                        href="{{ route('page.package.details', $package->slug) }}">
                                        {{ $package->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </li>
                @endif

                <!-- Second dynamic Dropdown -->
                {{-- @if ($organization->second_menu_id)
                    <li class="dropdown">
                        <a href="#" class="nav-link">
                            <span style="text-transform: uppercase;">
                                {{ $organization->secondMenu?->name }}
                </span>
                <span class="dropdown-icon">▼</span>
                </a>
                <div class="dropdown-menu grid-menu">
                    @if (count($organization->secondMenu->children) > 0)
                    @foreach ($organization->secondMenu?->children as $childDestination)
                    <div class="dropdown-section">
                        <h4 style="font-size: 14px" class="sub-nav-link">
                            {{ $childDestination->name }}
                        </h4>
                        <ul style="font-size: 13px">
                            @foreach ($childDestination->packages as $package)
                            <li>
                                <a class="sub-nav-link"
                                    href="{{ route('page.package.details', $package->slug) }}">
                                    {{ $package->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                    @else
                    <div class="dropdown-section">
                        <ul style="font-size: 13px">
                            @foreach ($organization->secondMenu?->packages as $package)
                            <li>
                                <a class="sub-nav-link"
                                    href="{{ route('page.package.details', $package->slug) }}">
                                    {{ $package->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                </li>
                @endif --}}


                <li class="dropdown">
                    <a href="#" class="nav-link" style="font-size: 14px">COMPANY INFO <span
                            class="dropdown-icon">▼</span></a>
                    <ul class="dropdown-menu list-menu" style="font-size: 13px">
                        @foreach ($companyInfoNav as $companyInfo)
                        <li><a class="sub-nav-link"
                                href="{{ route('page.company-info', $companyInfo->slug) }}">{{ $companyInfo->title }}</a>
                        </li>
                        @endforeach
                    </ul>

                <li><a href="{{ route('page.blogs') }}" class="nav-link">BLOGS</a></li>
                <li><a href="{{ route('page.contactUs') }}" class="nav-link">CONTACT US</a></li>
            </ul>
            <div>
                <button type="button" class="search-btn" data-toggle="modal" data-target="#searchboxmodal">
                    <i class="fa fa-search search-icon"></i>
                </button>
            </div>
        </div>
    </nav>

</header>
<!-- Vertically centered modal -->
<div class="modal fade" id="searchboxmodal" tabindex="-1" aria-labelledby="searchbox" aria-hidden="true">
    <div id="searchbox">
        <form action="{{ route('search') }}" method="get">
            <input type="search" name="q" class="form-control" placeholder="Search here...." id="">
        </form>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nav = document.getElementById('mainNav');
        const navHeight = nav.offsetHeight;

        function handleScroll() {
            if (window.scrollY > 100) {
                nav.classList.add('sticky');
                document.body.style.paddingTop = navHeight + 'px';
            } else {
                nav.classList.remove('sticky');
                document.body.style.paddingTop = '0';
            }
        }

        window.addEventListener('scroll', handleScroll);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mainNavList = document.getElementById('mainNavList');
        const dropdowns = document.querySelectorAll('.dropdown');

        // Mobile menu toggle
        mobileMenuToggle.addEventListener('click', function() {
            mainNavList.classList.toggle('active');
            this.classList.toggle('active');
        });

        // Handle dropdowns on mobile
        if (window.innerWidth <= 991) {
            dropdowns.forEach(dropdown => {
                const link = dropdown.querySelector('.nav-link');
                const menu = dropdown.querySelector('.dropdown-menu');

                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
                });
            });
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.nav-list') && !e.target.closest('.mobile-menu-toggle')) {
                mainNavList.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
            }
        });

        // Resize handler
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) {
                mainNavList.classList.remove('active');
                mobileMenuToggle.classList.remove('active');
                dropdowns.forEach(dropdown => {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    menu.style.display = '';
                });
            }
        });
    });
</script>