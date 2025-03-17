<?php

namespace App\Http\Controllers;

use App\Enums\Enums\ReviewStatus;
use App\Enums\PageType;
use App\Models\About;
use App\Models\Activities;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\HomeBanner;
use App\Models\NewsLetter;
use App\Models\Organization;
use App\Models\Package;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserPageController extends Controller
{
    public function home()
    {
        return view('home', [
            'destinations' => Destination::whereNull('parent_id')->get(),
            'blogs' => Blog::select('id', 'slug', 'title', 'image', 'tag_id', 'created_at')->with(['tag'])->latest()->limit(4)->get(),
            'bestSellerPackages' => Category::where('slug', 'best-seller')->with([
                'packages' => fn($q) => $q->with(['tag', 'reviews' => fn($qr) => $qr->where('status', ReviewStatus::APPROVED)])->latest()->take(6)
            ])->first(),
            'trendingPackages' => Category::where('slug', 'trending-packages')->with([
                'packages' => fn($q) => $q->with(['tag', 'reviews' => fn($qr) => $qr->where('status', ReviewStatus::APPROVED)])->latest()->take(6)
            ])->first(),
            'categories' => Category::with([
                'packages' => fn($q) => $q->with(['tag', 'reviews' => fn($qr) => $qr->where('status', ReviewStatus::APPROVED)])->latest()->take(6)
            ])->whereNotIn('slug', ['trending-packages', 'best-seller'])->get(),
            'testimonials' => Testimonial::get(),
            'partners' => Partner::get(),
            'activities' => Activities::all(),
            'about' => About::first(),
            'banners' => HomeBanner::all(),
        ]);
    }

    public function contactUs()
    {
        return view('contact-us');
    }

    public function pageCompany($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if ($page->slug == 'our-teams') {
            return view('team', compact('page'));
        }

        $model = 'Company Info';

        if ($page->type == PageType::GALLERY) {
            return view('gallery', compact('page', 'model'));
        }

        return view('page', compact('page', 'model'));
    }

    public function pageTravel($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $model = 'Travel Info';

        if ($page->type == PageType::GALLERY) {
            return view('gallery', compact('page', 'model'));
        }

        return view('page', compact('page', 'model'));
    }

    public function faqs()
    {
        $faqs = Faq::all();

        return view('faqs', compact('faqs'));
    }

    public function universities()
    {
        return view('universities', [
            'destinations' => Destination::with('universities')->select('id', 'slug', 'name')->get(),
        ]);
    }

    public function packages()
    {
        $query = Package::query();
        $cat = false;

        if (request()->has('category')) {
            $query->withWhereHas('categories', fn($q) => $q->where('slug', request('category')));
            $cat = true;
        }
        $category = Category::where('slug', request('category'))->first();
        $packages = $query->with('tag')->latest()->paginate(8);
        return view('packages', [
            'packages' => $packages,
            'cat' => $cat,
            'category' => $category
        ]);
    }

    public function blogs()
    {
        $query = Blog::query();
        $noTag = false;

        if (request()->has('tag')) {
            $query->withWhereHas('tag', fn($q) => $q->where('slug', request('tag')));
            $noTag = true;
        }

        $blogs = $query->latest()->paginate(8);

        return view('blogs', compact('blogs', 'noTag'));
    }

    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->with('tag')->first();
        $latestBlogs = Blog::where('id', '!=', $blog->id)->latest()->limit(3)->get();

        return view('blog-details', compact('blog', 'latestBlogs'));
    }

    public function abroadDetails($slug)
    {
        $slug = strtolower($slug);

        return view('study-in-detail', [
            'destination' => Destination::with('sections')->where('slug', $slug)->first(),
            'services' => Service::select('id', 'slug', 'title')->get(),
            'destinations' => Destination::select('id', 'slug', 'name')->where('slug', '!=', $slug)->get(),
        ]);
    }

    public function serviceDetails($slug)
    {
        $slug = strtolower($slug);

        return view('service-detail', [
            'service' => Service::where('slug', $slug)->first(),
            'services' => Service::select('id', 'slug', 'title')->where('slug', '!=', $slug)->get(),
            'destinations' => Destination::select('id', 'slug', 'name')->where('slug', '!=', $slug)->get(),
        ]);
    }

    public function allDestinations()
    {
        $destinations = Destination::with(['children', 'packages'])->whereNull('parent_id')->get();


        return view('all-destinations', compact('destinations'));
    }

    public function contactAdd(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string',
            'message' => 'required|string',
        ]);

        Enquiry::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->number,
            'message' => $request->message,
        ]);
        Alert::success('Message sent', 'Your message has been sent');

        return redirect()->back();
    }

    public function destination($slug)
    {
        $slug = strtolower($slug);
        $destination = Destination::with(['children', 'packages', 'parent'])->where('slug', $slug)->first();

        return view('destination-details', compact('destination'));
    }

    public function menu()
    {
        $destinations = Destination::select('id', 'slug', 'name')->get();
        $org = Organization::select(['id', 'menu_id', 'second_menu_id'])->first();

        return view('menu', compact('destinations', 'org'));
    }

    public function search()
    {
        request()->validate([
            'q' => 'required|string'
        ]);

        $query = request()->input('q');
        $packages = Package::where(function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%")
                ->orWhere('location', 'like', "%{$query}%")
                ->orWhere('duration', 'like', "%{$query}%")
                ->orWhere('price', 'like', "%{$query}%")
                ->orWhere('include', 'like', "%{$query}%")
                ->orWhere('overview', 'like', "%{$query}%");
        })->get();


        return view('search.result-page', compact('packages', 'query'));
    }


    public function newsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string'
        ]);

        NewsLetter::create(request()->toArray());
        return redirect()->back()->withSuccess('Newsletter Subscribed!');
    }
}
