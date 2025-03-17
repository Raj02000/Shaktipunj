 <!-- partial:partials/_navbar.html -->
 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
         <a class="navbar-brand brand-logo" href="{{ route('admin.dashboard') }}"><img src="{{ asset('images/user.png') }}"
                 alt="logo" style="object-fit: contain;" /></a>
         <a class="navbar-brand brand-logo-mini" href="{{ route('admin.dashboard') }}"><img
                 src="{{ asset('images/user.png') }}" alt="logo" style="object-fit: contain;" /></a>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-stretch">
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
             <span class="mdi mdi-menu"></span>
         </button>

         <ul class="navbar-nav navbar-nav-right">
             <li class="nav-item nav-profile dropdown">
                 <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                     aria-expanded="false">
                     <div class="nav-profile-img">
                         <img src="{{ asset('admin/images/faces/user1.png') }}" alt="image">
                         <span class="availability-status online"></span>
                     </div>
                     <div class="nav-profile-text">
                         <p class="mb-1 fw-bold  text-black">{{ auth()->user()->name }}</p>
                     </div>
                 </a>
                 <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

                     <a class="dropdown-item" href="{{ route('change.password') }}">
                         <i class="mdi mdi-logout me-2 text-primary"></i> Change Password </a>
                     <form action="{{ route('logout') }}" method="post">
                         @csrf
                         <button type="submit" class="dropdown-item" href="{{ route('logout') }}">
                             <i class="mdi mdi-logout me-2 text-primary"></i> Logout </button>
                     </form>
                 </div>
             </li>
             <li class="nav-item d-none d-lg-block full-screen-link">
                 <a class="nav-link">
                     <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                 </a>
             </li>

         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
             data-toggle="offcanvas">
             <span class="mdi mdi-menu"></span>
         </button>
     </div>
 </nav>
 <!-- partial -->
