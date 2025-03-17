<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUniversityRequest;
use App\Http\Requests\UpdateUniversityRequest;
use App\Models\Destination;
use App\Models\University;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    public function index()
    {
        $universities = University::simplePaginate(15);

        return view('admin.university.index', compact('universities'));
    }

    public function create()
    {
        $country = Destination::all();

        return view('admin.university.add', compact('country'));
    }

    public function store(StoreUniversityRequest $request)
    {

        // Store the image
        $imagePath = 'storage/'.$request->file('image')->store('images', 'public');

        // Create and store the university
        $university = University::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imagePath,
            'country_id' => $request->country_id === 'null' ? null : $request->country_id,
        ]);

        return redirect()->route('university.index')->with('success', 'University added successfully');
    }

    public function show(University $university)
    {
        return view('admin.university.view', compact('university'));
    }

    public function edit(University $university)
    {

        $country = Destination::all();

        return view('admin.university.add', compact('university', 'country'));
    }

    public function update(UpdateUniversityRequest $request, University $university)
    {

        if ($request->hasFile('image')) {
            $imagePath = 'storage/'.$request->file('image')->store('images', 'public');

            if ($university->image) {
                Storage::delete($university->image);
            }
            $university->update([
                'name' => $request->name,
                'link' => $request->link,
                'image' => $imagePath,
                'country_id' => $request->country_id,
            ]);
        } else {
            $university->update([
                'name' => $request->name,
                'link' => $request->link,
                'country_id' => $request->country_id,
            ]);
        }

        return redirect()->route('university.index')->with('success', 'University updated successfully');
    }

    public function destroy(University $university)
    {
        $university->delete();

        return redirect()->route('university.index')->with('success', 'University deleted successfully');
    }
}
