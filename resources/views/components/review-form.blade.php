@props(['package'])
<div class="review-form mt-4">
    <h3>Leave a Review</h3>
    <form action="{{ route('page.customer.review', $package->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="rating">Your Rating:</label>
            <div class="rating-input">
                @for ($i = 5; $i >= 1; $i--)
                    <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}"
                        {{ $i == 5 ? 'checked' : '' }}>
                    <label for="rating-{{ $i }}" class="star">&#9733;</label>
                @endfor
            </div>
        </div>
        <div class="form-group">
            <label for="message">Your Review:</label>
            <textarea id="message" name="message" class="form-control" rows="4" placeholder="Write your review here"
                required></textarea>
        </div>
        <button type="submit" class="btn-submit">Submit Review</button>
    </form>
</div>


<style>
    .review-form {
        border: 1px solid #ddd;
        padding: 20px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .review-form h3 {
        margin-bottom: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .rating-input {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
        gap: 5px;
    }

    .rating-input input {
        display: none;
    }

    .rating-input label {
        font-size: 1.5em;
        color: #ddd;
        cursor: pointer;
    }

    .rating-input input:checked~label,
    .rating-input input:checked~label~label {
        color: #f5c518;
    }

    .btn-submit {
        background-color: #4caf50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #45a049;
    }
</style>
