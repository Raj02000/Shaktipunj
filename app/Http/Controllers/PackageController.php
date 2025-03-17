<?php

namespace App\Http\Controllers;

use App\Enums\Enums\ReviewStatus;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\PackageUpdateRequest;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Tag;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public string $storagePath = 'packages';

    public function index()
    {
        $query = Package::with(['destination', 'tag']);

        if (request()->has('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        $packages = $query->latest()->simplePaginate(15);

        return view('admin.package.index', compact('packages'));
    }

    public function create()
    {
        $destinations = Destination::all();
        $tags = Tag::all();

        return view('admin.package.add', compact('destinations', 'tags'));
    }

    public function store(PackageRequest $request)
    {
        $image = ImageUploader::upload($request->file('image', $this->storagePath));
        $tripPath = null;

        if ($request->file('trip_map')) {
            $tripPath = ImageUploader::upload($request->file('trip_map', $this->storagePath));
        }

        $pdfPath = null;
        if ($request->file('pdf')) {
            $pdfPath = 'storage/' . $request->file('pdf')->store($this->storagePath, 'public');
        }

        $itinerary = null;
        if (isset($request->iti_questions[0])) {
            $iti_questions = $request->iti_questions;
            $iti_descriptions = $request->itineraryDescriptions;
            $iti_answers = $request->iti_answers;
            foreach ($iti_questions as $key => $value) {
                $itinerary[$key] = [
                    'question' => $value,
                    'answer' => $iti_answers[$key],
                    'description' => $iti_descriptions[$key],
                    'iti_acc_type' => $request->iti_acc_type[$key] ?? null,
                    'iti_hike_distance' => $request->iti_hike_distance[$key] ?? null,
                    'iti_duration' => $request->iti_duration[$key] ?? null,
                    'iti_meals' => $request->iti_meals[$key] ?? null,
                    'iti_max_elevation' => $request->iti_max_elevation[$key] ?? null,
                ];
            }
        }

        $faqs = null;
        if (isset($request->questions[0])) {
            $questions = $request->questions;
            $answers = $request->answers;
            foreach ($questions as $key => $value) {
                $faqs[$key] = [
                    'question' => $value,
                    'answer' => $answers[$key],
                ];
            }
        }

        $cost_dates = null;
        if ($request->start_date && $request->end_date && $request->package_price) {
            foreach ($request->start_date as $key => $value) {
                $cost_dates[$key] = [
                    'start_date' => $value,
                    'end_date' => $request->end_date[$key],
                    'package_price' => $request->package_price[$key],
                ];
            }
        }
        $price = 0;
        $package_costs = null;
        if ($request->person_range && $request->usd_amount && $request->inr_amount && $request->npr_amount) {
            foreach ($request->person_range as $key => $value) {
                if ($value == 1) {
                    $price = $request->usd_amount[$key];
                }
                $package_costs[$key] = [
                    'person_range' => $value,
                    'usd_amount' => $request->usd_amount[$key],
                    'inr_amount' => $request->inr_amount[$key],
                    'npr_amount' => $request->npr_amount[$key],
                ];
            }
        }
        $videoInfo = [
            'video_link' => request()->video_link,
            'video_description' => request()->video_description,
        ];

        $gallery = [];
        if (request()->gallery) {
            foreach (request()->gallery as $item) {
                $gallery[] = ImageUploader::upload($item, 'packages/gallery');
            }
        }
        Package::create([
            'name' => $request->name,
            'image' => $image,
            'tag_id' => $request->tag_id,
            'location' => $request->location,
            'destination_id' => $request->destination,
            'duration' => $request->duration,
            'price' => $price,
            'cost_dates' => $cost_dates,
            'overview' => $request->overview,
            'include' => $request->include,
            'exclude' => $request->exclude,
            'useful_info' => $request->useful_info,
            'faqs' => $faqs,
            'itinerary' => $itinerary,
            'trip_map' => $tripPath,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'extra' => [
                'difficulty' => $request->difficulty,
                'season' => $request->season,
                'altitude' => $request->altitude,
                'package_costs' => $package_costs,
                'video' => $videoInfo,
                'gallery' => $gallery,
                'activities' => $request->activities,
                'accommodation' => $request->accommodation,
                'meals' => $request->meals,
                'extra_destination' => $request->extra_destination,
                'pdf' => $pdfPath,
                'short_description' => $request->short_description
            ],
        ]);

        return redirect()->route('package.index')->withSuccess('The package has been added!');
    }

    public function show(Package $package)
    {
        return view('admin.package.view', compact('package'));
    }

    public function edit(Package $package)
    {
        $destinations = Destination::all();
        $tags = Tag::all();

        return view('admin.package.edit', compact('package', 'destinations', 'tags'));
    }

    public function update(PackageUpdateRequest $request, Package $package)
    {
        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'destination_id' => $request->destination,
            'duration' => $request->duration,
            'overview' => $request->overview,
            'tag_id' => $request->tag_id,
            'include' => $request->include,
            'exclude' => $request->exclude,
            'useful_info' => $request->useful_info,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

        ];
        if ($request->hasFile('image')) {
            Storage::delete($package->image);
            $image = ImageUploader::upload($request->file('image', $this->storagePath));
            $data['image'] = $image;
        }

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = 'storage/' . $request->file('pdf')->store($this->storagePath, 'public');
        }

        if ($request->file('trip_map')) {
            $tripPath = ImageUploader::upload($request->file('trip_map', $this->storagePath));
            $data['trip_map'] = $tripPath;
        }

        $itinerary = null;
        if (isset($request->iti_questions[0])) {
            $iti_questions = $request->iti_questions;
            $iti_descriptions = $request->itineraryDescriptions;
            $iti_answers = $request->iti_answers;
            foreach ($iti_questions as $key => $value) {
                $itinerary[$key] = [
                    'question' => $value,
                    'answer' => $iti_answers[$key],
                    'description' => $iti_descriptions[$key],
                    'iti_acc_type' => $request->iti_acc_type[$key] ?? null,
                    'iti_hike_distance' => $request->iti_hike_distance[$key] ?? null,
                    'iti_duration' => $request->iti_duration[$key] ?? null,
                    'iti_meals' => $request->iti_meals[$key] ?? null,
                    'iti_max_elevation' => $request->iti_max_elevation[$key] ?? null,
                ];
            }
        }

        $faqs = null;
        if (isset($request->questions[0])) {
            $questions = $request->questions;
            $answers = $request->answers;
            foreach ($questions as $key => $value) {
                $faqs[$key] = [
                    'question' => $value,
                    'answer' => $answers[$key],
                ];
            }
        }

        $cost_dates = [];
        if ($request->start_date && $request->end_date && $request->package_price) {
            foreach ($request->start_date as $key => $value) {
                $cost_dates[$key] = [
                    'start_date' => $value,
                    'end_date' => $request->end_date[$key],
                    'package_price' => $request->package_price[$key],
                ];
            }
            usort($cost_dates, function ($a, $b) {
                return strtotime($a['start_date']) <=> strtotime($b['start_date']);
            });
        }
        $price = 0;
        $package_costs = null;
        if ($request->person_range && $request->usd_amount && $request->inr_amount && $request->npr_amount) {
            foreach ($request->person_range as $key => $value) {
                if ($value == 1) {
                    $price = $request->usd_amount[$key];
                }
                $package_costs[$key] = [
                    'person_range' => $value,
                    'usd_amount' => $request->usd_amount[$key],
                    'inr_amount' => $request->inr_amount[$key],
                    'npr_amount' => $request->npr_amount[$key],
                ];
            }
        }

        $videoInfo = [
            'video_link' => request()->video_link,
            'video_description' => request()->video_description,
        ];

        $gallery = $package->extra['gallery'] ?? [];
        if (request()->gallery) {
            foreach (request()->gallery as $item) {
                $gallery[] = ImageUploader::upload($item, 'packages/gallery');
            }
        }
        $package->update(array_merge($data, [
            'faqs' => $faqs,
            'price' => $price,
            'itinerary' => $itinerary,
            'cost_dates' => $cost_dates,
            'extra' => [
                'difficulty' => $request->difficulty,
                'season' => $request->season,
                'altitude' => $request->altitude,
                'activities' => $request->activities,
                'accommodation' => $request->accommodation,
                'meals' => $request->meals,
                'package_costs' => $package_costs,
                'video' => $videoInfo,
                'gallery' => $gallery,
                'extra_destination' => $request->extra_destination,
                'pdf' => $pdfPath,
                'short_description' => $request->short_description
            ],
        ]));

        return redirect()->route('package.index')->withSuccess('The package has been updated!');
    }

    public function destroy(Package $package)
    {
        Storage::delete($package->image);
        $package->delete();

        return redirect()->route('package.index')->withSuccess('The package has been deleted');
    }

    public function userPackageDetails($slug)
    {
        $package = Package::with(['reviews' => fn($q) => $q->where('status', ReviewStatus::APPROVED)])->where('slug', $slug)->first();

        if ($package) {
            // Recursive eager loading for the destination's parent
            $package->load([
                'destination' => function ($q) {
                    $q->with([
                        'parent' => fn($subQuery) => $this->loadParentRecursively($subQuery)
                    ])
                        ->select('id', 'name', 'parent_id', 'slug');
                }
            ]);
        }

        $otherPackage = Package::where('destination_id', $package->destination_id)->whereNot('id', $package->id)->take(3)->get();
        return view('package-details', compact('package', 'otherPackage'));
    }

    public function editReview(Package $package)
    {
        return view('admin.package.edit-review', compact('package'));
    }

    public function updateReview(Request $request, Package $package)
    {
        $request->validate([
            'person' => 'required|array',
            'rating' => 'required|array',
            'date' => 'required|array',
            'message' => 'required|array',
        ]);

        $reviews = null;

        foreach ($request->person as $key => $value) {
            $reviews[$key] = [
                'person' => $value,
                'rating' => $request->rating[$key],
                'date' => $request->date[$key],
                'message' => $request->message[$key],
                'status' => ReviewStatus::APPROVED->value,
            ];
        }

        $package->update(['reviews' => $reviews]);

        return redirect()->route('package.index')->withSuccess('The review has been added!');
    }

    public function galleryItemRemove(Request $request)
    {
        $package = Package::find($request->extra);
        $package = Package::find($request->extra);

        if (!empty($package->extra['gallery'])) {
            $gallery = $package->extra['gallery'];

            $gallery = array_filter($gallery, fn($image) => $image !== $request->image);
            $package->extra = array_merge($package->extra, ['gallery' => array_values($gallery)]);
            $package->save();

            return redirect()->back()->withSuccess('Success!');
        }
        return redirect(back())->withErrors("Couldn't Delete Image!");
    }

    private function loadParentRecursively($query)
    {
        $query->with([
            'parent' => fn($q) => $this->loadParentRecursively($q)
        ])
            ->select('id', 'name', 'parent_id', 'slug');
    }
}
