<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function book_form(Request $request)
    {
        $package = Package::find($request->package_id);

        return view('booking.form', ['guest' => $request->guest ?? 1, 'date' => $request->date, 'package' => $package]);
    }

    public function book_submit(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'people' => 'required|integer|min:1',
            'title' => 'required|string|max:10',
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:100',
            'country_code' => 'required|string',
            'phone' => 'required|string|max:20',
            'pickup_details' => 'nullable|string|max:500',
            'comments' => 'nullable|string|max:500',
            'terms' => 'required|accepted',
            'total_amount'=>'required|string'
        ]);

        Bookings::create($request->toArray());

        return redirect(route('page.home'))->withSuccess('Success');
    }

    public function custom_book_form()
    {
        $package = Package::all();

        return view('booking.customized-form', ['package' => $package]);
    }

    public function custom_book_submit(Request $request)
    {
        $validation = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'people' => 'required|integer|min:1',
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'country' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'comments' => 'nullable|string|max:500',
            'terms' => 'required|accepted',
        ]);

        Bookings::create($request->toArray());

        return redirect(route('page.home'))->withSuccess('Success');
    }
}
