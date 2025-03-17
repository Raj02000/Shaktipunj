@props(['reviews'=>[]])

@forelse ($reviews as $review)
    <div class="review">
        <div class="review-header">
            <img src="{{ asset('images/default-user.png') }}" alt="Avatar" class="avatar">
            <div class="review-info">
                <h4 class="name">{{ $review['name'] }}</h4>
                <div class="stars">
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $review['rating'])
                            <span class="star filled">&#9733;</span>
                        @else
                            <span class="star">&#9734;</span>
                        @endif
                    @endfor
                </div>
                <span class="date">{{ \Carbon\Carbon::parse($review['date'])->format('M d, Y') }}</span>
            </div>
        </div>
        <div class="review-body">
            <p class="message">{!! $review['message'] !!}</p>
        </div>
    </div>
    @empty
@endforelse

<style>
    .review {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .review-header {
        display: flex;
        align-items: center;
    }

    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
    }

    .review-info {
        flex: 1;
    }

    .name {
        margin: 0;
        font-size: 1.2em;
    }

    .stars {
        color: #f5c518;
    }

    .star {
        font-size: 1.2em;
    }

    .date {
        display: block;
        color: #888;
        font-size: 0.9em;
    }

    .review-body {
        margin-top: 10px;
    }

    .message {
        margin: 0;
    }
</style>
