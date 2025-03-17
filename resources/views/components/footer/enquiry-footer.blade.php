<style>
    .enquiry-footer {
        position: relative;
        height: 350px;
        background: linear-gradient(218.57deg, rgba(228, 5, 5, 0.89) -87.55%, #FFB6B6 189.57%);
        z-index: 5;
    }

    /* .enquiry-footer::before {
  
    position: absolute;
 bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    height: 40px;
    width: 100%;
    border-radius:    0% 0% 50% 50%;
    background: #F36A6A;
    z-index: 1;
} */


    .enquiry-footer-line-1 {
        position: absolute;
        top: 50px;
        left: 0;
        height: 150px;
        z-index: 0;


    }

    .enquiry-footer-line-2 {
        position: absolute;
        top: 60px;
        right: 0;
        height: 150px;
        z-index: 0;

    }

    .enquiry-title {
        font-size: 42px;
        font-weight: 700;
        line-height: 58.82px;
        text-align: center;
        z-index: 1;





    }

    .enquiry-subtitle {

        font-size: 19px;
        font-weight: 700;
        line-height: 26.61px;
        text-align: center;
        z-index: 1;
        padding-top: 15px;
        margin: 0px 30%;


    }

    .enquiry-text {
        text-align: center;
        color: white;
        padding-top: 40px;
    }

    .enquiry-button {
        background: linear-gradient(90deg, #FFFFFF 0%, #FFF5F5 100%);
        border: none;
        margin-top: 30px;
        border-radius: 18px 18px 19px 18px;
        font-size: 23px;
        font-weight: 700;
        width: 200px;
        height: 59px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .enquiry-link {
        text-decoration: none;
        padding-top: 30px;

        text-align: center;
        color: #F15C5C;

        font-size: 20px;
        font-weight: 600;
        line-height: 28.01px;


    }

    @media screen and (max-width:1200px) {

        .enquiry-footer-line-1 {
            display: none;
        }

        .enquiry-footer {
            height: 290px;
        }

        .enquiry-footer-line-2 {
            display: none;

        }

        .enquiry-title {
            font-size: 25px;
            font-weight: 700;
            line-height: 58.82px;
            text-align: center;
            z-index: 1;
        }

        .enquiry-subtitle {
            margin: 0px 5%;
            font-size: 17px;
        }

        .arc-top {}
    }

    .arc-bottom {
        background: none;
        margin-top: 0px;
        width: 100%;
        border: none;
        z-index: 1;
    }

    .arc-path {
        background: black;
        opacity: 0.75;
    }

    .arc-top {
        border: none;
        position: absolute;
        z-index: -1;
        background: linear-gradient(218.57deg, rgba(255, 23, 23, 0.89) -87.55%, #FFB6B6 189.57%);
    }
</style>


<div class="enquiry-footer mt-5">
    <img src="{{ asset('img/line-1.png') }}" class="enquiry-footer-line-1" alt="">
    <img src="{{ asset('img/line-2.png') }}" class="enquiry-footer-line-2" alt="">

    <div class="enquiry-text">
        <div class="enquiry-title">Ready to take the LEAP?</div>
        <div class="enquiry-subtitle">Ignite your future through exceptional education and dynamic opportunities for
            growth."</div>
        <div class="w-100 d-flex justify-content-center">

            <a href="{{ route('contact') }}" type="button" class="btn enquiry-button primary-text">Enquiry
                Now</a>
        </div>

    </div>
</div>


<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="arc-top">
    <path fill="#fff" fill-opacity="1"
        d="M0,128L120,117.3C240,107,480,85,720,85.3C960,85,1200,107,1320,117.3L1440,128L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
    </path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 130" class="arc-bottom">
    <path class="arc-path"
        d="M0,128L120,117.3C240,107,480,85,720,85.3C960,85,1200,107,1320,117.3L1440,128L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z">
    </path>
</svg>
