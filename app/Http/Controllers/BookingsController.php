<?php

namespace App\Http\Controllers;

use App\Models\Bookings;

class BookingsController extends Controller
{
    public function index()
    {
        $bookings = Bookings::simplePaginate(15);

        return view('admin.bookings.list', compact('bookings'));
    }

    public function show(Bookings $bookings)
    {
        return view('admin.bookings.view', compact('bookings'));
    }
}
