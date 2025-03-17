<footer class="site-footer">
    <div class="footer-top">
        <div class="position-relative newsletter-help-section">
            <div class="text-center py-5 newsletter-bg">
                <p class="m-0 pb-4" style="">Sign up for our
                    newsletter</p>
                <div class="pb-5">
                    <form action="{{ route('newsletter') }}" method="POST" class="d-flex justify-content-center">
                        @csrf
                        <input type="text" name="name" class="newsletter-input" placeholder="Enter name">
                        <input type="email" name="email" class="newsletter-input" placeholder="Enter email address">
                        <button class="btn contact-us-btn " type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="container">

                <div class="help-section">
                    <div class="d-flex justify-content-between px-5">
                        <div class="">
                            <img src="{{ asset('images/logo.png') }}" alt="ShaktiPunj"
                                class="need-help-img" class="img-fluid" />
                        </div>
                        <div class="px-5 pt-3" style="max-width: 50vw; ">
                            <p class="m-0 need-help-title">Need Help?</p>
                            <p class="m-0 need-help-text">Are you looking for the Nepal holiday? or need help to plan a
                                trip,
                                please do not hesitate to get
                                in touch with us.</p>
                        </div>
                        <div style="max-width: 25vw;">
                            <div class="d-flex flex-column align-items-center pt-4">
                                <p class="m-0" style="font-size: 1.3rem;font-weight: 600;">+{{ $organization->phone }}
                                </p>
                                <p class="m-0">Or</p>
                                <a href="{{ route('page.contactUs') }}" class="btn contact-us-btn">Send us message</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">

            <div class="row g-4">
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="footer-widget">
                        <p class="footer-title">About ShaktiPunj</p>
                        <div class="about-content footer-text">
                            <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus,
                                luctus nec ullamcorper mattis.</p>
                            <div class="social-links mt-3">
                                <a href="{{ $organization->facebook }}" class="social-link"><i
                    class="fab fa-facebook-f"></i></a>
                <a href="{{ $organization->twitter }}" class="social-link"><i
                        class="fab fa-twitter"></i></a>
                <a href="{{ $organization->instagram }}" class="social-link"><i
                        class="fab fa-instagram"></i></a>
                <a href="{{ $organization->linkedIn }}" class="social-link"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    </div> --}}

    <div class="col-lg-8 col-md-12 quick-links-footer">
        <p class="footer-title">Quick Links</p>
        <div class="footer-widget row">
            @forelse ($quickLinksNav as $quickLinkChunk)
            <ul class="contact-info footer-text col-xs-12 col-md-4 " style="padding-left: 15px">
                @forelse ($quickLinkChunk as $quickLink)
                <li>
                    <a href="{{ $quickLink['url'] }}" target="_blank">{{ $quickLink['name'] }}</a>
                </li>
                @empty
                @endforelse
            </ul>
            @empty
            <span>No links available</span>
            @endforelse
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="footer-widget">
            <p class="footer-title">Contact Information</p>
            <ul class="contact-info footer-text">
                <li>
                    <i class="fas fa-map-marker-alt"></i>
                    <span>{{ $organization->address }}</span>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <a href="tel:{{ $organization->phone }}">+{{ $organization->phone }}</a>
                </li>
                <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:{{ $organization->email }}">{{ $organization->email }}</a>
                </li>
            </ul>
            <div class="social-links mt-3">
                <a href="{{ $organization->facebook }}" class="social-link"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="{{ $organization->instagram }}" class="social-link"><i
                        class="fab fa-instagram"></i></a>
                <a href="{{ $organization->youtube }}" class="social-link"><i
                        class="fab fa-youtube"></i></a>

            </div>
        </div>
    </div>

    </div>
    </div>

    </div>



    <div class="footer-bottom py-3">
        <div class="container my-5">


            <p class="mt-4 pt-2 mb-0 text-center text-gray"
                style="font-size: 1rem;font-weight: 600;text-transform: uppercase;">&copy; {{ date('Y') }} ShaktPunj
                All rights reserved.</p>
            <p class="m-0 text-center" style="font-size: 0.8rem;">Designed and Developed by <a
                    href="https://aitechnology.com.np/" style="text-decoration: none;" target="_blank"
                    class="text-gray">Ant
                    Technology</a></p>

        </div>
    </div>

</footer>


<style>
    .whatsapp-icon {
        display: none;
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
    }

    .whatsapp-icon.show {
        display: block;
        opacity: 1;
    }
</style>

<span id="whatsapp-icon" class="whatsapp-icon">
    <a href="https://wa.me/{{ $organization->whatsapp_phone }}" target="_blank" class="whatsapp-float-link">
        <img src="{{ asset('icons/whatsapp.svg') }}" />
    </a>
</span>
<!-- Keep your existing JavaScript includes -->
<a id="backTotop" href="#" class="to-top-icon">
    <i class="fas fa-chevron-up"></i>
</a>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var whatsappIcon = document.getElementById("whatsapp-icon");

        window.addEventListener("scroll", function() {
            if (window.scrollY > 300) { // Adjust the scroll value as needed
                whatsappIcon.classList.add("show");
            } else {
                whatsappIcon.classList.remove("show");
            }
        });
    });
</script>
<!-- JavaScript -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendors/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('vendors/countdown-date-loop-counter/loopcounter.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.js') }}"></script>
<script src="{{ asset('vendors/modal-video/jquery-modal-video.min.js') }}"></script>
<script src="{{ asset('vendors/masonry/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('vendors/lightbox/dist/js/lightbox.min.js') }}"></script>
<script src="{{ asset('vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/custom.min.js') }}"></script>