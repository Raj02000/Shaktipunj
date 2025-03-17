<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Utilities\ImageUploader;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        $activities = Activities::simplePaginate(15);

        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.add');
    }

    public function show(activities $activities)
    {
        return view('admin.activities.view', compact('activities'));
    }

    public function edit(activities $activities)
    {
        return view('admin.activities.edit', compact('activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp',
            'url' => 'required|string|max:255'
        ]);

        $imagePath = ImageUploader::upload($request->file('logo'), 'activities');
        Activities::create([
            'name' => $request->name,
            'logo' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('activities.index')->with('success', 'activities added successfully');
    }

    public function update(Request $request, Activities $activities)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'url' => 'required|string|max:255'
        ]);

        $imagePath = $activities->logo;
        if ($request->hasFile('logo')) {
            $imagePath = ImageUploader::upload($request->file('logo'), 'activities');
        }

        $activities->update([
            'name' => $request->name,
            'logo' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('activities.index')->with('success', 'activities updated successfully');
    }

    public function destroy(activities $activities)
    {
        $activities->delete();

        return redirect()->route('activities.index')->with('success', 'activities deleted successfully');
    }
}
