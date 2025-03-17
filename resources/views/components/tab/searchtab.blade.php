@props([
    'searchDestination',
    'searchEvents',
    'searchBlogs',
    'searchGallery',
    'search',
    'Destination',
    'Events',
    'Blogs',
    'Gallery',
])
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    :root {
        --first-color: #2e2e41;
        --second-color: #5b85ff;
        --third-color: #434354;
        --text-color: black;

        --box-shadow: 0 5px 25px rgb(2, 2, 2, 0.1);
        --text-shadow: 0 5px 25px rgb(2, 2, 2, 0.1);
    }

    .link-tab {
        text-decoration: none;
    }




    section {
        position: relative;
        bottom: -48px;

        margin: 0px 80px 0px;
        transition: .5s ease;
        z-index: 1;
    }

    .main-container {}

    /* ===== Tab navigation content ===== */
    .tab-nav-bar {
        position: relative;



    }

    .tab-navigation {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: fit-content;
        margin: 0 auto;
    }

    .tab-menu {
        color: var(--text-color);
        list-style: none;

        max-width: 1800px;
        padding: 10px;
        white-space: nowrap;
        border-radius: 50px;
        border: black;
        display: flex;
        scroll-behavior: smooth;
        font-size: 22px;
        user-select: none;
        overflow-x: auto;
    }

    .tab-menu.dragging {
        scroll-behavior: unset;
        cursor: grab;
    }

    .tab-menu::-webkit-scrollbar {
        display: none;
    }

    .tab-btn {

        color: var(--text-color);
        font-size: 18px;
        font-weight: 600;
        margin: 0 1px;
        padding: 10px 30px;
        border-radius: 10px;
        background-color: white;
        display: flex;


        align-items: center;


        cursor: pointer;
        user-select: none;
        transition: background-color .3s ease;
    }

    .tab-menu.dragging .tab-btn {
        pointer-events: none;
    }



    .tab-btn.active {
        background-color: #D9D9D9;
    }

    .left-btn,
    .right-btn {
        position: absolute;
        color: white;
        font-size: 17px;

        cursor: pointer;
    }

    .left-btn {
        left: 0;
        bottom: 48%;
        display: none;
        border: 1px solid black;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
    }

    .right-btn {
        right: 0;



        bottom: 48%;
        border: 1px solid black;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;


    }




    /* ===== Tab content ===== */
    .tab-content {
        position: relative;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .tab {
        position: absolute;
        right: auto;
        bottom: 0;
        left: auto;
        max-width: 1800px;
        padding: 15px 10px;
        opacity: 0;

        transform: translateX(25px);
        content-visibility: hidden;
    }

    .tab.active {
        transform: translateX(0);
        content-visibility: visible;
        opacity: 1;
        transition: opacity 1s ease, transform 1s ease;
    }

    .tab .row {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 50px 0;
        gap: 30px;
    }

    .tab .img-card {
        position: relative;
        width: 450px;
        max-width: 450px;
        height: 300px;
        max-height: 300px;
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: var(--box-shadow);
    }

    .tab .img-card img {
        width: 100%;
        object-fit: cover;
    }

    .right-column {
        max-width: 800px;
    }

    .info .city,
    .info .description p {
        color: var(--text-color);
        margin-bottom: 10px;
    }

    .info .city {
        font-size: 2em;
    }

    .country {
        color: var(--third-color);
        font-size: 5em;
        font-weight: 700;
        text-align: center;
        text-shadow: var(--text-shadow);
    }



    /* ===== Media queries (max-width: 1050px;) ===== */
    @media screen and (max-width: 1050px) {
        section {
            margin: 0 0;

        }

        .tab-btn {

            color: var(--text-color);
            font-size: 14px;
            max-width: 220px;

        }

        .tab-menu {
            font-size: 10px;
            max-width: 1800%;
            border-radius: 0px;
        }



        .tab {
            padding: 15px 25px;
        }

        .tab .row {
            flex-direction: column;
        }

        .tab .img-card {
            width: auto;
            max-width: 600px;
        }




    }

    .tab-navigation {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        max-width: fit-content;
        margin: 0 auto;
    }

    .tab-menu {
        color: var(--text-color);
        list-style: none;

        max-width: 1800px;
        padding: 10px;
        white-space: nowrap;
        border-radius: 50px;
        border: black;
        display: flex;


        scroll-behavior: smooth;
        font-size: 22px;

        user-select: none;
        overflow-x: auto;
    }

    .tab-menu.dragging {
        scroll-behavior: unset;
        cursor: grab;
    }

    .tab-menu::-webkit-scrollbar {
        display: none;
    }

    .tab-btn {

        color: var(--text-color);
        font-size: 18px;
        font-weight: 600;
        margin: 0 1px;
        padding: 10px 30px;
        border-radius: 10px;
        background-color: white;
        display: flex;


        align-items: center;


        cursor: pointer;
        user-select: none;
        transition: background-color .3s ease;
    }

    .tab-menu.dragging .tab-btn {
        pointer-events: none;
    }



    .tab-btn.active {
        background-color: #D9D9D9;
    }

    .left-btn,
    .right-btn {
        position: absolute;
        color: white;
        font-size: 17px;

        cursor: pointer;
    }

    .left-btn {
        left: 0;
        bottom: 48%;
        display: none;
        border: 1px solid black;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;
    }

    .right-btn {
        right: 0;



        bottom: 48%;
        border: 1px solid black;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 50%;


    }




    /* ===== Tab content ===== */
    .tab-content {
        position: relative;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .tab {
        position: absolute;
        top: 0;
        right: auto;
        bottom: 0;
        left: auto;
        max-width: 1800px;
        padding: 15px 10px;
        opacity: 0;

        transform: translateX(25px);
        content-visibility: hidden;
    }

    .tab.active {
        transform: translateX(0);
        content-visibility: visible;
        opacity: 1;
        transition: opacity 1s ease, transform 1s ease;
    }

    .tab .row {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 50px 0;
        gap: 30px;
    }

    .tab .img-card {
        position: relative;
        width: 450px;
        max-width: 450px;
        height: 300px;
        max-height: 300px;
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: var(--box-shadow);
    }

    .tab .img-card img {
        width: 100%;
        object-fit: cover;
    }

    .right-column {
        max-width: 800px;
    }

    .info .city,
    .info .description p {
        color: var(--text-color);
        margin-bottom: 10px;
    }

    .info .city {
        font-size: 2em;
    }

    .country {
        color: var(--third-color);
        font-size: 5em;
        font-weight: 700;
        text-align: center;
        text-shadow: var(--text-shadow);
    }

    .tab-btn:hover {
        color: red;
    }



    /* ===== Media queries (max-width: 1050px;) ===== */
    @media screen and (max-width: 1050px) {
        section {
            margin: 0 0;
        }

        .tab-btn {

            color: var(--text-color);
            font-size: 14px;
            max-width: 220px;

        }

        .tab-menu {
            font-size: 10px;
            max-width: 1800%;
            border-radius: 0px;
        }

        .tab {
            padding: 15px 25px;
        }

        .tab .row {
            flex-direction: column;
        }

        .tab .img-card {
            width: auto;
            max-width: 600px;
        }
    }

    .section-banner {
        height: 215px;
        max-width: 100%;
        background: linear-gradient(0deg, #B54444, #B54444),
            linear-gradient(112.88deg, rgba(249, 61, 80, 0.39) 5.24%, rgba(28, 1, 4, 0.39) 81.5%);
        margin-bottom: 35px;

    }

    .banner-title {
        font-family: Buenos Aires;
        font-size: 40px;
        font-weight: 700;
        line-height: 56.02px;

        color: white;
        padding-top: 30px;


    }

    .banner-subtitle {
        font-family: Buenos Aires !important;
        font-size: 18px;
        font-weight: 700;
        line-height: 25.21px;
        text-align: center;
        color: white;
        margin: 3px 20%;


    }


    @media screen and (max-width:800px) {

        .banner-subtitle {
            margin: 3px 0px;

        }

        .banner-title {
            font-family: Buenos Aires;
            font-size: 25px;
            font-weight: 700;
            line-height: 56.02px;

            color: white;
            padding-top: 30px;


        }

        .banner-subtitle {
            font-family: Buenos Aires !important;
            font-size: 18px;
            font-weight: 700;
            line-height: 25.21px;
            text-align: center;
            color: white;
            margin: 3px 15%;
        }
    }

    @media screen and (max-width:800px) {
        section {
            bottom: 0px;
            margin: 0px 00px 0px;
            transition: .5s ease;
            z-index: 1;
        }
    }
</style>

<div class="container-fluid section-banner">
    <div class="banner-title text-center">Search Results for {{ $search }}</div>

    <section class="">
        <div class="tab-nav-bar">
            <div class="tab-navigation">

                <ion-icon class="left-btn" name="chevron-back-outline"></ion-icon>
                <ion-icon class="right-btn" name="chevron-forward-outline"></ion-icon>

                <ul class="tab-menu">

                    @isset($Destination)
                        <li class="tab-btn active "><i class="me-3 fa-solid fa-building-columns"></i>
                            <div>Destination @if ($searchDestination != null)
                                    ({{ $searchDestination->count() - 1 }})
                                @else
                                    (0)
                                @endif
                            </div>
                        </li>
                    @else
                        <a href="{{ route('search.destination', ['search' => $search]) }}" class="link-tab">
                            <li class="tab-btn"> <i class="me-3 fa-solid fa-building-columns"></i>
                                Destination @if ($searchDestination != null)
                                    ({{ $searchDestination->count() - 1 }})
                                @else
                                    (0)
                                @endif
                            </li>
                        </a>

                    @endisset
                    @isset($Events)
                        <li class="tab-btn active"><i class="me-3 fa-solid fa-calendar-days"></i>Events
                            ({{ $searchEvents->count() }})
                        </li>
                    @else
                        <a href="{{ route('search.events', ['search' => $search]) }}" class="link-tab">
                            <li class="tab-btn"><i class="me-3 fa-solid fa-calendar-days"></i>Events
                                ({{ $searchEvents->count() }})
                            </li>
                        </a>
                    @endisset
                    @isset($Blogs)
                        <li class="tab-btn active"><i class="me-3 fa-solid fa-camera"></i>Blogs
                            ({{ $searchBlogs->count() }})
                        </li>
                    @else
                        <a href="{{ route('search.blogs', ['search' => $search]) }}" class="link-tab">

                            <li class="tab-btn"><i class="me-3 fa-solid fa-camera"></i>Blogs
                                ({{ $searchBlogs->count() }})
                            </li>
                        </a>
                    @endisset
                    @isset($Gallery)
                        <li class="tab-btn active"><i class="me-3 fa-regular fa-image"></i>Gallery
                            ({{ $searchGallery->count() }})
                        </li>
                    @else
                        <a href="{{ route('search.gallery', ['search' => $search]) }}" class="link-tab">
                            <li class="tab-btn"><i class="me-3 fa-regular fa-image"></i>Gallery
                                ({{ $searchGallery->count() }})
                            </li>
                        </a>
                    @endisset

                </ul>
            </div>

        </div>


    </section>
</div>




<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="js/script.js"></script>

<script>
    const btnLeft = document.querySelector('.left-btn');
    const btnRight = document.querySelector('.right-btn');
    const tabMenu = document.querySelector('.tab-menu');

    const iconVisibility = () => {
        let scrollLeftValue = Math.ceil(tabMenu.scrollLeft);
        console.log('1.', scrollLeftValue);

        let scrollableWidth = tabMenu.scrollWidth - tabMenu.clientWidth;
        console.log('2.', scrollableWidth);

        btnLeft.style.display = scrollLeftValue > 0 ? 'block' : 'none';
        btnRight.style.display = scrollableWidth > scrollLeftValue ? 'block' : 'none';
    };

    btnRight.addEventListener('click', () => {
        tabMenu.scrollLeft += 150;
        //iconVisibility();
        setTimeout(() => iconVisibility(), 50);
    });
    btnLeft.addEventListener('click', () => {
        tabMenu.scrollLeft -= 150;
        //iconVisibility();
        setTimeout(() => iconVisibility(), 50);
    });

    window.onload = function() {
        btnRight.style.display =
            tabMenu.scrollWidth > tabMenu.clientWidth ||
            tabMenu.scrollWidth >= window.innerWidth ?
            'block' : 'none';
        btnLeft.style.display = tabMenu.scrollWidth >= window.innerWidth ? '' : 'none';
    };

    window.onresize = function() {
        btnRight.style.display =
            tabMenu.scrollWidth > tabMenu.clientWidth ||
            tabMenu.scrollWidth >= window.innerWidth ?
            'block' : 'none';
        btnLeft.style.display = tabMenu.scrollWidth >= window.innerWidth ? '' : 'none';

        let scrollLeftValue = Math.round(tabMenu.scrollLeft);
        btnLeft.style.display = scrollLeftValue > 0 ? 'block' : 'none';
    };




    // Javascript to make the tab navigation draggable
    let activeDrag = false;

    tabMenu.addEventListener('mousemove', (drag) => {
        if (!activeDrag) return;
        tabMenu.scrollLeft -= drag.movementX;
        iconVisibility();

        tabMenu.classList.add('dragging');
    });

    document.addEventListener('mouseup', () => {
        activeDrag = false;

        tabMenu.classList.remove('dragging');
    });

    tabMenu.addEventListener('mousedown', () => {
        activeDrag = true;
    });



    // Javascript to view tab contents on click tab buttons
    const tabs = document.querySelectorAll('.tab');
    const tabBtns = document.querySelectorAll('.tab-btn');

    const tab_Nav = function(tabBtnClick) {
        tabBtns.forEach((tabBtn) => {
            tabBtn.classList.remove('active');
        });

        tabs.forEach((tab) => {
            tab.classList.remove('active');
        });

        tabBtns[tabBtnClick].classList.add('active');
        tabs[tabBtnClick].classList.add('active');
    };

    tabBtns.forEach((tabBtn, i) => {
        tabBtn.addEventListener('click', () => {
            tab_Nav(i);
        });
    });
</script>
