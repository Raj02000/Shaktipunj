<?php

namespace App\Http\Controllers;

use App\Enums\Enums\ReviewStatus;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $status = ReviewStatus::PENDING;

        if (request()->has('status')) {
            $status = ReviewStatus::from(request('status'));
        }
        $reviews = Review::with(['package:id,name'])->where('status', $status)->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('admin.reviews.view', compact('review'));
    }

    public function customerReview(Request $request, Package $package)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required',
            'message' => 'required|string',
        ]);

        $package->reviews()->create([
            'name' => $validatedData['name'],
            'rating' => $validatedData['rating'],
            'message' => $validatedData['message'],
        ]);

        return redirect()->back()->withSuccess('The review has been added!');
    }

    public function changeStatus(Review $review, $status)
    {
        $review->update(['status' => $status]);

        return redirect()->back()->withSuccess('The review status has been updated!');
    }

    public function changeDateAndAccept(Request $request, Review $review)
    {
        $review->update([
            'date' => $request->date,
            'status' => 'approved',
        ]);

        return redirect()->back()->withSuccess('The review status has been updated!');
    }
}
