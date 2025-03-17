<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item @if (str_contains(url()->current(), route('admin.dashboard'))) active @endif">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>

        @php
        $servicesRoute = [route('admin.core-value.index'), route('admin.achievements.index')];
        @endphp
        <li class="nav-item @if (in_array(url()->current(), $servicesRoute)) active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#servicesMenu" aria-expanded="false"
                aria-controls="servicesMenu">
                <span class="menu-title">Home</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-package-variant-closed menu-icon"></i>
            </a>
            <div class="collapse" id="servicesMenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @if (str_contains(url()->current(), route('banner-image.index'))) active @endif"
                            href="{{ route('banner-image.index') }}">Banner</a>
                    </li>

                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @if (str_contains(url()->current(), route('menu'))) active @endif"
                            href="{{ route('menu') }}">Menu</a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item @if (str_contains(url()->current(), route('bookings.index'))) active @endif">
            <a class="nav-link" href="{{ route('bookings.index') }}">
                <span class="menu-title">Bookings</span>
                <i class="mdi mdi-map menu-icon"></i>
            </a>
        </li>
        <li class="nav-item @if (in_array(url()->current(), $servicesRoute)) active @endif">
            <a class="nav-link" data-bs-toggle="collapse" href="#pageMenu" aria-expanded="false"
                aria-controls="pageMenu">
                <span class="menu-title">Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-package-variant-closed menu-icon"></i>
            </a>
            <div class="collapse" id="pageMenu">
                {{-- <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link @if (str_contains(url()->current(), route('page.index', ['model' => 'travel_info']))) active @endif"
                            href="{{ route('page.index', ['model' => 'travel_info']) }}">Travel Info</a>
        </li>

    </ul> --}}
    <ul class="nav flex-column sub-menu">
        <li class="nav-item">
            <a class="nav-link @if (str_contains(url()->current(), route('page.index', ['model' => 'company_info']))) active @endif"
                href="{{ route('page.index', ['model' => 'company_info']) }}">Company Info</a>
        </li>

    </ul>
    </div>
    </li>

    <li class="nav-item @if (str_contains(url()->current(), route('partner.index'))) active @endif">
        <a class="nav-link" href="{{ route('partner.index') }}">
            <span class="menu-title">Partner</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>


    <li class="nav-item @if (str_contains(url()->current(), route('destination.index'))) active @endif">
        <a class="nav-link" href="{{ route('destination.index') }}">
            <span class="menu-title">Topics</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>

    {{-- <li class="nav-item @if (str_contains(url()->current(), route('trip.index'))) active @endif">
            <a class="nav-link" href="{{ route('trip.index') }}">
    <span class="menu-title">Trips</span>
    <i class="mdi mdi-map menu-icon"></i>
    </a>
    </li> --}}

    <li class="nav-item @if (str_contains(url()->current(), route('package.index'))) active @endif">
        <a class="nav-link" href="{{ route('package.index') }}">
            <span class="menu-title">Packages</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>

    <li class="nav-item @if (str_contains(url()->current(), route('review.index'))) active @endif">
        <a class="nav-link" href="{{ route('review.index') }}">
            <span class="menu-title">Reviews</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>

    <li class="nav-item @if (str_contains(url()->current(), route('tag.index'))) active @endif">
        <a class="nav-link" href="{{ route('tag.index') }}">
            <span class="menu-title">Tags</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>

    <li class="nav-item @if (str_contains(url()->current(), route('category.index'))) active @endif">
        <a class="nav-link" href="{{ route('category.index') }}">
            <span class="menu-title">Categories</span>
            <i class="mdi mdi-map menu-icon"></i>
        </a>
    </li>

    @can('view_team')
    <li class="nav-item @if (str_contains(url()->current(), route('team.index'))) active @endif">
        <a class="nav-link" href="{{ route('team.index') }}">
            <span class="menu-title">Teams</span>
            <i class="mdi mdi-account-group menu-icon"></i>
        </a>
    </li>
    @endcan

    <li class="nav-item @if (str_contains(url()->current(), route('blog.index'))) active @endif">
        <a class="nav-link" href="{{ route('blog.index') }}">
            <span class="menu-title">Blogs</span>
            <i class="mdi mdi-post menu-icon"></i>
        </a>
    </li>
    {{--
        <li class="nav-item @if (str_contains(url()->current(), route('testimonial.index'))) active @endif">
            <a class="nav-link" href="{{ route('testimonial.index') }}">
    <span class="menu-title">Testimonials</span>
    <i class="mdi mdi-account-star menu-icon"></i>
    </a>
    </li>

    <li class="nav-item @if (str_contains(url()->current(), route('faq.index'))) active @endif">
        <a class="nav-link" href="{{ route('faq.index') }}">
            <span class="menu-title">FAQs</span>
            <i class="mdi mdi-chat-question menu-icon"></i>
        </a>
    </li> --}}

    <li class="nav-item @if (str_contains(url()->current(), route('quick-link.index'))) active @endif">
        <a class="nav-link" href="{{ route('quick-link.index') }}">
            <span class="menu-title">Quick Links</span>
            <i class="mdi mdi-book-open menu-icon"></i>
        </a>
    </li>

    <li class="nav-item @if (str_contains(url()->current(), route('organization.index'))) active @endif">
        <a class="nav-link" href="{{ route('organization.index') }}">
            <span class="menu-title">Organization</span>
            <i class="mdi mdi-book-open menu-icon"></i>
        </a>
    </li>

    @can('view_extra')
    <li class="nav-item @if (str_contains(url()->current(), route('extra.index'))) active @endif">
        <a class="nav-link" href="{{ route('extra.index') }}">
            <span class="menu-title">Extra</span>
            <i class="mdi mdi-cogs menu-icon"></i>
        </a>
    </li>
    @endcan

    <li class="nav-item @if (str_contains(url()->current(), route('contact.index'))) active @endif">
        <a class="nav-link" href="{{ route('contact.index') }}">
            <span class="menu-title">Enquiries</span>
            <i class="mdi mdi-message-badge menu-icon"></i>
        </a>
    </li>
    <li class="nav-item @if (str_contains(url()->current(), route('newsletter.index'))) active @endif">
        <a class="nav-link" href="{{ route('newsletter.index') }}">
            <span class="menu-title">Newsletter</span>
            <i class="mdi mdi-message-badge menu-icon"></i>
        </a>
    </li>

    @can('view_value_policy')
    <li class="nav-item @if (str_contains(url()->current(), route('value-policy.index'))) active @endif">
        <a class="nav-link" href="{{ route('value-policy.index') }}">
            <span class="menu-title">Values</span>
            <i class="mdi mdi-tooltip-question menu-icon"></i>
        </a>
    </li>
    @endcan

    @can('view_value_policy')
    <li class="nav-item @if (str_contains(url()->current(), route('approach.index'))) active @endif">
        <a class="nav-link" href="{{ route('approach.index') }}">
            <span class="menu-title">Approach</span>
            <i class="mdi mdi-account-cog menu-icon"></i>
        </a>
    </li>
    @endcan
    @can('view_extra')
    <li class="nav-item @if (str_contains(url()->current(), route('link.index'))) active @endif">
        <a class="nav-link" href="{{ route('link.index') }}">
            <span class="menu-title">Other Links</span>
            <i class="mdi mdi-link menu-icon"></i>
        </a>
    </li>
    @endcan


    </ul>
</nav>