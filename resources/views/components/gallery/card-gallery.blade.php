@props(['data'])
<style>
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 50px;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.9);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close {
        position: absolute;
        top: 55px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    .card-gallery {
        margin-bottom: 20px;

        overflow: hidden;
        height: 300px;


    }

    .card-gallery .card-gallery-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-gallery .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 20%;
        background-color: rgba(0, 0, 0, 0.7);
        transition: height 0.7s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
    }

    .card-gallery .image-title {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 20%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 25px;



        z-index: 1;


        font-weight: 700;
        line-height: 39.21px;


    }

    .card-gallery:hover .overlay {
        height: 100%;
    }

    .card-gallery:hover .image-view {
        opacity: 1;

    }

    .image-view {
        position: absolute;
        bottom: 50%;
        left: 36%;
        opacity: 0;
        transition: opacity 0.5s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        font-size: 15px;
        font-weight: bold;
        z-index: 1;



    }
</style>


<div class="container-fluid px-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4  g-3">
        @forelse ($data as $item)
            <div class="col">
                <div class="card card-gallery">
                    <img src="{{ asset($item->image) }}" class="card-gallery-img-top" alt="{{ $item->title }}">
                    <div class="image-title">{{ $item->title }}</div>
                    <div class="image-view">View Image</div>
                    <div class="overlay"></div>

                </div>
            </div>
        @empty
            <div>No images added</div>
        @endforelse
    </div>
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
    </div>


</div>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    var cols = document.querySelectorAll('.col');

    // Get the modal image and caption elements
    var modalImg = document.getElementById('img01');
    var captionText = document.getElementById('caption');

    // Attach click event to each col element
    cols.forEach(function(col) {
        col.addEventListener('click', function() {
            modal.style.display = 'block';
            modalImg.src = col.querySelector('.card-gallery-img-top').src;
            captionText.innerHTML = col.querySelector('.image-title').textContent;
        });
    });

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName('close')[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = 'none';
    };
</script>
