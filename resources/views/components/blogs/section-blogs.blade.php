@props(['item'])
<div class="col ">
            <div class="card card-blog">
                <div class="gradient"></div>
                <img src="{{$item->image}}" class="card-blog-img-top" alt="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeJbdsAgGt78354LMdfno1Rqz67Q06uGwiEP1qodadoQ&s">
                <div class="blog-description ">{{ \Illuminate\Support\Str::limit($item->title, 55) }}</div>

                <div class="blog-read">Read More...</div>


            </div>
        </div>