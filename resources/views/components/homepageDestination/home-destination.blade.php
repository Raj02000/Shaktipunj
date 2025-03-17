@props(['destination'])
<style>
    .team-background {
        background: #BF1E2ED6;

        height: 296px;
        width: 100%;



    }

    .card-destination {
        margin-bottom: -270px;

    }

    .destination-component {
        background: linear-gradient(181.95deg, #FFFFFF 15.78%, #737373 255.58%);

    }

    .image-logo {
        width: 94px;
        height: 106px;
    }

    @media screen and (max-width: 991px) {
        .team-background {
            background: none;

        }

        .destination-component {
            background: none;

        }

    }

    @media screen and (max-width: 650px) {
        .subtitle-header {
            font-size: 16px;
            margin: 0px 0px 20px 0px;
        }

    }
</style>

<div class="container-fluid destination-component">
    <x-section-logo.section-logo name="Our Destinations"
        description="Momentum Education Experts understands the significance of choosing the right study destination." />


    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-4 destination-row px-md-4 card-destination ">

        @foreach ($destination as $dest)
            <x-homepageDestination.card-home-destination :data="$dest" />
        @endforeach










    </div>
    <div class=" container-fluid team-background">
    </div>


</div>
