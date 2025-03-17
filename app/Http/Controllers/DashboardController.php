<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Enquiry;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\University;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $enquiry = Enquiry::whereDate('created_at', Carbon::now())->count();
        $testimonials = Testimonial::count();
        $destination = Destination::count();
        $university = University::count();
        $services = Service::count();

        return view('admin.dashboard.index', compact('enquiry', 'destination', 'university', 'services', 'testimonials'));
    }
}
