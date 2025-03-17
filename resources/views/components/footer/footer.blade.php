<style>
    .footer {
        position: relative;
        width: 100%;
        border: 1px solid #3A3A3CF5;
        background: #3A3A3CF5;
    }

    .footer-image {
        position: absolute;
        bottom: 0;
        left: -70px;
        z-index: 2;
        height: 510px;
        opacity: 0.2;
        transform: scaleX(-1);
    }

    .footer-row {
        padding-right: 80px;
    }

    .footer-title {
        font-size: 17px;
        font-weight: 600;
        line-height: 19.61px;
        text-align: left;
        color: white;
    }

    .section {
        margin-top: 15px;
    }

    .footer-main-title {

        font-size: 20px;
        font-weight: 600;
        line-height: 25.21px;
        color: white;
    }

    @media screen and (max-width:600px) {
        .footer-main-title {

            font-size: 20px;
            font-weight: 600;
            line-height: 25.21px;
            color: white;
            margin-top: 30px;

        }

    }

    .copyright-section {
        background: rgba(147, 149, 152, 1);
        width: 100%;
    }

    .copyright-text {
        font-size: 14px;
    }
</style>

<div class="footer mt-0 pb-5">
    <div class="container-fluid ps-5 ">
        <div class="row" style="margin: 20px 0px;">
            <div class=" col-sm-12 col-md-6 col-lg-3 ">
                @isset($organization)
                    <div class="footer-row">
                        <img src="{{ asset('image/m.png') }}" alt="">
                        <div class="footer-title section">{!! $organization->extra['descriptions'] !!}</div>
                        <div class="row">
                            @foreach ($organization->extra['sections'] as $section)
                                @if (strtolower($section['id']) === 'facebook')
                                    <a class="col-2 fs-3 text-white" style="z-index: 4;" href="{{ $section['detail'] }}">
                                        <i class="fa fa-facebook" aria-hidden="true"></i></a>
                                @endif
                                @if (strtolower($section['id']) === 'twitter')
                                    <a class="col-2 fs-3 text-white" style="z-index: 4;" href="{{ $section['detail'] }}">
                                        <i class="fa fa-twitter" aria-hidden="true"></i></a>
                                @endif

                                @if (strtolower($section['id']) === 'instagram')
                                    <a class="col-2 fs-3 text-white" style="z-index: 4;" href="{{ $section['detail'] }}"><i
                                            class="fa fa-instagram" aria-hidden="true"></i></a>
                                @endif


                                @if (strtolower($section['id']) === 'linkedin')
                                    <a class="col-2 fs-3 text-white" style="z-index: 4;" href="{{ $section['detail'] }}"><i
                                            class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                                @endif

                                @if (strtolower($section['id']) === 'number')
                                    <div class="d-flex order-2 footer-title align-items-center section">
                                        <i class="fa-solid fa-phone fs-4"></i>
                                        <div> {{ $section['detail'] }}</div>
                                    </div>
                                @endif
                                @if (strtolower($section['id']) == 'mail')
                                    <div class="d-flex order-3 footer-title align-items-center section">
                                        <i class="fa-regular fa-envelope fs-4"></i>
                                        <div> {{ $section['detail'] }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="footer-row ">
                        <img src="{{ asset('images/m.png') }}" alt="">
                        <div class="footer-title section">Lets get Social</div>
                        <div class="section">Logo</div>
                        <div class="d-flex footer-title align-items-center section">

                            <i class="fa-solid fa-phone fs-4 me-2"></i>
                            <div>01-5244068/01-5244087</div>
                        </div>
                        <div class="d-flex footer-title align-items-center section">
                            <i class="fa-regular fa-envelope fs-4 me-2"></i>


                            <div>info@momentum.com</div>
                        </div>
                    </div>
                @endisset
            </div>
            <div class=" col-sm-12 col-md-6 col-lg-3">
                <div class="footer-main-title">STUDY DESTINATIONS</div>
                @isset($destinationNav)
                    @foreach ($destinationNav as $destination)
                        <a class="text-decoration-none w-25" href="{{ route('destination', $destination->id) }}">
                            <div class="footer-title section">{{ $destination->name }}</div>
                        </a>
                    @endforeach
                @endisset
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <div class="footer-main-title">SERVICES FOR STUDENTS</div>
                @isset($serviceNav)
                    @foreach ($serviceNav as $service)
                        <a class="text-decoration-none" href="{{ route('services.view', $service->id) }}">
                            <div class="footer-title section">{!! $service->title !!}</div>
                        </a>
                    @endforeach
                @endisset
            </div>
            <div class="col-sm-12 col-md-6 col-lg-3 mt-4 mt-lg-0">
                <div class="footer-main-title">OTHER LINKS</div>
                {{-- {{ dd($otherLinkFooter) }} --}}
                @isset($otherLinkFooter)
                    @foreach ($otherLinkFooter as $otherLink)
                        <a class="text-decoration-none" target="_blank" href="{{ $otherLink->link }}">
                            <div class="footer-title section">{{ $otherLink->title }}</div>
                        </a>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
    <img class="footer-image" src="{{ asset('img/footer-image.png') }}" alt="footer image">
</div>
<div
    class="copyright-section d-flex flex-column flex-sm-row align-items-center justify-content-between px-0 py-1 px-sm-5">
    <div class="text-light d-flex align-items-center copyright-text">Copyright © 2024 Service Eye Pvt. Ltd. All Right
        Reserved.</div>
    <div class="d-flex">
        <a href="{{ route('terms-and-conditions') }}" class="copyright-text text-light pe-0 pe-sm-4">Terms and
            Conditions</a>
        <a href="{{ route('privacy-policy') }}" class="copyright-text text-light">Privacy Policy</a>
    </div>

</div>
