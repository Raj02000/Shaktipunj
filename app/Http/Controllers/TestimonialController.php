<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::simplePaginate(15);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.view', compact('testimonial'));
    }

    public function create()
    {
        return view('admin.testimonials.add');
    }

    public function store(StoreTestimonialRequest $request)
    {
        $imagePath = 'storage/'.$request->file('image')->storeAs('images/testimonials', $request->file('image')->getClientOriginalName(), 'public');

        Testimonial::create([
            'image' => $imagePath,
            'name' => $request['name'],
            'message' => $request['message'],
            'qualification' => $request['qualification'],
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial added successfully');
    }

    public function edit(Testimonial $testimonials)
    {
        return view('admin.testimonials.add', compact('testimonials'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $imagePath = $testimonial->image;
        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::delete($testimonial->image);
            }
            $imagePath = 'storage/'.$request->file('image')->storeAs('images/testimonials', $request->file('image')->getClientOriginalName(), 'public');
        }
        $testimonial->update([
            'name' => $request->name,
            'message' => $request->message,
            'qualification' => $request['qualification'],
            'image' => $imagePath,
        ]);

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial deleted successfully');
    }
}
